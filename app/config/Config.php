<?php

/*
    --------------------------------
    Application configuration
    --------------------------------
    In this file you can define your global application configuration.
    Some settings are retrieved from the environment config file. Be sure to rename ".env.example" to ".env" first.

    -----------------------------------------------------------------------------------------
    WARNING: Sensitive data should never be stored here! Use the environment config instead.
    -----------------------------------------------------------------------------------------
*/

return [

    // Application name
    'app_name' => 'Glowie',

    // Current environment name
    'env' => env('APP_ENV', 'development'),

    // Application maintenance mode
    'maintenance' => [

        // Enable maintenance mode
        'enabled' => env('APP_MAINTENANCE', false),

        // Maintenance mode bypass key
        'bypass_key' => env('MAINTENANCE_KEY')

    ],

    // Skeltch templating engine
    'skeltch' => [

        // Enable Skeltch compiler
        'enabled' => true,

        // Enable views caching
        'cache' => true,

        // Cache files location
        'path' => storage_path('cache')

    ],

    // Application error reporting
    'error_reporting' => [

        // Error reporting level
        'level' => env('APP_DEBUG', true) ? E_ALL : 0,

        // Enable error logging
        'logging' => true,

        // Error log file location
        'file' => storage_path('error.log')

    ],

    // Application session management
    'session' => [

        // Session cookie name
        'name' => 'app_session',

        // Unused session lifetime
        'lifetime' => 120,

        // Number of requests when to run the garbage collector
        'gc_cleaning' => 50,

        // Session files location
        'path' => storage_path('session'),

        // Allow session usage only in secure connections (https)
        'secure' => false,

        // Restrict session access to the HTTP protocol only
        'restrict' => true

    ],

    // Application cookies management
    'cookies' => [

        // Allow cookies usage only through secure connections (https)
        'secure' => false,

        // Restrict cookies access to the HTTP protocol only
        'restrict' => true

    ],

    // Application secret keys
    'secret' => [

        // Key used in encrypting functions
        'app_key' => env('APP_KEY'),

        // Token used in encrypting functions
        'app_token' => env('APP_TOKEN')

    ],

    // Application database connection settings
    'database' => [

        // Default connection
        'default' => [
            'driver' => env('DB_DRIVER', 'mysql'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'db' => env('DB_DATABASE', 'glowie'),
            'port' => (int) env('DB_PORT', 3306),
            'charset' => 'utf8',
            'strict' => false,
            'options' => []
        ]

    ],

    // Authentication settings
    'auth' => [

        // Default auth guard
        'default' => [
            // Users model
            'model' => \Glowie\Models\Users::class,

            // User field name
            'user_field' => 'email',

            // Password field name
            'password_field' => 'password'
        ]

    ],

    // Migrations settings
    'migrations' => [

        // Migrations history table name
        'table' => 'migrations'

    ],

    // Queue settings
    'queue' => [

        // Queue jobs table name
        'table' => 'queue',

        // Max attempts to retry failed jobs
        'max_attempts' => 3

    ],

    // Cache settings
    'cache' => [

        // Cache file path
        'path' => storage_path('cache/cache.db')

    ],

    // Cross-Origin Resource Sharing (CORS) settings
    'cors' => [

        // Enable CORS headers
        'enabled' => true,

        // List of allowed methods (use * for all)
        'allowed_methods' => ['*'],

        // List of allowed origins (use * for all)
        'allowed_origins' => ['*'],

        // List of allowed headers (use * for all)
        'allowed_headers' => ['*'],

        // List of exposed headers
        'exposed_headers' => [],

        // Preflight request cache time
        'max_age' => 0,

        // Allow credentials to be exposed
        'allow_credentials' => false

    ],

    // Application plugins
    'plugins' => [],

    // Firefly Sandbox settings
    'sandbox' => [

        // Sandbox class alias list
        'alias' => [
            'Factory' => \Glowie\Core\Database\Factory::class,
            'Kraken' => \Glowie\Core\Database\Kraken::class,
            'Model' => \Glowie\Core\Database\Model::class,
            'Skeleton' => \Glowie\Core\Database\Skeleton::class,
            'Rails' => \Glowie\Core\Http\Rails::class,
            'Queue' => \Glowie\Core\Queue\Queue::class,
            'Cache' => \Glowie\Core\Tools\Cache::class,
            'Crawler' => \Glowie\Core\Tools\Crawler::class,
            'Mailer' => \Glowie\Core\Tools\Mailer::class,
            'Validator' => \Glowie\Core\Tools\Validator::class,
            'Collection' => \Glowie\Core\Collection::class,
            'Element' => \Glowie\Core\Element::class
        ]

    ],

    // Application miscellaneous settings
    'other' => [

        // Application URL (for CLI route mocking only)
        'url' => env('APP_URL', 'http://127.0.0.1'),

        // Default language
        'language' => 'en',

        // Default timezone
        'timezone' => 'America/Sao_Paulo'

    ]

];
