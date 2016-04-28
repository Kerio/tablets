<?php
/*** Modul pro pripojeni k databazi a vytvoreni instance uzivatele ***/

/*** mysql hostname ***/
$hostname = 'localhost';
/*** mysql username ***/
$username = 'root';
/*** mysql password ***/
$password = null;
/*** mysql name ***/
$db_name='databaze_test';

    session_start(); // zalozeni session

    /* vytvoreni pripojeni k databazi */
    try{
            $db_con = new PDO("mysql:host={$hostname};dbname={$db_name}", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    /* vytvoreni nove instance uzivatele s pripojenim k databazi */
    include_once 'User.php'; 
    $user = new USER($db_con);
