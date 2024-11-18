<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Default CORS Settings
     |--------------------------------------------------------------------------
     |
     | This configuration file is used to define the CORS settings for your
     | application. You can adjust the settings for your application as needed.
     |
     */

    'paths' => ['api/*'], // Appliquer CORS uniquement aux routes API
    'allowed_methods' => ['*'], // Permet toutes les méthodes HTTP (GET, POST, PUT, DELETE, etc.)
    'allowed_origins' => ['http://localhost:4200'], // Frontend Angular
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Permet tous les headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
