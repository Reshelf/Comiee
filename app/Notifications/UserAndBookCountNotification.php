<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class UserAndBookCountNotification extends Notification
{
    protected $userCount;
    protected $bookCount;

    public function __construct($userCount, $bookCount)
    {
        $this->userCount = $userCount;
        $this->bookCount = $bookCount;
    }

    public function toSlack()
    {
        return (new SlackMessage)
            ->content("現在のユーザー数: {$this->userCount}\n現在の作品数: {$this->bookCount}");
    }
}
