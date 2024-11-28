<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Symfony\Component\Mime\Part\File;
use Symfony\Component\Mime\Email;
use App\Mail\TestEmailSansFichier;
class EmailController extends Controller
{
    public function sendEmailWithPhoto(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'email' => 'required|email',
            'photo' => 'required|file|mimes:jpg,png,jpeg,pdf|max:10240', // S'assurer que c'est un fichier valide
        ]);

        $email = $validated['email'];
        $photo = $request->file('photo');  // Récupérer le fichier de la requête

        // Vérifier si le fichier existe et l'attacher à l'email
        if ($photo && $photo->isValid()) {
            // Récupérer le chemin du fichier
            $path = $photo->getRealPath();
            $name = $photo->getClientOriginalName();  // Récupérer le nom original du fichier

            // Envoyer l'email avec la pièce jointe
            Mail::to($email)->send(new TestEmail($path, $name));  // Passer le fichier au Mailable
            return redirect()->back()->with('success', 'Message sent successfully!');
        } else {
            // Gérer l'erreur si le fichier photo n'est pas valide
            return back()->withErrors(['photo' => 'Fichier photo invalide']);
        }
    }

    public function sendMessage(Request $request)
    {
        
         // Validation des champs
        $validated = $request->validate([
           
            'subject' => 'required|string',  // L'objet de l'email
            'message' => 'required|string',  // Le contenu du message
            'name' => 'required|string',    // Le nom de l'utilisateur
            'email' => 'required|email',    // L'email de l'utilisateur
        ]);

        $name = $validated['name'];
        $email = $validated['email'];
        $subject = $validated['subject'];
        $userMessage = $validated['message'];

        // Envoyer l'email sans pièce jointe
        Mail::to('zeineb.ara@hotmail.fr')->send(new TestEmailSansFichier($name, $email, $subject, $userMessage));

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }
}
