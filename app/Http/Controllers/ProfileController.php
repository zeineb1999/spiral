<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Si vous utilisez un modèle Client
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Afficher le profil
    public function showProfile()
    {
        $username = session('username');
        return DB::table('client')->where('username', $username)->first();
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
