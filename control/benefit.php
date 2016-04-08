<?php

function get_mobile_data($array_mobile, $phrase, $locale)
{

    if(count($array_mobile) == 0){
        $fdate = (date("Y-m", strtotime("now")));
        $date_diff = 0;
        $part = 100;
    }
    else{
        $date = date("Y-m", strtotime($array_mobile[0]['datum_nakupu']));
        $fdate = date("Y-m", strtotime("+2 Years", strtotime($date)));
        $cdate = date("Y-m-d", strtotime("now"));
        $date_diff=number_format(((strtotime($fdate)-strtotime($cdate)) / 86400) ,0);
        $date_diff2=(strtotime($fdate)-strtotime($date)) / 86400;
        $part = number_format(($date_diff2 - $date_diff)/($date_diff2/100),2);
    }

    $device =
        '<h3>' . $phrase[$locale]['mobile'] . '</h3>
        <div class="well">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'. $part .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $part .'%;">
                    <span>'. $date_diff .' dní</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_claim'] . ':</th><td class="td-user">'. $fdate .'</td></tr>
                    <tr><th>' . $phrase[$locale]['user_subsidy'] . ':</th><td class="td-user"> nemam data kč</td></tr>
                </table>
            </div>
        </div>

        <div class="well">
            <h3>' . $phrase[$locale]['user_device_cur'] . '</h3>';
    if (count($array_mobile) > 0) {
        $device .=
            '<div class="table-responsive">
                 <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array_mobile[0]['jmeno_produktu'] . '</td></tr>
                    <tr><th>' . $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . $array_mobile[0]['datum_nakupu'] . '</td></tr>
                    <tr><th>' . $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array_mobile[0]['cena'] . 'kč</td></tr>
                    <tr><th>' . $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array_mobile[0]['dotace'] . 'kč</td></tr>
                 </table>
            </div>
        </div>';

        if(count($array_mobile) > 1) {
            $device .= '<div class="panel-group">
            <div id="user-history-panel" class="panel panel-default">
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


function get_tablet_data($array_tablet, $phrase, $locale)
{

    if(count($array_tablet) == 0){
        $fdate = (date("Y-m", strtotime("now")));
        $date_diff = 0;
        $part = 100;
    }
    else{
        $date = date("Y-m", strtotime($array_tablet[0]['datum_nakupu']));
        $fdate = date("Y-m", strtotime("+2 Years", strtotime($date)));
        $cdate = date("Y-m-d", strtotime("now"));
        $date_diff=(strtotime($fdate)-strtotime($cdate)) / 86400;
        $date_diff2=(strtotime($fdate)-strtotime($date)) / 86400;
        $part = ($date_diff2 - $date_diff)/($date_diff2/100);
    }

    $device =
        '<h3>' . $phrase[$locale]['tablet'] . '</h3>
        <div class="well">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'. $part .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $part .'%;">
                    <span>'. $date_diff .' dní</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_claim'] . ':</th><td class="td-user">'. $fdate .'</td></tr>
                    <tr><th>' . $phrase[$locale]['user_subsidy'] . ':</th><td class="td-user"> nemam data kč</td></tr>
                </table>
            </div>
        </div>

        <div class="well">
            <h3>' . $phrase[$locale]['user_device_cur'] . '</h3>
            <p>';
    if (count($array_tablet) > 0) {
        $device .=
            '<div class="table-responsive">
                 <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array_tablet[0]['jmeno_produktu'] . '</td></tr>
                    <tr><th>' . $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . $array_tablet[0]['datum_nakupu'] . '</td></tr>
                    <tr><th>' . $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array_tablet[0]['cena'] . 'kč</td></tr>
                    <tr><th>' . $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array_tablet[0]['dotace'] . 'kč</td></tr>
                 </table>
            </div>
        </div>';

        if(count($array_tablet) > 1) {
            $device .= '<div class="panel-group">
            <div id="user-history-panel" class="panel panel-default">
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

function device_history($array, $phrase, $locale){
    $history = '';
    for($i = 1; $i < count($array); $i++) {
        $history .=
        '<div class="well">
             <div class="table-responsive">
                 <table class="user-table">
                    <tr><th>' . $phrase[$locale]['user_device_name'] . ':</th><td class="td-user">' . $array[$i]['jmeno_produktu'] . '</td>
                    <tr><th>'. $phrase[$locale]['user_device_bought'] . ':</th><td class="td-user">' . $array[$i]['datum_nakupu'] . '</td>
                    <tr><th>'. $phrase[$locale]['user_device_price'] . ':</th><td class="td-user">' . $array[$i]['cena'] . 'kč</td>
                    <tr><th>'. $phrase[$locale]['col_donate'] . ':</th><td class="td-user">' . $array[$i]['dotace'] . 'kč</td>
                </table>
             </div>
         </div>';
    }
    return $history;
}
