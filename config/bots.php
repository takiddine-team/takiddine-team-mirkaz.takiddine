<?php

return [
    'telegram' => [
        'active' => env('TELEGRAM_ERRORS_BOT', true),
        'bot_id' => env('TELEGRAM_ERRORS_BOT_ID'),
        'channels' => [
            'errors' => [
                'active' => env('TELEGRAM_ERRORS_BOT', false),
                'id' => env('TELEGRAM_ERRORS_CHANNEL')
            ],
            // 'backups' => [
            //     'active' => env('TELEGRAM_BACKUPS', false),
            //     'id' => env('TELEGRAM_BACKUPS_CHANNEL')
            // ]
        ]
    ],
    'clickup' => [
        'active' => env('CLICKUP_BOT', true),
    ],
];