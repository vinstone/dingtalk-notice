<?php

return [
    'default' => [
        'enabled' => env('DINGTALK_ENABLED', true),
        'access_token' => env('DINGTALK_ACCESS_TOKEN', ''),
        'timeout' => env('DINGTALK_TIMEOUT', 2.0),
        'ssl_verify' => env('DINGTALK_SSL_VERIFY', true),
        'secret' => env('DINGTALK_SECRET', true),
    ],
];
