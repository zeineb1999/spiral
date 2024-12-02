<?php
namespace App\Http\Controllers;

use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function indexTest(RequisitionController $requisitionController, ProfileController $profileController)
    {
        // Récupérer les données des autres contrôleurs
        $requisitions = $requisitionController->index(); // Assurez-vous que cette méthode retourne les données
        $profile = $profileController->showProfile(); // Assurez-vous que cette méthode retourne les données
        $structures = DB::table('structure')->get();

        // Passer les données à la vue
        return view('test', [
            'requisitions' => $requisitions,
            'client' => $profile,
            'structures'=>$structures
        ]);
    }
}
