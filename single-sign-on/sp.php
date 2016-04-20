<?php

require __DIR__ . '/vendor/autoload.php';

header("Content-Type: text/plain"); 
if(!isset($_REQUEST["jwt"]))
        die("JWT is missing");

printf("JWT:\n%s\n\n", $_REQUEST["jwt"]);

$jwt = JOSE_JWT::decode($_REQUEST["jwt"]);
$public_key = file_get_contents('jwt_public_key.pem');

try {
        $jwt->verify($public_key, $algo);
	//print_r($jwt->header);
      	print_r($jwt->claims);
      	// 
      	printf("\nYou are logged in as: %s", $jwt->claims["sub"]);
} catch(Exception $e){
        echo $e->getMessage() . "\n";
}
?>
