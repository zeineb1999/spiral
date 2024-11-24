<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use SerializesModels;

    public $filePath;
    public $fileName;

    public function __construct($filePath, $fileName)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }

    public function build()
    {
        return $this->view('emails.test')
                    ->attach($this->filePath, [
                        'as' => $this->fileName,
                        'mime' => 'application/pdf', // Ou le type MIME approprié
                    ]);
    }
}
