<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;
use App\Helpers\NumberToWordsHelper;

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
        
        $expert=DB::table('employe as e')
        ->where('e.idemploye',$fact->expert)
        ->first();
       
        $totalTTC = $fact->Honoraires + $fact->MtFD + $fact->MtDeplacement + $fact->MtPhotos + $fact->MtRepasNuitee + $fact->MtTVA;
       
        $totalTTCEnLettre = NumberToWordsHelper::chiffreEnLettre($totalTTC);

        
        // Charger la vue pour le PDF
        $pdf = Pdf::loadView('pve/show', compact('entete','fact','expert','liste', 'header', 'totalTTCEnLettre'));
        
        // Afficher le PDF dans le navigateur
        return $pdf->stream('requisition-'.$noReq.'.pdf');
      
    }
    public function rapport(Request $request)

    {    
        $noReq = $request->input('id');
        $structure = $request->input('structure');
        $exercice = $request->input('exercice');
        $branche  = $request->input('branche');
        // Charge l'image et la convertit en base64
        $header_link = file_get_contents(public_path('images/header_pdf.png'));
        $header = base64_encode($header_link);
        $req = DB::table('requisition as r')
        ->select(
            'd.Classe', 
            'd.Localite', 
            DB::raw("CONCAT(s.Classe, ' ', s.Localite) AS Centre"),
            'r.objet', 
            'p.Designation', 
            DB::raw("CONCAT(r.Structure, '/', r.Exercice, '/', r.Branche, '/', r.NoReq) AS NoPV"),
            'r.DateEtabli', 
            DB::raw("CONCAT(e.Nom, ' ', e.Prenom) AS Expert"), 
            'r.Centre', 
            'r.LieuExp', 
            'r.NbPhotos', 
            'r.Assure', 
            DB::raw("CONCAT(r.CodeComp, ' ', r.CodeClient, ' - ', c.Designation) AS Agence"),
            'r.NoPolice', 
            'r.DateSinistre', 
            'r.NoSinistre', 
            'r.LieuSinistre', 
            'r.AssureTiers', 
            DB::raw("CONCAT(r.CodeCompTiers, ' ', r.CodeClientTiers) AS AgenceTiers"),
            'r.NoPoliceTiers', 
            'r.Introduction', 
            'r.Constat', 
            'r.Observation', 
            'r.TauxVetuste', 
            'r.ValeurVenale', 
            'r.MtEpave', 
            'r.MtIndem', 
            'r.ReformeVol', 
            'r.expert', 
            'e.signature', 
            's.Localite AS localite', 
            'r.TauxVetustePneu AS VetustePneu'
        )
        ->leftJoin('structure as s', 'r.Structure', '=', 's.Code')
        ->leftJoin('direction as d', 's.Direction', '=', 'd.Code')
        ->leftJoin('prestation as p', 'r.Objet', '=', 'p.CodeObjet')
        ->leftJoin('employe as e', 'r.Expert', '=', 'e.IdEmploye')
        ->leftJoin('client as c', function ($join) {
            $join->on('r.CodeComp', '=', 'c.CodeComp')
                ->on('r.CodeClient', '=', 'c.CodeClient');
        })
        ->where([
            ['r.Structure', '=', $structure],
            ['r.Exercice', '=', $exercice],
            ['r.Branche', '=', $branche],
            ['r.NoReq', '=', $noReq]
        ])
        ->first();
        
        // Données du Véhicule
        $car = DB::table('vehicule')
        ->where([
            ['Structure', '=', $structure],
            ['Exercice', '=', $exercice],
            ['Branche', '=', $branche],
            ['NoReq', '=', $noReq]
        ])
        ->first();

       
        // Liste des chocs
        $chocs = DB::table('choc')
        ->where([
            ['Structure', '=', $structure],
            ['Exercice', '=', $exercice],
            ['NoReq', '=', $noReq]
        ])
        ->orderBy('CodeChoc', 'ASC')
        ->get();

        
        //liste des fournitures
        $fournitures = DB::table('fournitures')
        ->where([
            ['Structure', '=', $structure],
            ['Exercice', '=', $exercice],
            ['NoReq', '=', $noReq]
        ])
        ->get();
        
         // Tableau des réparations ChocA / ChocB / ChoC / HT / TVA / TTC
        $rowFournitures = array_fill(0, 6, 0);
        $rowGlaces = array_fill(0, 6, 0);
        $rowPneus = array_fill(0, 6, 0);
        $rowPeintures = array_fill(0, 6, 0);
        $rowMOeuvre = array_fill(0, 6, 0);
        $rowImmo = array_fill(0, 4, 0);
        $rowRep = array_fill(0, 6, 0);
        
         // Requête pour récupérer les sommes des montants HT par CodeChoc
        $sumPieceABC = DB::table('fournitures')
        ->select(DB::raw('SUM(MtHT) AS TotalMtHT, CodeChoc'))
        ->where('Structure', $request->structure)
        ->where('Exercice', $request->exercice)
        ->where('NoReq', $request->noReq)
        ->where('Type', 'LIKE', 'Pièce')
        ->groupBy('CodeChoc')
        ->orderBy('CodeChoc')
        ->get();

        // Traitement des résultats
        foreach ($sumPieceABC as $item) {
            if ($item->CodeChoc == "A") {
                $rowFournitures[0] += $item->TotalMtHT; // Fourniture A
            } elseif ($item->CodeChoc == "B") {
                $rowFournitures[1] += $item->TotalMtHT; // Fourniture B
            } elseif ($item->CodeChoc == "C") {
                $rowFournitures[2] += $item->TotalMtHT; // Fourniture C
            }
        }


         // Requête pour récupérer les sommes des montants HT, TVA et TTC pour les pièces
        $sumPiece = DB::table('fournitures')
        ->selectRaw('SUM(MtHT) as TotalHT, SUM(MtTVA) as TotalTVA, SUM(MtTTC) as TotalTTC')
        ->where('Structure', $request->structure)
        ->where('Exercice', $request->exercice)
        ->where('NoReq', $request->noReq)
        ->where('Type', 'LIKE', 'Pièce')
        ->first();

        // Traitement des résultats
        $rowFournitures[3] = isset($sumPiece->TotalHT) && $sumPiece->TotalHT > 0 ? $sumPiece->TotalHT : 0; // HT
        $rowFournitures[4] = isset($sumPiece->TotalTVA) && $sumPiece->TotalTVA > 0 ? $sumPiece->TotalTVA : 0; // TVA
        $rowFournitures[5] = $rowFournitures[3] + $rowFournitures[4]; // TTC



        // Somme fournitures glace A/B/C
        $sumGlaceABC = DB::table('fournitures')
        ->selectRaw('SUM(MtHT) AS TotalMtHT, CodeChoc')
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->where('Type', 'LIKE', 'Glace')
        ->groupBy('CodeChoc')
        ->orderBy('CodeChoc')
        ->get();
        foreach ($sumGlaceABC as $result) {
            if ($result->CodeChoc == "A") {
                $rowGlaces[0] += $result->TotalMtHT;
            } elseif ($result->CodeChoc == "B") {
                $rowGlaces[1] += $result->TotalMtHT;
            } elseif ($result->CodeChoc == "C") {
                $rowGlaces[2] += $result->TotalMtHT;
            }
        }
        
        // Somme fournitures glace Ht/Tva/Ttc
        $sumGlace = DB::table('fournitures')
        ->selectRaw('SUM(MtHT) as sumMtHT, SUM(MtTVA) as sumMtTVA, SUM(MtTTC) as sumMtTTC')
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->where('Type', 'LIKE', 'Glace')
        ->first();

        $rowGlaces = [0, 0, 0, 0, 0, 0];

        if ($sumGlace) {
            $rowGlaces[3] = $sumGlace->sumMtHT > 0 ? $sumGlace->sumMtHT : 0;
            $rowGlaces[4] = $sumGlace->sumMtTVA > 0 ? $sumGlace->sumMtTVA : 0;
            $rowGlaces[5] = $rowGlaces[3] + $rowGlaces[4];
        } else {
            $rowGlaces[3] = 0;
            $rowGlaces[4] = 0;
            $rowGlaces[5] = 0;
        }


        // Somme fournitures pneu A/B/C
        $sumPneuABC = DB::table('fournitures')
        ->selectRaw('SUM(MtHT) as TotalMtHT, CodeChoc')
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->where('Type', 'LIKE', 'Pneu')
        ->groupBy('CodeChoc')
        ->orderBy('CodeChoc')
        ->get();

        $rowPneus = [0, 0, 0];  // Initialisation du tableau

        foreach ($sumPneuABC as $item) {
            if ($item->CodeChoc == 'A') {
                $rowPneus[0] += $item->TotalMtHT;
            } elseif ($item->CodeChoc == 'B') {
                $rowPneus[1] += $item->TotalMtHT;
            } elseif ($item->CodeChoc == 'C') {
                $rowPneus[2] += $item->TotalMtHT;
            }
        }
        // Récupérer les sommes MtHT, MtTVA, MtTTC pour les pneus
        $sumPneu = DB::table('fournitures')
        ->selectRaw('SUM(MtHT) as MtHT, SUM(MtTVA) as MtTVA, SUM(MtTTC) as MtTTC')
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->where('Type', 'LIKE', 'Pneu')
        ->first();

        // Initialisation du tableau des résultats
        $rowPneus = [0, 0, 0, 0, 0, 0];  // [HT A, HT B, HT C, Total HT, Total TVA, Total TTC]

        if ($sumPneu) {
        // Assigner les valeurs de MtHT, MtTVA, MtTTC si elles existent
        $rowPneus[3] = isset($sumPneu->MtHT) && $sumPneu->MtHT > 0 ? $sumPneu->MtHT : 0;
        $rowPneus[4] = isset($sumPneu->MtTVA) && $sumPneu->MtTVA > 0 ? $sumPneu->MtTVA : 0;
        $rowPneus[5] = isset($sumPneu->MtTTC) && $sumPneu->MtTTC > 0 ? $sumPneu->MtTTC : 0;

        // Calculer la somme TTC si nécessaire
        $rowPneus[5] = $rowPneus[3] + $rowPneus[4]; // Calculer TTC comme la somme de HT + TVA
        }

        // Récupérer les données des sommes pour Peinture, Main d'oeuvre et Jour d'immobilisation
        $sumChocsABC = DB::table('choc')
        ->select('MtPeinture', 'MtMainOeuvre', 'JrImmo')
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->get();

        // Initialisation des tableaux
        $rowPeintures = [0, 0, 0];  // [Peinture A, Peinture B, Peinture C]
        $rowMOeuvre = [0, 0, 0];  // [MOeuvre A, MOeuvre B, MOeuvre C]
        $rowImmo = [0, 0, 0];  // [Immo A, Immo B, Immo C]

        // Remplir les tableaux avec les résultats
        foreach ($sumChocsABC as $index => $sumChoc) {
        // Remplir le tableau $rowPeintures
        $rowPeintures[$index] = isset($sumChoc->MtPeinture) && $sumChoc->MtPeinture > 0 ? $sumChoc->MtPeinture : 0;

        // Remplir le tableau $rowMOeuvre
        $rowMOeuvre[$index] = isset($sumChoc->MtMainOeuvre) && $sumChoc->MtMainOeuvre > 0 ? $sumChoc->MtMainOeuvre : 0;

        // Remplir le tableau $rowImmo
        $rowImmo[$index] = isset($sumChoc->JrImmo) && $sumChoc->JrImmo > 0 ? $sumChoc->JrImmo : 0;
        }

       
        // Récupérer la somme des MtPeinture, MtMainOeuvre et JrImmo
        $sumChocs = DB::table('choc')
        ->select(DB::raw('SUM(MtPeinture) as MtPeinture, SUM(MtMainOeuvre) as MtMainOeuvre, SUM(JrImmo) as JrImmo'))
        ->where('Structure', $structure)
        ->where('Exercice', $exercice)
        ->where('NoReq', $noReq)
        ->first();

        // Initialisation des tableaux
        $rowPeintures = [0, 0, 0, 0, 0, 0];
        $rowMOeuvre = [0, 0, 0, 0, 0, 0];
        $rowImmo = [0, 0, 0, 0, 0, 0];

        // Vérification et affectation des valeurs
        if (isset($sumChocs->MtPeinture) && $sumChocs->MtPeinture > 0) {
        $rowPeintures[3] = $rowPeintures[5] = $sumChocs->MtPeinture;
        } else {
        $rowPeintures[3] = $rowPeintures[5] = 0;
        }

        if (isset($sumChocs->MtMainOeuvre) && $sumChocs->MtMainOeuvre > 0) {
        $rowMOeuvre[3] = $rowMOeuvre[5] = $sumChocs->MtMainOeuvre;
        } else {
        $rowMOeuvre[3] = $rowMOeuvre[5] = 0;
        }

        if (isset($sumChocs->JrImmo) && $sumChocs->JrImmo > 0) {
        $rowImmo[3] = $rowImmo[5] = $sumChocs->JrImmo;
        } else {
        $rowImmo[3] = $rowImmo[5] = 0;
        }

        //  Somme total des réparation
        // Addition des valeurs pour chaque indice
        for ($i = 0; $i < 6; $i++) {
            $rowRep[$i] = $rowFournitures[$i] + $rowGlaces[$i] + $rowPneus[$i] + $rowPeintures[$i] + $rowMOeuvre[$i];
        }
        // Affichage des zones d'impression

        // Initialisation des variables
        $has_intro = $has_reforme = $has_choc = $has_rep = $has_enlettre = $has_obs = 1;
        $valeurvenale = "Valeur du véhicule à la veille du sinistre : ";

        // Vérification de $req[3] et ajustement des zones d'affichage
        switch ($req->objet) {
            case "CC":
            case "CV":
            case "VR":
            case "AVT":
            case "EVA":
                // Cacher les zones inutiles
                $has_reforme = $has_choc = $has_rep = $has_enlettre = $has_obs = 0;
                $valeurvenale = "";
                break;

            case "REF":
                // Cacher les zones inutiles
                $has_intro = $has_choc = $has_rep = 0;
                $valeurvenale = "";
                break;

            case "ADD":
                $has_intro = $has_reforme = 0;
                break;

            case "EC":
            case "ECR":
            case "REX":
            case "PVE":
                $has_intro = $has_reforme = 0;
                if ($req->ReformeVol) {
                    $has_reforme = 1;
                    $valeurvenale = "";
                } elseif (!count($chocs)) {
                    $has_choc = $has_rep = 0;
                }
                break;
        }
        dd($req);
        //dd($rowFournitures);
        //dd($rowFournitures);
        // Charger la vue pour le PDF
       
        $pdf = Pdf::loadView('pve/rapport', compact(
            'header', 
            'req', 
            'car', 
            'chocs', 
            'fournitures', 
            'rowFournitures', 
            'rowGlaces', 
            'rowPneus', 
            'rowPeintures', 
            'rowMOeuvre', 
            'rowImmo', 
            'rowRep',
            'has_intro', 
            'has_reforme', 
            'has_choc', 
            'has_rep', 
            'has_enlettre', 
            'has_obs', 
            'valeurvenale'
        ));
        
        // Afficher le PDF dans le navigateur
        return $pdf->stream('requisition-'.$noReq.'.pdf');
      
    }
    
}


