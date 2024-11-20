<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailWithAttachment;

class FileController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function sendEmail(Request $request)
    {
        // Validation des fichiers
        $validatedData = $request->validate([
            'photo' => 'required|file|mimes:jpeg,png,jpg',
            'pdf' => 'required|file|mimes:pdf',
        ]);

        // Préparer les fichiers
        $photo = $request->file('photo');
        $pdf = $request->file('pdf');

        // Créer une instance de l'email
        //Mail::to('zeineb.ara@gmail.com')->send(new SendMailWithAttachment($photo, $pdf));
        Mail::raw('Hello', function ($message) {
            $message->to('zeineb.ara@hotmail.fr')
                    ->subject('Test d\'envoi de mail');
        });
        return redirect()->route('sendEmail')->with('success', 'E-mail envoyé avec succès!');

    }
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
        if (!isset($mailData) || empty($mailData)) {
            // Gérer l'erreur ou définir une valeur par défaut
            return response()->json(['error' => 'Données de l\'email manquantes'], 400);
        }
        dd($mailData);
  
        Mail::to('zeineb.ara@hotmail.fr')->send(new SendMailWithAttachment($mailData));
             
        dd("Email is sent successfully.");
    }
  

}
