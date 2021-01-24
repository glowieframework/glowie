<?php

    /*
        --------------------------------
        Plugin autoloader
        --------------------------------
        Here you can require any third-party plugins for your application.
        This plugins will be imported automatically when your application starts.
    */

    // MysqliDb - MySQL query builder
    // *This plugin is required by Glowie when working with databases*
    require_once('Db/MysqliDb.php');

    // PHPMailer - Email sending plugin
    require_once('Mail/Exception.php');
    require_once('Mail/SMTP.php');
    require_once('Mail/PHPMailer.php');

?>