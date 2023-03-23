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

        $SLACK_ERR_WEBHOOK_URL = env('SLACK_DEBUG_WEBHOOK_URL');

        if (!empty($SLACK_ERR_WEBHOOK_URL)) {
            $client = new Client();

            $client->post($SLACK_ERR_WEBHOOK_URL, [
                'json' => [
                    'text' => $message,
                ],
            ]);
        }
    }
}
