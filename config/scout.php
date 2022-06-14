<?php

return [

    'driver' => env('SCOUT_DRIVER', 'opensearch'),

    'opensearch' => [
        'host' => env('OPENSEACH_HOST', 'http://localhost:9200'),
        'user' => env('OPENSEACH_USER', 'admin'),
        'pass' => env('OPENSEACH_PASS', 'admin'),
    ],

];
