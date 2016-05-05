<?php
require_once '../control/db_config.php';
  //preposlani id benefitu pro aktualizi datumu vyplaceni
  $user->updateBenefitDate($_POST['id']);
