<?php
/*** Modul s funkcemi pro zpracovani a zobrazeni dat z databaze uzivateli ***/

/*********************************************************************
 * funkce vrací řetězec html kodu, který v uživatelském
 * rozhraní zobrazuje informace o benefitu mobil. Kod
 * je generovám s daty z databáze.
 *
 * @param $array_mobile pole všech mobilních zařízení uživatele
 * @param $phrase pole z locale.php
 * @param $locale aktuální jazyk
 * @param $db_con připojení k databázi
 * @return string html kod daného benefitu
 */
function get_mobile_data($array_mobile, $phrase, $locale, $db_con)
{

    //výpočet dnů do nároku na další benefit
    if(count($array_mobile) == 0){
        $future_date = (date("Y-m", strtotime("now")));
        $date_diff = 0;
        $part = 100;
    }
    else{
        $date = date("Y-m", strtotime($array_mobile[0]['datum_nakupu']));
        $future_date = date("Y-m", strtotime("+2 Years", strtotime($date)));
        $current_date = date("Y-m-d", strtotime("now"));
        $date_diff=number_format(((strtotime($future_date)-strtotime($current_date)) / 86400) ,0);
        $date_diff2=(strtotime($future_date)-strtotime($date)) / 86400;
        $part = number_format(($date_diff2 - $date_diff)/($date_diff2/100),2);
    }

    if($date_diff < 0){
        $date_diff = 0;
        $part = 100;
    }

    $stmt = $db_con->prepare("SELECT hodnota, datum_zapsani, presny_cas FROM DOTACE WHERE typ_produktu = 'smartphone' ORDER BY datum_zapsani DESC, presny_cas DESC LIMIT 1;");
    $stmt->execute();
    $subsidy = $stmt->fetch(PDO::FETCH_ASSOC);

    $device =
        '<h3 id="label-higline-mobile">' . $phrase[$locale]['mobile'] . '</h3>
        <!-- info about next benefit-->
        <div class="well" id="well-progress-mobile">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" id="progressbar-mobile" role="progressbar" aria-valuenow="'. $part .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $part .'%;">
                    <span>'. $date_diff .' dní</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="user-table" id="table-progress-mobile">
                    <tr><th id="user-mobile-claim">' . $phrase[$locale]['user_claim'] . ':</th><td class="td-user">'. date("m-Y", strtotime($future_date)) .'</td></tr>
                    <tr><th id="user-mobile-subsidy">' . $phrase[$locale]['user_subsidy'] . ':</th><td class="td-user">'. $subsidy['hodnota'] .'kč</td></tr>
                </table>
            </div>
        </div>

        <div class="well" id="well-current-mobile">
            <h3 id="label-higline-currentmobile">' . $phrase[$locale]['user_device_cur'] . '</h3>';
    if (count($array_mobile) > 0) {
        $device .=
            '<div class="table-responsive">
            <!-- info about actual benefit -->
                 <table class="user-table" id="table-current-mobile">
                    <tr><th id="user-mobile-name">' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array_mobile[0]['jmeno_produktu'] . '</td></tr>
                    <tr><th id="user-mobile-bought">' . $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . date("d. m. Y", strtotime($array_mobile[0]['datum_nakupu'])) . '</td></tr>
                    <tr><th id="user-mobile-price">' . $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array_mobile[0]['cena'] . 'kč</td></tr>
                    <tr><th id="user-mobile-donate">' . $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array_mobile[0]['dotace'] . 'kč</td></tr>
                 </table>
            </div>
        </div>';

        if(count($array_mobile) > 1) {
            $device .= '<div class="panel-group">
            <!-- benefit history -->
            <div id="mobile-history-panel" class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#history-mobile">' . $phrase[$locale]['user_history'] . '</a>
                    </h4>
                </div>
                <div id="history-mobile" class="panel-collapse collapse">
                    <div class="panel-body">' . device_history($array_mobile, $phrase, $locale) . '</div>
                </div>
            </div>
        </div>';
        }
    } else {
        $device .= $phrase[$locale]['no_device'] . '</p>
        </div>';
    }

    return $device;
}

/*********************************************************************
 * funkce vrací řetězec html kodu, který v uživatelském
 * rozhraní zobrazuje informace o benefitu tablet. Kod
 * je generovám s daty z databáze.
 *
 * @param $array_tablet pole všech tabletů uživatele
 * @param $phrase pole z locale.php
 * @param $locale aktuální jazyk
 * @param $db_con připojení k databázi
 * @return string html kod daného benefitu
 */
