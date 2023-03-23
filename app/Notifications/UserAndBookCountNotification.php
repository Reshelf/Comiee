<?php

namespace App\Notifications;

use GuzzleHttp\Client;
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

    public function via($notifiable)
    {
        $message = "現在のユーザー数: {$this->userCount}\n現在の作品数: {$this->bookCount}";

        $client = new Client();
        $client->post(env('SLACK_WEBHOOK_URL'), [
            'json' => ['text' => $message],
        ]);

        return []; // Return an empty array to prevent using any other channels
    }
}
