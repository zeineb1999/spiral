<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use SerializesModels;

    public $data;
    public $attachments;

    public function __construct($data, $attachments = [])
    {
        $this->data = $data;
        $this->attachments = $attachments;
    }

    public function build()
    {
        dd("testEmail",$this->attachments);
        $email = $this->subject('Email avec Pièces Jointes')
                      ->view('emails.test')
                      ->with(['data' => $this->data]);

        // Ajouter les pièces jointes
        foreach ($this->attachments as $file) {
            $email->attach(storage_path('app/public/' . $file));
        }

        return $email;
    }
}
