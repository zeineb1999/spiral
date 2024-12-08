<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;


class RequisitionController extends Controller
{
    public function index()
    {   $aujourdhui = Carbon::today()->toDateString(); // Obtenir la date d'aujourd'hui au format 'Y-m-d'

        
        // Récupérer le 'username' à partir de la session
        $username = session('username');
        $compagnie = session('compagnie');
        $agence = session('agence');
        // Récupérer les réquisitions correspondant au `CodeComp`
        return DB::table('requisition as r')
            //->whereRaw('? LIKE CONCAT("%", `CodeComp`, "%")', [$username])
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->where('r.CodeComp', $compagnie)
            ->where('r.CodeClient', $agence)
            ->where('r.DateEnreg',$aujourdhui)
            ->where('r.Branche', 1)
            ->whereNull('r.Annulation')
            ->orderBy('r.Structure', 'asc')  // Trier par 'r.Structure' en ordre décroissant
            ->orderBy('r.Exercice', 'desc')  // Trier par 'r.CodeComp' en ordre décroissant
            ->orderBy('r.Branche', 'desc') // Trier par 'r.CodeClient' en ordre décroissant
            ->orderBy('r.NoReq', 'desc')
            ->paginate(10);
    }
    

    public function filter(Request $request)
    {
        // Réinitialisation des filtres dans la session
        session()->forget(['structure', 'branche', 'date1', 'date2','assure','dateSinistre','sinistre','police','Immatricule','Ordre','Limite']);

        // Stocker les nouvelles valeurs dans la session si elles existent
        if ($request->filled('structure')) {
            session()->put('structure', $request->structure);
        }
        if ($request->filled('branche')) {
            session()->put('branche', $request->branche);
        }
        if ($request->filled('date1')) {
            session()->put('date1', $request->date1);
        }
        if ($request->filled('date2')) {
            session()->put('date2', $request->date2);
        }
        // Récupérer les requisitions avec les filtres appliqués
        $query = DB::table('requisition as r')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->where('r.CodeComp', session('compagnie'))
            ->whereNull('r.Annulation')
            ->where('r.CodeClient', session('agence'));

        if ($request->filled('structure')) {
            $query->where('r.Structure', $request->structure);
        }
        if ($request->filled('branche')) {
            $query->where('r.Branche', $request->branche);
        }
        if ($request->filled('date1')) {
            $query->where('r.DateEnreg', '>=', $request->date1);
        }
        if ($request->filled('date2')) {
            $query->where('r.DateEnreg', '<=', $request->date2);
        }

        $query->orderBy('r.Structure', 'asc')
            ->orderBy('r.Exercice', 'desc')
            ->orderBy('r.Branche', 'desc')
            ->orderBy('r.NoReq', 'desc');

        $requisitions = $query->paginate(10);
        

        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
            'pagination' => (string) $requisitions->links(), // Générer les liens de pagination
        ]);
    }
    
    public function advancedSearch(Request $request)
    {   session()->forget(['structure', 'branche', 'date1', 'date2','assure','dateSinistre','sinistre','police','Immatricule','Ordre','Limite']);

        // Stocker les nouvelles valeurs dans la session si elles existent
        
        if ($request->filled('branche')) {
            session()->put('branche', $request->branche);
        }
        if ($request->filled('assure')) {
            session()->put('assure', $request->assure);
        }
        if ($request->filled('dateSinistre')) {
            session()->put('dateSinistre', $request->dateSinistre);
        }
        if ($request->filled('sinistre')) {
            session()->put('sinistre', $request->sinistre);
        }
        if ($request->filled('police')) {
            session()->put('police', $request->police);
        }
        if ($request->filled('Immatricule')) {
            session()->put('Immatricule', $request->Immatricule);
        }
        if ($request->filled('Ordre')) {
            session()->put('Ordre', $request->Ordre);
        }
        if ($request->filled('Limite')) {
            session()->put('Limite', $request->Limite);
        }
        $query = DB::table('requisition as r')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->where('r.CodeComp', session('compagnie'))
            ->whereNull('r.Annulation')
            ->where('r.CodeClient', session('agence'));
        // Filtrage basé sur les critères de recherche
        if ($request->filled('assure')) {
            $query->where('r.Assure', 'LIKE', '%' . $request->assure . '%');
        }

        if ($request->filled('branche')) {
            $query->where('r.Branche', $request->branche);
        }

        if ($request->filled('dateSinistre')) {
            $query->whereDate('r.DateSinistre', '>=', $request->dateSinistre);
        }
        $query->orderBy('r.Structure', 'asc')
            ->orderBy('r.Exercice', 'desc')
            ->orderBy('r.Branche', 'desc')
            ->orderBy('r.NoReq', 'desc');
        // Pagination
        $requisitions = $query->paginate(10);
        
        //dd($requisitions);
        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
            'pagination' => (string) $requisitions->links(), // Générer les liens de pagination
        ]);
    }


    public function paginate(Request $request)
    {   
        $query = DB::table('requisition as r')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->where('r.CodeComp', session('compagnie'))
            ->whereNull('r.Annulation')
            ->where('r.CodeClient', session('agence'));
        if (session()->has('structure')) {
            // La variable de session 'structure' existe et n'est pas nulle
            $structure = session('structure');
            $query->where('r.Structure', $structure);
        }
            
        
        if (session()->has('branche')) {
            $branche = session('branche');
            $query->where('r.Branche', $branche);
        }
        else {
            $query->where('r.Branche', 1);
        }
        if (session()->has('date1')) {
            $date1 = session('date1');
            $query->where('r.DateEnreg', '>=',  $date1);
        }
        if (session()->has('date2')) {
            $date2 = session('date2');
            $query->where('r.DateEnreg', '<=',  $date2);
        }
        if (session()->has('assure')) {
            $assure = session('assure');
            $query->where('r.Assure', 'LIKE', '%' . $assure . '%');
        }
        if (session()->has('dateSinistre')) {
            $dateSinistre = session('dateSinistre');
            $query->whereDate('r.DateSinistre', '=', $dateSinistre);
        }
        if (session()->has('sinistre')) {
            $sinistre = session('sinistre');
            $query->where('r.NoSinistre', 'LIKE', '%' . $sinistre . '%');
        }
        if (session()->has('police')) {
            $police = session('police');
            $query->where('r.NoPolice', 'LIKE', '%' . $police . '%');
        }
        if (session()->has('Immatricule')) {
            $Immatricule = session('Immatricule');
            $query->where('r.NoImmatricule', 'LIKE', '%' . $Immatricule . '%');
        }
        if (session()->has('Ordre')) {
            $Ordre = session('Ordre');
            
        }
        if (session()->has('Limite')) {
            $Limite = session('Limite');
           
        }
        $query->orderBy('r.Structure', 'asc')
                    ->orderBy('r.Exercice', 'desc')
                    ->orderBy('r.Branche', 'desc')
                    ->orderBy('r.NoReq', 'desc');

        // Récupérer les résultats paginés
        $requisitions = $query->paginate(10);

        // Retourner la réponse AJAX avec les résultats et la pagination
        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
            'pagination' => (string) $requisitions->links(), // Générer les liens de pagination
        ]);
    }
    /*public function fetchRequisitions(Request $request)
    {
        $requisitions = DB::table('requisition as r')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->where('r.CodeComp', session('compagnie'))
            ->where('r.CodeClient', session('agence'))
            ->where('r.Branche', 1)
            ->orderBy('r.Structure', 'asc')
            ->orderBy('r.Exercice', 'desc')
            ->orderBy('r.Branche', 'desc')
            ->orderBy('r.NoReq', 'desc')
            ->paginate(10);
        
        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
            'pagination' => (string)$requisitions->links(),
        ]);
    }
    public function fetchRequisitionsAvance(Request $request)
    {
        $requisitions = DB::table('requisition as r')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->where('r.CodeComp', session('compagnie'))
            ->where('r.CodeClient', session('agence'))
            ->where('r.Branche', 1)
            ->orderBy('r.Structure', 'asc')
            ->orderBy('r.Exercice', 'desc')
            ->orderBy('r.Branche', 'desc')
            ->orderBy('r.NoReq', 'desc')
            ->paginate(10);
            dd($requisitions);
        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
            'pagination' => (string)$requisitions->links(),
        ]);
    }*/
}
