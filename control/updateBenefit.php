<?php
require_once '../control/db_config.php';

    if(strcmp($_POST['b_e-choose-device'],"smartphone") == 0)
    {
        $input = array($_POST['b_e-email'], $_POST['b_e-id'], $_POST['b_e-name'], $_POST['b_e-lastname'], $_POST['b_e-grant'], $_POST['b_e-device'], $_POST['b_e-price'],$_POST['b_e-bought'],
        $_POST['b_e-sn'], $_POST['b_e-imei'], $_POST['b_e-payment'], $_POST['b_e-supplier'], $_POST['b_e-claim'], $_POST['b_e-took'], $_POST['b_e-notes']);

    }
    else
    {
        $input = array($_POST['b_e-email'], $_POST['b_e-id'], $_POST['b_e-name'], $_POST['b_e-lastname'], $_POST['b_e-grant'], $_POST['b_e-device'], $_POST['b_e-price'],$_POST['b_e-bought'],
        $_POST['b_e-sn'], $_POST['b_e-imei'], $_POST['b_e-payment'], $_POST['b_e-supplier'], $_POST['b_e-claim'], $_POST['b_e-took'], $_POST['b_e-notes']);
    }
    $user->updateBenefit($input);