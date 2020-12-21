<?php
   
    // Include configuration files
    require_once 'config/DefaultConfig.php';
    require_once 'config/Config.php';
    
    // Include default plugins
    require_once 'plugins/Db/MysqliDb.php';
    require_once 'plugins/Mail/Exception.php';
    require_once 'plugins/Mail/PHPMailer.php';
    require_once 'plugins/Mail/SMTP.php';
    
    // Include Glowie modules
    require_once 'core/Error.php';
    require_once 'core/Rails.php';
    require_once 'core/Glowie.php';
    require_once 'core/Util.php';
    require_once 'core/Kraken.php';

    // Include controllers
    foreach(glob('library/controller/*.php') as $filename) require_once($filename);

?>