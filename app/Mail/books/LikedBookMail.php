<?php

namespace App\Mail\books;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LikedBookMail extends Mailable
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
            ->to($mailData['received_user']->email)
            ->view('emails.books.liked')
            ->subject($mailData['send_user']->name . 'が' . $mailData['book']->title . 'をお気に入りに追加しました。');
    }
}
