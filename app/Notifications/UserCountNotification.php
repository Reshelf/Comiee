<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class UserCountNotification extends Notification
{
    protected $userCount;

    public function __construct($userCount)
    {
        $this->userCount = $userCount;
    }

    public function toSlack()
    {
        return (new SlackMessage)
            ->content('Comieeの現在のユーザー数: ' . $this->userCount);
    }
}
