<?php
/*** Modul obasahujici jazykove fraze pro aplikaci v podporovanych jazycich ***/

/* povolene retezce v superglobalnim poli $_GET */
$authorized = array('cs','en');

/* nastaveni jazyka */
if($_GET == NULL){
    $locale = $authorized[0]; /* defaultni nastaveni */
}
else{
    foreach ($authorized as $item => $value){
        if($value == $_GET['locale']) {
            $locale = $value; /* nastaveni povoleneho jazyka */
        }
        else {
            $locale = $authorized[0]; /* jinak defaultni nastaveni */
        }
    }

}

//CZ
//základ
$phrase['cs']['lang'] = "cs";
$phrase['cs']['kerio_b'] = "Kerio benefity";
$phrase['cs']['nav_home'] = "Domů";
$phrase['cs']['nav_lang'] = "Jazyk";
$phrase['cs']['nav_lang_cz'] = "Čeština";
$phrase['cs']['nav_lang_eng'] = "Angličtina";
$phrase['cs']['to_user_gui'] = "Moje benefity";
$phrase['cs']['logout'] = "Odhlášení";
$phrase['cs']['login'] = "Přihlášení";
$phrase['cs']['login_mail'] = "E-mail";
$phrase['cs']['login_mail_text'] = "Zdadejte e-mail";
$phrase['cs']['login_pwd'] = "Heslo";
$phrase['cs']['login_pwd_text'] = "Zadejte heslo";
$phrase['cs']['submit'] = "Přihlásit";
$phrase['cs']['footer_text'] = "Webovou aplikaci vytvořila skupina ZMJ";
$phrase['cs']['admin'] = "Administrátor";

//uzivatelska stranka
$phrase['cs']['mobile'] = "Chytrý telefon";
$phrase['cs']['tablet'] = "Tablet";
$phrase['cs']['user_claim'] = "Nárok na nový";
$phrase['cs']['user_subsidy'] = "Příspěvek";
$phrase['cs']['user_device_cur'] = "Aktuální zařízení";
$phrase['cs']['user_device_name'] = "Název";
$phrase['cs']['user_device_bought'] = "Zakoupeno";
$phrase['cs']['user_device_price'] = "Cena";
$phrase['cs']['user_history'] = "Historie";
$phrase['cs']['no_device'] = "Jestě nevlastníš zařízení!";

//administatorska stranka
$phrase['cs']['table_tablets'] = "Tablety";
$phrase['cs']['table_phones'] = "Chytré telefony";
$phrase['cs']['new_b_tab'] = "Nový benefit";
$phrase['cs']['settings'] = "Nastavení";
$phrase['cs']['col_id'] = "ID";
$phrase['cs']['col_name'] = "Jméno";
$phrase['cs']['col_lastname'] = "Příjmení";
$phrase['cs']['col_donate'] = "Dotace";
$phrase['cs']['col_device'] = "Zařízení";
$phrase['cs']['col_price'] = "Cena";
$phrase['cs']['col_bought'] = "Zakoupeno";
$phrase['cs']['col_sn'] = "Sériové číslo";
$phrase['cs']['col_imei'] = "IMEI";
$phrase['cs']['col_version'] = "Verze";
$phrase['cs']['col_payment'] = "Typ platby";
$phrase['cs']['col_supplier'] = "Dodavatel";
$phrase['cs']['col_claim'] = "Datum nároku";
$phrase['cs']['col_took'] = "Datum převzetí";
$phrase['cs']['col_notes'] = "Poznámky";
$phrase['cs']['btn_send'] = "Odešli";
$phrase['cs']['btn_now'] = "Teď";
$phrase['cs']['search'] = "Vyhledat";
$phrase['cs']['edit_b_tab'] = "Úprava benefitu";
$phrase['cs']['cancel'] = "Storno";
$phrase['cs']['curr_donate'] = "Aktuální dotace";
$phrase['cs']['choose'] = "Vyberte typ zařízení";

//==============================================================================================

//ENG
//general
$phrase['en']['lang'] = "en";
$phrase['en']['kerio_b'] = "Kerio benefits";
$phrase['en']['nav_home'] = "Home";
$phrase['en']['nav_lang'] = "Language";
$phrase['en']['nav_lang_cz'] = "Czech";
$phrase['en']['nav_lang_eng'] = "English";
$phrase['en']['to_user_gui'] = "My benefits";
$phrase['en']['logout'] = "Log out";
$phrase['en']['login'] = "Log in";
$phrase['en']['login_mail'] = "E-mail";
$phrase['en']['login_mail_text'] = "Enter e-mail";
$phrase['en']['login_pwd'] = "Password";
$phrase['en']['login_pwd_text'] = "Enter password";
$phrase['en']['submit'] = "Log in";
$phrase['en']['footer_text'] = "Web application created by ZMJ group";
$phrase['en']['admin'] = "Admin";


//user page
$phrase['en']['mobile'] = "Smartphone";
$phrase['en']['tablet'] = "Tablet";
$phrase['en']['user_claim'] = "Claim for new one";
$phrase['en']['user_subsidy'] = "Subsidy";
$phrase['en']['user_device_cur'] = "Current device";
$phrase['en']['user_device_name'] = "Name";
$phrase['en']['user_device_bought'] = "Bought";
$phrase['en']['user_device_price'] = "Price";
$phrase['en']['user_history'] = "History";
$phrase['en']['no_device'] = "You haven't own device yet!";

//admin page
$phrase['en']['table_tablets'] = "Tablets";
$phrase['en']['table_phones'] = "Smartphones";
$phrase['en']['new_b_tab'] = "New benefit";
$phrase['en']['settings'] = "Settings";
$phrase['en']['col_id'] = "ID";
$phrase['en']['col_name'] = "Name";
$phrase['en']['col_lastname'] = "Lastname";
$phrase['en']['col_donate'] = "Donate";
$phrase['en']['col_device'] = "Device";
$phrase['en']['col_price'] = "Price";
$phrase['en']['col_bought'] = "Bought";
$phrase['en']['col_sn'] = "Serial number";
$phrase['en']['col_imei'] = "IMEI";
$phrase['en']['col_version'] = "Version";
$phrase['en']['col_payment'] = "Payment";
$phrase['en']['col_supplier'] = "Supplier";
$phrase['en']['col_claim'] = "Claim";
$phrase['en']['col_took'] = "Took";
$phrase['en']['col_notes'] = "Notes";
$phrase['en']['btn_send'] = "Send";
$phrase['en']['btn_now'] = "Now";
$phrase['en']['search'] = "Search";
$phrase['en']['edit_b_tab'] = "Edit benefit";
$phrase['en']['cancel'] = "Cancel";
$phrase['en']['curr_donate'] = "Current donate";
$phrase['en']['choose'] = "Choose type of device";
?>