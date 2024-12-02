<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class RequisitionController extends Controller
{
    public function index()
    {
        
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
            ->where('r.Branche', 1)
            ->orderBy('r.Structure', 'asc')  // Trier par 'r.Structure' en ordre décroissant
            ->orderBy('r.Exercice', 'desc')  // Trier par 'r.CodeComp' en ordre décroissant
            ->orderBy('r.Branche', 'desc') // Trier par 'r.CodeClient' en ordre décroissant
            ->orderBy('r.NoReq', 'desc')
            ->paginate(10);
    }
    

    public function filter(Request $request)
    {
        
        // Récupérer les requisitions avec les filtres appliqués
        $query = DB::table('requisition as r')
            ->join('employe as e', 'r.Expert', '=', 'e.IdEmploye')
            ->join('structure as s', 'r.Structure', '=', 's.Code')
            ->where('r.CodeComp', session('compagnie'))
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

        $requisitions = $query->paginate(20);
        

        return response()->json([
            'html' => view('requisitions', compact('requisitions'))->render(),
        ]);
    }


}
