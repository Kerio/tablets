<?php
/*** Modul pro odhlaseni uzivatele ***/

include 'db_config.php'; // zde byla odstartovana session
$user->logout(); // zruseni session
$user->redirect('../index.php');