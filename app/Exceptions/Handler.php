<?php

namespace App\Exceptions;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // page expiredしたときはログイン画面を返す
            if ($e->getPrevious() instanceof \Illuminate\Session\TokenMismatchException) {
                return redirect()->route('login');
            };
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Slackにエラーレポートを送信
    |--------------------------------------------------------------------------
    |
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);

        if ($this->shouldReport($exception)) {
            $this->sendToSlack($exception);
        }
    }
    protected function sendToSlack(Throwable $exception)
    {
        // APP_ENV が 'local' の場合は Slack への通知を行わない
        if (env('APP_ENV') === 'local') {
            return;
        }

        try {
            $client = new Client();
            $client->post(env('SLACK_WEBHOOK_URL'), [
                'json' => [
                    'text' => env('APP_ENV') . '環境でエラーが発生しました: ' . $exception->getMessage(),
                    'attachments' => [
                        [
                            'fields' => [
                                [
                                    'title' => 'ファイル',
                                    'value' => $exception->getFile(),
                                    'short' => true,
                                ],
                                [
                                    'title' => '行',
                                    'value' => $exception->getLine(),
                                    'short' => true,
                                ],
                                [
                                    'title' => 'エラーコード',
                                    'value' => $exception->getCode(),
                                    'short' => true,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
        } catch (Exception $e) {
            Log::error('Slackへのエラー通知に失敗しました: ' . $e->getMessage());
        }
    }
}
