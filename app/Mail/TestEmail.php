<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use SerializesModels;

    // Données pour l'email
    public $data;

    /**
     * Créer une nouvelle instance de message.
     *
     * @param string $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Construire le message.
     *
     * @return $this
     */
    public function build()
    {
        // Construction de l'email avec un sujet et une vue
        return $this->subject('Email avec Pièces Jointes')
                    ->view('emails.test')  // Vue de l'email (tu peux la personnaliser)
                    ->with([
                        'data' => $this->data,
                    ])
                    // Ajouter une photo en pièce jointe
                    ->attach(public_path('images/testpng.png'))  // Chemin relatif depuis le dossier public
                    // Ajouter un fichier PDF en pièce jointe
                    ->attach(public_path('pdfs/pdftest.pdf'));  // Chemin relatif depuis le dossier public
    }
}
