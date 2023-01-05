<?php

namespace App\Mail\others;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $body)
    {
        $this->user = $user;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($address = 'noreply@comiee.one', $name = 'Comiee Teams')
            ->view('emails.others.contact')
            ->subject('ユーザーからお問い合せがありました！');
    }
}
