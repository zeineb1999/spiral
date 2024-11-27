<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class RequisitionController extends Controller
{
    public function index()
    {
        // Récupérer toutes les réquisitions depuis la base de données
       
      
        $username = trim(session('username')); // Supprimer les espaces autour du username

        $requisitions = DB::table('requisition')
       
        ->paginate(50);


        dd($requisitions);


        // Passer les données à la vue
        return view('test', compact('requisitions'));
    }
}
