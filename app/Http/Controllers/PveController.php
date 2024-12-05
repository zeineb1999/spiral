<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PveController extends Controller
{
    public function show($id)
    {
        // Récupérez les données nécessaires depuis votre base de données
        $requisition = Requisition::find($id); // Modifiez selon votre modèle
        $car = $requisition->carData; // Exemple : données sur le véhicule
        $chocs = $requisition->chocsData; // Exemple : données sur les chocs
        $fournitures = $requisition->fournituresData; // Exemple : données des fournitures
        $rowRep = $requisition->repairSummary; // Exemple : résumé des réparations

        // Envoyez les données à la vue
        return view('pve.show', compact('requisition', 'car', 'chocs', 'fournitures', 'rowRep'));
    }
}
