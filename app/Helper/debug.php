<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Slackにログを出力
|--------------------------------------------------------------------------
|
 */
if (!function_exists('slack_log')) {
    function slack_log($message)
    {
        if (is_array($message) || is_object($message)) {
            $message = json_encode($message, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        Log::info($message);

        $slack_webhook_url = env('SLACK_DEBUG_WEBHOOK_URL');

        if (!empty($slack_webhook_url)) {
            $client = new Client();

            $client->post($slack_webhook_url, [
                'json' => [
                    'text' => $message,
                ],
            ]);
        }
    }
}
