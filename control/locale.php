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
$phrase['cz']['to_user_gui'] = "Moje benefity";
$phrase['cz']['logout'] = "Odhlášení";
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
$phrase['cz']['user_claim'] = "Nárok na nový";
$phrase['cz']['user_subsidy'] = "Příspěvek";
$phrase['cz']['user_device_cur'] = "Aktuální zařízení";
$phrase['cz']['user_device_name'] = "Název";
$phrase['cz']['user_device_bought'] = "Zakoupeno";
$phrase['cz']['user_device_price'] = "Cena";
$phrase['cz']['user_device_addpay'] = "Doplatek";
$phrase['cz']['user_history'] = "Historie";
$phrase['cz']['no_device'] = "Jestě nevlastníš zařízení!";

//<th>Zakoupeno</th><th>Sériové číslo</th><th>IMEI</th><th>Verze</th><th>Typ platby</th>
//<th>Dodavatel</th><th>Datum nároku</th><th>Datum převzetí</th><th>Poznánky</th>

//admin
//tables
$phrase['cz']['table_tablets'] = "Tablety";
$phrase['cz']['table_phones'] = "Chytré telefony";
$phrase['cz']['col_id'] = "ID";
$phrase['cz']['col_name'] = "Jméno";
$phrase['cz']['col_lastname'] = "Příjmení";
$phrase['cz']['col_donate'] = "Dotace";
$phrase['cz']['col_device'] = "Zařízení";
$phrase['cz']['col_price'] = "Cena";
$phrase['cz']['col_bought'] = "";
$phrase['cz']['col_sn'] = "";
$phrase['cz']['col_imei'] = "";
$phrase['cz']['col_version'] = "";
$phrase['cz']['col_payment'] = "";
$phrase['cz']['col_supplier'] = "";
$phrase['cz']['col_claim'] = "";
$phrase['cz']['col_taking'] = "";
$phrase['cz']['col_notes'] = "";


//new form
$phrase['cz']['new_b_tab'] = "Nový benefit";


//edit form
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
$phrase['eng']['to_user_gui'] = "My benefits";
$phrase['eng']['logout'] = "Log out";
$phrase['eng']['login'] = "Log in";
$phrase['eng']['login_mail'] = "E-mail";
$phrase['eng']['login_mail_text'] = "Enter e-mail";
$phrase['eng']['login_pwd'] = "Password";
$phrase['eng']['login_pwd_text'] = "Enter password";
$phrase['eng']['submit'] = "Log in";
$phrase['eng']['footer_text'] = "Web application Made By ZMJ group";

//user
$phrase['eng']['mobile'] = "Smartphone";
$phrase['eng']['tablet'] = "Tablet";
$phrase['eng']['user_claim'] = "Claim for new one";
$phrase['eng']['user_subsidy'] = "Subsidy";
$phrase['eng']['user_device_cur'] = "Current device";
$phrase['eng']['user_device_name'] = "Name";
$phrase['eng']['user_device_bought'] = "Bought";
$phrase['eng']['user_device_price'] = "Price";
$phrase['eng']['user_device_addpay'] = "Additional payment";
$phrase['eng']['user_history'] = "History";
$phrase['eng']['no_device'] = "You haven't own device yet!";

//admin
//tables
$phrase['eng']['table_tablets'] = "Tablets";
$phrase['eng']['table_phones'] = "Smartphones";
$phrase['eng']['col_id'] = "";
$phrase['eng']['col_name'] = "";
$phrase['eng']['col_lastname'] = "";
$phrase['eng']['col_donate'] = "";
$phrase['eng']['col_device'] = "";
$phrase['eng']['col_price'] = "";
$phrase['eng']['col_bought'] = "";
$phrase['eng']['col_sn'] = "";
$phrase['eng']['col_imei'] = "";
$phrase['eng']['col_version'] = "";
$phrase['eng']['col_payment'] = "";
$phrase['eng']['col_supplier'] = "";
$phrase['eng']['col_claim'] = "";
$phrase['eng']['col_taking'] = "";
$phrase['eng']['col_notes'] = "";

//new form
$phrase['eng']['new_b_tab'] = "New benefit";


//edit form
$phrase['eng']['edit_b_tab'] = "Edit benefit";


?>