<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 06/02/2015
 * Time: 14:21
 */

	// try{

        $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=heticland", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // }
    // catch ( Exception $e ) {
    //     echo "Connection à MySQL impossible : ", $e->getMessage();
    //     die();
    // }