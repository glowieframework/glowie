<?php

    /*
        --------------------------------
        Application bootstrapper
        --------------------------------
        This file is responsible for loading all Glowie modules and application files.

        ---------------------------------------------
        We do not recommend editing below this line.
        ---------------------------------------------
    */

    // Include plugins
    require_once('plugins/autoload.php');
   
    // Include configuration files
    require_once('config/Config.php');
    require_once('config/Routes.php');
    
    // Include Glowie core
    require_once('core/Error.php');
    require_once('core/Util.php');
    require_once('core/Objectify.php');
    require_once('core/Rails.php');
    require_once('core/Controller.php');
    require_once('core/Session.php');
    require_once('core/Crawler.php');
    require_once('core/Kraken.php');
    require_once('core/Validator.php');
    require_once('core/Uploader.php');
    require_once('core/Babel.php');

    // Include languages
    foreach (glob('languages/*.php') as $filename) require_once($filename);

    // Inlude models
    foreach (glob('models/*.php') as $filename) require_once($filename);

    // Include controllers
    foreach(glob('controllers/*.php') as $filename) require_once($filename);

?>