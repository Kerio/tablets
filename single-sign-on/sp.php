<?php

require __DIR__ . '/vendor/autoload.php';
require '../control/db_config.php';
require '../control/locale.php';

header("Content-Type: text/plain"); 
if(!isset($_REQUEST["jwt"]))
        die("JWT is missing");

printf("JWT:\n%s\n\n", $_REQUEST["jwt"]);

$jwt = JOSE_JWT::decode($_REQUEST["jwt"]);
$public_key = file_get_contents('jwt_public_key.pem');

try {
        $jwt->verify($public_key, $algo);
	//print_r($jwt->header);
        
        if ($user->login($jwt->claims['sub'],$jwt->claims['pwd'])) {
            $user->redirect('../page/user_gui.php?locale='.$locale);
        }
        else{
            $user->redirect('../index.php?locale='.$locale);
        }
} catch(Exception $e){
        echo $e->getMessage() . "\n";
}
?>
