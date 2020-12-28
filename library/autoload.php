<?php

    // User plugins
    # require_once 'plugins/Mail/Exception.php';
    # require_once 'plugins/Mail/SMTP.php';
    # require_once 'plugins/Mail/POP3.php';
    # require_once 'plugins/Mail/OAuth.php';
    # require_once 'plugins/Mail/PHPMailer.php';
   
    // Include configuration files
    require_once 'config/Config.php';
    require_once 'config/Routes.php';
    
    // Include default plugins
    require_once 'plugins/Db/MysqliDb.php';
    
    // Include Glowie modules
    require_once 'core/Error.php';
    require_once 'core/Objectify.php';
    require_once 'core/Util.php';
    require_once 'core/Rails.php';
    require_once 'core/Controller.php';
    require_once 'core/Session.php';
    require_once 'core/Kraken.php';
    require_once 'core/Validator.php';

    // Inlude models
    foreach (glob('models/*.php') as $filename) require_once($filename);

    // Include controllers
    foreach(glob('controllers/*.php') as $filename) require_once($filename);

?>