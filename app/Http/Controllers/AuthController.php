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
        $user = DB::table('client')
       
            ->where('client.Username', $username)
            ->where('client.Motdepasse', $password) // Il est conseillé d'utiliser Hash::check pour vérifier les mots de passe

            ->first();
       

        if ($user) {
            // Démarrer une session
            session([
                'username' => $user->Username,
                'compagnie' => $user->CodeComp,
                'agence' => $user->CodeClient,
                'designation' => $user->Designation,
            ]);

            // Redirection après succès
            return redirect()->intended('test'); // ou vers une autre page selon le besoin
        } else {
            // Message d'erreur si l'utilisateur n'est pas trouvé
            return back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect!');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();  // Déconnecter l'utilisateur
        $request->session()->invalidate();  // Invalider la session
        $request->session()->regenerateToken();  // Régénérer le token CSRF

        return redirect()->route('login');  // Rediriger l'utilisateur vers la page de connexion
    }

}
