<?php

    /*
        ---------------------------------------
        Application internationalization file
        ---------------------------------------
        In this folder you can setup internationalization strings for multilanguage applications.
        Check Glowie docs to know how to get started.
    */

    Babel::set('en', [
        'forbidden' => 'You are not allowed to access this page',
        'not_found' => 'The page you were looking for was not found',
        'not_allowed' => 'The current method is not allowed'
    ]);

    // Sets the current active language
    Babel::setActiveLanguage('en');

?>