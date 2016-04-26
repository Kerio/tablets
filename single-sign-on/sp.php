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

    try {
        $usr = $jwt->claims['sub'];
        $pwd = $jwt->claims['pwd'];
        $stmt = $db_con->prepare("SELECT jmeno, prijmeni, prava FROM sso WHERE sso.email = '$usr' AND sso.heslo = '$pwd';");
        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($array == null){
            $user->redirect('../index.php?locale='.$locale.'&connect=fail');
        }
        else{
            $user->login($array, $usr);
            $user->redirect('../page/user_gui.php?locale='.$locale);
        }
    }

    catch (PDOException $e) {
        echo $e->getMessage();
    }
} catch(Exception $e){
        echo $e->getMessage() . "\n";
}
?>
