<?php

    /*
        ---------------
        PLUGIN AUTOLOAD
        ---------------
        In this file you can load any third-party plugins to your application.
    */

    // MysqliDb - MySQL query builder
    // *This plugin is required by Glowie when working with databases*
    require_once('Db/MysqliDb.php');

    // PHPMailer - Email sending plugin
    require_once('Mail/Exception.php');
    require_once('Mail/SMTP.php');
    require_once('Mail/PHPMailer.php');

?>