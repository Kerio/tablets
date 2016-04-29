<?php
$username = $_POST["usr"];
$password = $_POST["pwd"];

if(isset($_REQUEST["jwt_post_url"])) {
    $jwt_post_url = $_REQUEST["jwt_post_url"];
} else {
    $jwt_post_url = "http://localhost:85/zswi/single-sign-on/sp.php";
}

// ---------------------------------------------------

//header("Content-Type: text/plain"); 
require __DIR__ . '/vendor/autoload.php';

function getRandomHex($num_bytes=4) {
  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}

// prepare payload
$payload = array(
    'sub' => $username,                    // Subject,
    'pwd' => $password,                    // Password
    'iss' => "https://idp.example.com",    // Issuer
    'aud' => $jwt_post_url,                // Audience
    'iat' => time(),                       // Issued At time
    'exp' => time() + 30,                  // Expiration time
    'jti' => getRandomHex(16),             // JWT ID
);

// generate JWT
$jwt = new JOSE_JWT($payload);
$private_key = file_get_contents('jwt_private_key.pem');
$jwt_string = $jwt->sign($private_key, "RS256");
?>
<!DOCTYPE html>
<html>
    <body onload="document.forms[0].submit()">
        <form action="<?php echo $jwt_post_url; ?>" method="post">
             <input type="hidden" name="jwt" value="<?php echo $jwt_string; ?>"/>                
        </form>
    </body>
</html>