function get_tablet_data($array_tablet, $phrase, $locale, $db_con)
{

    //výpočet dnů do nároku na další benefit
    if(count($array_tablet) == 0){
        $future_date = (date("Y-m", strtotime("now")));
        $date_diff = 0;
        $part = 100;
    }
    else{
        $date = date("Y-m", strtotime($array_tablet[0]['datum_nakupu']));
        $future_date = date("Y-m", strtotime("+2 Years", strtotime($date)));
        $current_date = date("Y-m-d", strtotime("now"));
        $date_diff=number_format(((strtotime($future_date)-strtotime($current_date)) / 86400) ,0);
        $date_diff2=(strtotime($future_date)-strtotime($date)) / 86400;
        $part = number_format(($date_diff2 - $date_diff)/($date_diff2/100),2);
    }

    if($date_diff < 0){
        $date_diff = 0;
        $part = 100;
    }

    $stmt = $db_con->prepare("SELECT hodnota, datum_zapsani, presny_cas FROM DOTACE WHERE typ_produktu = 'tablet' ORDER BY datum_zapsani DESC, presny_cas DESC LIMIT 1;");
    $stmt->execute();
    $subsidy = $stmt->fetch(PDO::FETCH_ASSOC);

    $device =
        '<h3 id="label-higline-tablet">' . $phrase[$locale]['tablet'] . '</h3>
        <!-- info about next benefit-->
        <div class="well" id="well-progress-tablet">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" id="progressbar-tablet" role="progressbar" aria-valuenow="'. $part .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $part .'%;">
                    <span>'. $date_diff .' dní</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="user-table" id="table-progress-tablet">
                    <tr><th id="user-tablet-claim">' . $phrase[$locale]['user_claim'] . ':</th><td class="td-user">'. date("m-Y", strtotime($future_date)) .'</td></tr>
                    <tr><th id="user-tablet-subsidy">' . $phrase[$locale]['user_subsidy'] . ':</th><td class="td-user">'. $subsidy['hodnota'] .'kč</td></tr>
                </table>
            </div>
        </div>

        <div class="well" id="well-current-tablet">
            <h3 id="label-higline-currenttablet">' . $phrase[$locale]['user_device_cur'] . '</h3>
            <p>';
    if (count($array_tablet) > 0) {
        $device .=
            '<div class="table-responsive">
            <!-- info about actual benefit -->
                 <table class="user-table" id="table-current-tablet">
                    <tr><th id="user-tablet-name">' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array_tablet[0]['jmeno_produktu'] . '</td></tr>
                    <tr><th id="user-tablet-bought">' . $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . date("d. m. Y", strtotime($array_tablet[0]['datum_nakupu'])) . '</td></tr>
                    <tr><th id="user-tablet-price">' . $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array_tablet[0]['cena'] . 'kč</td></tr>
                    <tr><th id="user-tablet-donate">' . $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array_tablet[0]['dotace'] . 'kč</td></tr>
                 </table>
            </div>
        </div>';

        if(count($array_tablet) > 1) {
            $device .= '<div class="panel-group">
            <!-- benefit history -->
            <div id="tablet-history-panel" class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#history-tablet">' . $phrase[$locale]['user_history'] . '</a>
                    </h4>
                </div>
                <div id="history-tablet" class="panel-collapse collapse">
                    <div class="panel-body">' . device_history($array_tablet, $phrase, $locale) . '</div>
                </div>
            </div>
        </div>';
        }
    } else {
        $device .= $phrase[$locale]['no_device'] . '</p>
        </div>';
    }

    return $device;
}

/*****************************************************************************************
 * funkce vygeneruje html kod pro historii daného benefitu
 * @param $array_device_history pole všech předchozích zařízení uživatele
 * @param $phrase pole z locale.php
 * @param $locale aktuální jazyk
 * @return string html kod historie daného benefitu
 */
function device_history($array_device_history, $phrase, $locale){
    $history = '';
    for($i = 1; $i < count($array_device_history); $i++) {
        $history .=
        '<div class="well" id="well-history'. $i .'">
             <div class="table-responsive">
                 <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array_device_history[$i]['jmeno_produktu'] . '</td>
                    <tr><th>'. $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . date("d. m. Y", strtotime($array_device_history[$i]['datum_nakupu'])) . '</td>
                    <tr><th>'. $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array_device_history[$i]['cena'] . 'kč</td>
                    <tr><th>'. $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array_device_history[$i]['dotace'] . 'kč</td>
                </table>
             </div>
         </div>';
    }
    return $history;
}
