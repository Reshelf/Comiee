<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\User;
use App\Notifications\UserAndBookCountNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendUserCountToSlack extends Command
{
    protected $signature = 'user:sendcount';

    protected $description = 'SlackにComieeの総ユーザー数と総作品数を通知します';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userCount = User::count();
        $bookCount = Book::count();
        $notification = new UserAndBookCountNotification($userCount, $bookCount);
        Notification::route('slack', env('SLACK_WEBHOOK_URL'))->notify($notification);
        $this->info('SlackにComieeの総ユーザー数と総作品数を通知しました');
    }
}
