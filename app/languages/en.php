<?php

    /*
        ---------------------------------------
        Application internationalization file
        ---------------------------------------
        In this folder you can setup internationalization strings for multilanguage applications.
        Check Glowie docs to know how to get started.
    */

    Babel::set('en', [
        'message' => 'Hello, this is my first internationalization message.',
        'instructions' => 'Use this array to set all strings you want.'
    ]);

    // Sets the current active language
    Babel::setActiveLanguage('en');

?>