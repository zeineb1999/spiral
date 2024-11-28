<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Si vous utilisez un modèle Client
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Afficher le profil
    public function showProfile()
    {
        // Récupérer le 'username' à partir de la session
        $username = session('username');
        // Récupérer le client dont le 'username' est égal à la variable de session 'username'
        $client = DB::table('client')
        ->where('client.Username', $username);
        dd($client);
        // Retourner la vue 'profile' avec les données du client
        return view('profile', compact('client'));
    }

    // Mettre à jour les informations du profil
    public function updateProfile(Request $request)
    {
        // Validation des données envoyées
        $validated = $request->validate([
            
            'Email' => 'required|email|max:255',
            'Tel' => 'required|string|max:15',
            'Website' => 'nullable|url',
            'Adresse' => 'nullable|string|max:255',
            
        ]);

        // Récupérer l'utilisateur connecté
        $client = Auth::user();
        
        // Mettre à jour les informations
        $client->update($validated);

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
