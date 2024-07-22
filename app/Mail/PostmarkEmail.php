<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Postmark\PostmarkClient;

class PostmarkEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from(config('mail.from.address'), config('mail.from.name'))
        //             ->subject($this->data['subject'])
        //             ->view('emails.postmark')
        //             ->with('data', $this->data);

    }
}
