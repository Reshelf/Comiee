<?php

namespace App\Mail\books;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddNewBookMail extends Mailable
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
            ->to($mailData['followers'])
            ->view('emails.books.newBook')
            ->subject($mailData['send_user']->name . 'さんが新しい作品を投稿しました。');
    }
}
