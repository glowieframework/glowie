<?php

    /*
        ---------------------------------------
        Application internationalization file
        ---------------------------------------
        In this folder you can setup internationalization strings for multilanguage applications.
        Check Glowie docs to know how to get started.
    */

    return [

        // Error messages
        'errors' => [

            // 403 error message
            'forbidden' => 'You are not allowed to access this page',

            // 404 error message
            'not_found' => 'The page you were looking for was not found',

            // 405 error message
            'not_allowed' => 'The current method is not allowed',

            // 429 error message
            'rate_limit' => 'Request limit reached, please wait',

            // 503 error message
            'service_unavailable' => 'We will be back soon'

        ],

        // Auth demo messages
        'auth' => [

            // Login required
            'login_required' => 'You must login first!',

            // Invalid login info
            'invalid_login' => 'Invalid login information!',

            // User not found
            'invalid_user' => 'This user does not exist!',

            // Wrong password
            'invalid_password' => 'Incorrect password!',

            // Password validation
            'password_empty' => 'Passwords cannot be empty!',

            // Password confirm validation
            'password_mismatch' => "Passwords don't match!",

            // Password changed message
            'password_changed' => 'Password changed!',

        ]

    ];

?>