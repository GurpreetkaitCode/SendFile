<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFile extends Mailable
{
    use Queueable, SerializesModels;
    public $file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.SendFile')
            ->subject('Welcome to finance hub')
            ->attach(
                $this->file->getRealPath(),
                [
                    'as' =>  $this->file->getClientOriginalName(),
                    'mime' =>  $this->file->getClientMimeType(),
                ]
            );
    }
}
