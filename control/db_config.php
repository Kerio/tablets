<?php
//http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html

/*** mysql hostname ***/
$hostname = 'localhost';
/*** mysql username ***/
$username = 'root';
/*** mysql password ***/
$password = null;
/*** mysql name ***/
$db_name='databaze_test';

    session_start();

    try{
            $db_con = new PDO("mysql:host={$hostname};dbname={$db_name}", $username, $password);
            $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        // zobrazit chybu
        echo $e->getMessage();
    }

    include_once 'User.php';
    $user = new USER($db_con);
?>