<?php

return [
    'driver'     => 'nsq',
    'topic'      => 'default', // Default topic to push to
    'channel'    => env('NSQ_CHANNEL_DEFAULT', 'web'),
    'nsq'        => [
        'addresses' => array_filter(explode(',', env('NSQSD_URL', '127.0.0.1:9150'))),
        'logdir'    => '/tmp',
    ],
    'nsqlookup'  => [
        'addresses' => array_filter(explode(',', env('NSQLOOKUP_URL', '127.0.0.1:9150'))),
    ],
    'identify'   => [
        'user_agent' => env('NSQ_USER_AGENT', 'merkeleon/laravel-nsq-2.0'),
        'heartbeat_interval' => 60000,
    ],
    'timeout'    => [
        'connection' => env('NSQ_CONNECTION_TIMEOUT', 2), // seconds
        'read'       => env('NSQ_READ_TIMEOUT', null), // seconds; use NULL for blocking mode (default),
        'write'      => env('NSQ_WRITE_TIMEOUT', 2), // seconds; use NULL for blocking mode (default),
        'requeue'    => env('NSQ_REQUEUE_TIMEOUT', 10), // seconds,

    ],
    'blocking'   => env('NSQ_BLOCKING_MODE', true), // Open socket in blocking mode
    'ready'      => env('NSQ_MESSAGES_READY', 1), // How many messages read from queue per call
    'attempts' => [
        'write' => env('NSQ_WRITE_ATTEMPTS', 3), // Number of attempts for write message into the queue before it throw exception
    ]
];
