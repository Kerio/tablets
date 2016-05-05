<?php
require_once '../control/db_config.php';
    //pripraveni pole dat na vytvoreni nove dotace
    $input = array($_POST['settings_choose-device'], $_POST['settings_grant']);
    $user->dotaceCreate($input);