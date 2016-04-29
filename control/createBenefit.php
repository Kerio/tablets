<?php
/*** Testovaci modul ***/

require_once '../control/db_config.php';

    //var_dump($_POST);
    //echo $_POST['choose-device'];
    if(strcmp($_POST['choose-device'],"smartphone") == 0)
    {
        $input = array($_POST['b-email'], $_POST['b-grant'], $_POST['b-device'], $_POST['b-price'],$_POST['b-bought'], $_POST['b-sn'],
            $_POST['b-imei'], $_POST['b-payment'], $_POST['b-supplier'], $_POST['b-claim'], $_POST['b-notes']);

    }
    else
    {
        $input = array($_POST['b-email'], $_POST['b-grant'], $_POST['b-device'], $_POST['b-price'],$_POST['b-bought'], $_POST['b-sn'],
            $_POST['b-imei'], $_POST['b-payment'], $_POST['b-supplier'], $_POST['b-claim'], $_POST['b-notes']);
    }
$user->createBenefit($input);


