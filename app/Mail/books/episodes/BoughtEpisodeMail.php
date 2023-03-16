<?php

namespace App\Mail\books\episodes;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoughtEpisodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailData = $this->mailData;

        return $this
            ->from($address = 'noreply@comiee.one', $name = 'Comiee Teams')
            ->to($mailData['user']->email)
            ->view('emails.books.episodes.BoughtEpisode')
            ->subject($mailData['user']->name . '様、ご購入いただいたエピソードをお楽しみいただけます！どうぞお楽しみください🍿');
    }
}
