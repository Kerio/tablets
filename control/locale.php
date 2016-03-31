<?php

$authorized = array('cz','eng');

//  language setting
if($_GET == NULL){
    $locale = $authorized[0];
}
else{
    foreach ($authorized as $item => $value){
        if($value == $_GET['locale']) {
            $locale = $value;
        }
        else {
            $locale = $authorized[0];
        }
    }

}

//CZ
//general
$phrase['cz']['lang'] = "cz";
$phrase['cz']['kerio_b'] = "Kerio benefity";
$phrase['cz']['nav_home'] = "Domů";
$phrase['cz']['nav_lang'] = "Jazyk";
$phrase['cz']['nav_lang_cz'] = "Čeština";
$phrase['cz']['nav_lang_eng'] = "Angličtina";
$phrase['cz']['login'] = "Přihlášení";
$phrase['cz']['login_mail'] = "E-mail";
$phrase['cz']['login_mail_text'] = "Zdadejte e-mail";
$phrase['cz']['login_pwd'] = "Heslo";
$phrase['cz']['login_pwd_text'] = "Zadejte heslo";
$phrase['cz']['submit'] = "Přihlásit";
$phrase['cz']['footer_text'] = "Webovou aplikaci vytvořila skupina ZMJ";

//user
$phrase['cz']['mobile'] = "Chytrý telefon";
$phrase['cz']['tablet'] = "Tablet";
$phrase['cz']['user_claim'] = "Nárok na další";
$phrase['cz']['user_subsidy'] = "Příspěvek";
$phrase['cz']['user_device_cur'] = "Aktuální zařízení";
$phrase['cz']['user_device_name'] = "Název";
$phrase['cz']['user_device_bought'] = "Zakoupeno";
$phrase['cz']['user_device_price'] = "Cena";
$phrase['cz']['user_device_addpay'] = "Doplatek";
$phrase['cz']['user_history'] = "Historie";

//admin
$phrase['cz']['new_b_tab'] = "Nový benefit";
$phrase['cz']['edit_b_tab'] = "Úprava benefitu";

//==============================================================================================

//ENG
//general
$phrase['eng']['lang'] = "eng";
$phrase['eng']['kerio_b'] = "Kerio benefits";
$phrase['eng']['nav_home'] = "Home";
$phrase['eng']['nav_lang'] = "Language";
$phrase['eng']['nav_lang_cz'] = "Czech";
$phrase['eng']['nav_lang_eng'] = "English";
$phrase['eng']['login'] = "Log in";
$phrase['eng']['login_mail'] = "E-mail";
$phrase['eng']['login_mail_text'] = "Enter e-mail";
$phrase['eng']['login_pwd'] = "Password";
$phrase['eng']['login_pwd_text'] = "Enter password";
$phrase['eng']['submit'] = "Log in";
$phrase['eng']['footer_text'] = "Web application Made By ZMJ group";

//user
$phrase['eng']['mobile'] = "Smart phone";
$phrase['eng']['tablet'] = "Tablet";
$phrase['eng']['user_claim'] = "Next claim";
$phrase['eng']['user_subsidy'] = "Subsidy";
$phrase['eng']['user_device_cur'] = "Current device";
$phrase['eng']['user_device_name'] = "Name";
$phrase['eng']['user_device_bought'] = "Bought";
$phrase['eng']['user_device_price'] = "Price";
$phrase['eng']['user_device_addpay'] = "Additional payment";
$phrase['eng']['user_history'] = "History";

//admin
$phrase['eng']['new_b_tab'] = "New benefit";
$phrase['eng']['edit_b_tab'] = "Edit benefit";

?>