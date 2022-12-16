<?php

namespace App\Mail\books\episodes\comments;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LikedCommentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($address = 'noreply@starbooks.one', $name = 'Starbooks Teams')
            ->view('emails.books.liked')
            ->subject('あなたのコメントがいいねされました！');
    }
}
