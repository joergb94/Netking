<?php

return [
    'name' => "Keypl's",
    'manifest' => [
        'name' => env('APP_NAME', "Keypl's"),
        'short_name' => "Keypl's",
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.jpg',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.jpg',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128x128.jpg',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.jpg',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.jpg',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.jpg',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384x384.jpg',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.jpg',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.jpg',
            '750x1334' => '/images/icons/splash-750x1334.jpg',
            '828x1792' => '/images/icons/splash-828x1792.jpg',
            '1125x2436' => '/images/icons/splash-1125x2436.jpg',
            '1242x2208' => '/images/icons/splash-1242x2208.jpg',
            '1242x2688' => '/images/icons/splash-1242x2688.jpg',
            '1536x2048' => '/images/icons/splash-1536x2048.jpg',
            '1668x2224' => '/images/icons/splash-1668x2224.jpg',
            '1668x2388' => '/images/icons/splash-1668x2388.jpg',
            '2048x2732' => '/images/icons/splash-2048x2732.jpg',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.jpg",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
