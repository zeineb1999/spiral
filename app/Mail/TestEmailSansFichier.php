<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmailSansFichier extends Mailable
{
    use SerializesModels;

    public $subject;
    public $userMessage;

    // Constructeur pour initialiser l'objet et le message
    public function __construct($name, $email, $subject, $userMessage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->userMessage = $userMessage;
    }

    public function build()
    {
        return $this->view('emails.testMessage')  // Utilise la vue test (que vous devez créer)
                    ->subject($this->subject)  // L'objet de l'email
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'usermessage' => $this->userMessage,  // Le contenu du message
                    ]);
    }
}
