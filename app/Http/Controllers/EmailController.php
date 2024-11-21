<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {    dd("EmailControlleur",$request->all(), $request->file('images'), $request->file('pdfs'));
        // Valider les données
 
        try {
            $request->validate([
                'email' => 'required|email',
                'images.*' => 'nullable|mimes:jpg,jpeg,png|max:20480',
                'pdfs.*' => 'nullable|mimes:pdf|max:20480',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd("Validation failed", $e->errors());
        }
        
      
        // Récupérer les fichiers uploadés
        $attachments = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $photo) {
                $attachments[] = $photo->store('attachments', 'public');
            }
        }
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $pdf) {
                $attachments[] = $pdf->store('attachments', 'public');
            }
        }
        
        // Construire les données pour l'email
        $data = 'Voici un email avec des fichiers joints.';
        dd($attachments, $data);
        // Envoyer l'email avec les fichiers attachés
        try {
            Mail::to($request->email)->send(new TestEmail($data, $attachments));

            return redirect()->back()->with('success', 'Email envoyé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email : ' . $e->getMessage());
        }
    }
}
