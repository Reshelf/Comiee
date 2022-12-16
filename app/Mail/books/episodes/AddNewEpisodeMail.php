<?php

namespace App\Mail\books\episodes;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddNewEpisodeMail extends Mailable
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
            ->from($address = 'noreply@starbooks.one', $name = 'Starbooks Teams')
            ->to($mailData['bookLikesUserEmails'])
            ->view('emails.books.episodes.newEpisode')
            ->subject($mailData['book']->title . 'の新しいエピソードが投稿されました。');
    }
}
