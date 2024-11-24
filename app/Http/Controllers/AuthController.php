<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        // Validation des champs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Requête pour vérifier l'utilisateur dans la base de données
        $user = DB::table('user')
            ->join('employe', 'user.UserID', '=', 'employe.IdEmploye')
            ->join('structure', 'employe.Structure', '=', 'structure.Code')
            ->join('direction', 'structure.Direction', '=', 'direction.Code')
            ->where('user.UserID', $username)
            ->where('user.Password', $password) // Il est conseillé d'utiliser Hash::check pour vérifier les mots de passe
            ->where('user.Enabled', 1)
            ->first();
       

        if ($user) {
            // Démarrer une session
            session([
                'username' => $user->UserID,
                'name' => $user->Nom . ' ' . $user->Prenom,
                'structure' => $user->Structure,
                'direction' => $user->Direction,
                'structurename' => $user->Structure,
                'directionname' => $user->Direction,
            ]);

            // Redirection après succès
            return redirect()->intended('accueil'); // ou vers une autre page selon le besoin
        } else {
            // Message d'erreur si l'utilisateur n'est pas trouvé
            return back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect!');
        }
    }

    public function logout()
    {
        session()->flush(); // Détruire toutes les données de session
        return redirect()->route('login');
    }
}
