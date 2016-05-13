<?php

require __DIR__ . '/vendor/autoload.php';
require '../control/db_config.php';
require '../control/locale.php';


$public_key = file_get_contents('jwt_public_key.pem');

//když je nastavený parametr jwt dojde k přihlášení uživatele, data jsou dekódována z tokenu
if(isset($_REQUEST["jwt"])) {
    $jwt = JOSE_JWT::decode($_REQUEST["jwt"]);
    try {
        $jwt->verify($public_key, "RS256");
        $user->login($jwt);
        $user->redirect('../page/user_gui.php?locale='.$locale);
    } catch(Exception $e){
        echo $e->getMessage() . "\n";
    }
}

//údaje z přihlašovacího formuláře
$username = $_POST["usr"];
$password = $_POST["pwd"];


function getRandomHex($num_bytes=4) {
    return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}

// payload pro idp, který ověří uživatele
$payload = array(
    'sub' => $username,                    // User,
    'pwd' => $password,                    // Password
    'iss' => "https://idp.example.com",    // Issuer
    'iat' => time(),                       // Issued At time
    'exp' => time() + 30,                  // Expiration time
    'jti' => getRandomHex(16),             // JWT ID
);

// vytvoření JWT a následné předání do idp s návratovou url
$jwt = new JOSE_JWT($payload);
$jwt_string = $jwt->sign($public_key, "RS256");
$user->redirect('../single-sign-on/idp.php?jwt_post_url=http://localhost:85/zswi/single-sign-on/sp.php&token='. $jwt_string);

?>