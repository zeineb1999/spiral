<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;

class PveController extends Controller
{
    public function show(Request $request)

    {    
        $noReq = $request->input('id');
        $structure = $request->input('structure');
        $exercice = $request->input('exercice');
        $branche  = $request->input('branche');
        // Charge l'image et la convertit en base64
        $header_link = file_get_contents(public_path('images/header_pdf.png'));
        $header = base64_encode($header_link);

        // données entete de facture 
        $entete = DB::table('structure as s')
        ->leftJoin('direction as d', 's.direction', '=', 'd.code')
        ->selectRaw("CONCAT(d.Classe, ' ', d.Localite) AS Direction, d.RC, d.MatrFisc, d.NArt, d.Banque, d.RIB")
        ->where('s.code', $structure)
        ->first();

        // Données de la facture
        $fact = DB::table('facture as f')
            ->join('structure as s', 'f.Structure', '=', 's.Code')
            ->leftJoin('requisition as r', function($join) {
                $join->on('f.Structure', '=', 'r.Structure')
                    ->on('f.ExerciceReq', '=', 'r.Exercice')
                    ->on('f.Branche', '=', 'r.Branche')
                    ->on('f.noReq', '=', 'r.noReq');
            })
            ->leftJoin('client as c', function($join) {
                $join->on('r.CodeComp', '=', 'c.CodeComp')
                    ->on('r.CodeClient', '=', 'c.CodeClient');
            })
            ->where('f.Structure', '=', $structure)
            ->where('f.ExerciceReq', '=', $exercice)
            ->where('f.Branche', '=', $branche)
            ->where('f.NoReq', '=', $noReq)
            ->select(
                's.Classe', 
                's.Localite', 
                'f.Structure', 
                'f.Exercice', 
                'f.Branche', 
                'f.noFact', 
                'f.Date', 
                'r.CodeComp', 
                DB::raw('CASE WHEN r.CodeComp LIKE "DIVERS" THEN r.CodeClient ELSE CONCAT(r.CodeClient, " - ", c.Designation) END AS ClientInfo'),
                'f.ExerciceReq', 
                'f.noReq', 
                'r.Objet', 
                'r.DateEtabli', 
                'r.Assure', 
                'r.AssureTiers', 
                'r.NoPolice', 
                'r.NoSinistre', 
                'r.DateSinistre', 
                'r.MtDommages', 
                'f.Honoraires', 
                'f.MtFD', 
                'f.MtDeplacement', 
                'f.MtPhotos', 
                DB::raw('f.MtRepas + f.MtNuitee AS MtRepasNuitee'),
                'f.MtTVA',
                'r.expert'
            )
            ->orderBy('f.Date', 'ASC')
            ->first(); // Vous voulez un seul enregistrement avec LIMIT 1

                
        
                
        $liste = DB::table('facture as f')
        ->select(DB::raw("CONCAT(f.Structure, '/', f.Exercice, '/', f.Branche, '/', f.noFact) as facture"))
        ->where('f.Structure', $structure)
        ->where('f.ExerciceReq', $exercice)
        ->where('f.Branche', $branche)
        ->where('f.NoReq', $noReq)
        ->orderBy('f.Date', 'ASC')
        ->get();
        
        $expert=null;
        
        
        // Charger la vue pour le PDF
        $pdf = Pdf::loadView('pve/show', compact('entete','fact','expert','liste', 'header'));
        
        // Afficher le PDF dans le navigateur
        return $pdf->stream('requisition-'.$noReq.'.pdf');
      
    }
    
}


