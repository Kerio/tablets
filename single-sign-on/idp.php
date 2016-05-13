<?php

//nastavení návratové url
if(isset($_REQUEST["jwt_post_url"])) {
    $jwt_post_url = $_REQUEST["jwt_post_url"];
} else {
    $jwt_post_url = "http://localhost:85/zswi/sp.php";
}

require __DIR__ . '/vendor/autoload.php';

$private_key = file_get_contents('jwt_private_key.pem');

//když je nastavený token dojde k jeho dešifrování a naplní se proměnné, pokud ne dojde k chybě
if(isset($_REQUEST["token"])) {
    $token = JOSE_JWT::decode($_REQUEST["token"]);
    try {
         $token->verify($private_key, "RS256");
    } catch(Exception $e){
        echo $e->getMessage() . "\n";
    }
    $usr = $token->claims['sub'];
    $pwd = $token->claims['pwd'];
} else {
    die("token is missing");
}

//simulovaný získání dat z databáze sso
$hostname = 'localhost';
$username = 'root';
$password = null;
$db_name='databaze_test';
$db_con = new PDO("mysql:host={$hostname};dbname={$db_name}", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db_con->prepare("SELECT jmeno, prijmeni, prava FROM sso WHERE sso.email = '$usr' AND sso.heslo = '$pwd';");
$stmt->execute();
$user_array = $stmt->fetch(PDO::FETCH_ASSOC);

//pokud se neschodují přihlašovací údaje s daty v databázi
if ($user_array == null){
    header("Location: ../index.php?locale=cs&connect=fail");
}

function getRandomHex($num_bytes=4) {
  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}

// payload pro sp, obsahuje v sobě informace o přihlašovaném uživateli
$payload = array(
    'name' => $user_array['jmeno'],        // Name,
    'lastname' => $user_array['prijmeni'], // LastName
    'rights' => $user_array['prava'],       // LastName
    'email' => $usr,                      // User e-mail
    'iss' => "https://idp.example.com",    // Issuer
    'aud' => $jwt_post_url,                // Audience
    'iat' => time(),                       // Issued At time
    'exp' => time() + 30,                  // Expiration time
    'jti' => getRandomHex(16),             // JWT ID
);

// vytvoření JWT
$jwt = new JOSE_JWT($payload);
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
