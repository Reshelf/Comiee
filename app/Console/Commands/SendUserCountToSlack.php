<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\UserCountNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendUserCountToSlack extends Command
{
    protected $signature = 'user:sendcount';

    protected $description = 'SlackにComieeの総ユーザー数を通知します';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userCount = User::count();
        $notification = new UserCountNotification($userCount);
        Notification::route('slack', env('SLACK_WEBHOOK_URL'))->notify($notification);
        $this->info('SlackにComieeの総ユーザー数を通知しました');
    }
}
