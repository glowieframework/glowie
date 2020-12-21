<?php
   
    // Include configuration files
    require_once 'config/Config.php';
    require_once 'config/Routes.php';
    
    // Include default plugins
    require_once 'plugins/Db/MysqliDb.php';
    
    // Include Glowie modules
    require_once 'core/Error.php';
    require_once 'core/Rails.php';
    require_once 'core/Controller.php';
    require_once 'core/Util.php';
    require_once 'core/Kraken.php';

    // Include controllers
    foreach(glob('library/controllers/*.php') as $filename) require_once($filename);

?>