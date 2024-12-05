<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PveController extends Controller
{
    public function show($id)
    {   
        // Récupérez les données nécessaires depuis votre base de données
        $requisition = DB::table('requisition as r')
        ->where('r.NoReq', $id)
        ->first();
       
       
        // Envoyez les données à la vue
        return view('pve.show', compact('requisition'));
    }
}
