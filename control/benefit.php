<?php

function get_mobil_data($array_mobile, $phrase, $locale)
{

    $date = date("Y-m", strtotime($array_mobile[0]['datum_nakupu']));
    $fdate = date("Y-m", strtotime("+2 Years", strtotime($date)));
    $cdate = date("Y-m-d", strtotime("now"));
    $date_diff=(strtotime($fdate)-strtotime($cdate)) / 86400;
    $date_diff2=(strtotime($fdate)-strtotime($date)) / 86400;
    $part = ($date_diff2 - $date_diff)/($date_diff2/100);

    if(count($array_mobile) == 0){
        $fdate = (date("Y-m", strtotime("now")));
        $date_diff = 0;
        $part = 100;
    }

    $mobile =
        '<h3>' . $phrase[$locale]['mobile'] . '</h3>
        <div class="well">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="'. $part .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $part .'%;">
                    <span class="sr-only">'. $part .'% Complete</span>
                </div>
            </div>
            <p>' . $phrase[$locale]['user_claim'] . ': '. $fdate .'
            <br>' . $phrase[$locale]['user_claim'] . ': '. $date_diff .' dní ' . $part .'%
            <br>' . $phrase[$locale]['user_subsidy'] . ': nemam data kč</p>
        </div>

        <div class="well">
            <h3>' . $phrase[$locale]['user_device_cur'] . '</h3>
            <p>';
    if (count($array_mobile) > 0) {
        $mobile .= $phrase[$locale]['user_device_name'] . ': ' . $array_mobile[0]['jmeno_produktu'] . '<br>'
            . $phrase[$locale]['user_device_bought'] . ': ' . $array_mobile[0]['datum_nakupu'] . '<br>'
            . $phrase[$locale]['user_device_price'] . ': ' . $array_mobile[0]['cena'] . 'kč<br>'
            . $phrase[$locale]['user_device_addpay'] . ': ' . $array_mobile[0]['dotace'] . 'kč</p>
        </div>';

        if(count($array_mobile) > 1) {
            $mobile .= '<div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">' . $phrase[$locale]['user_history'] . '</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">' . mobile_history($array_mobile, $phrase, $locale) . '</div>
                </div>
            </div>
        </div>';
        }
    } else {
        $mobile .= $phrase[$locale]['no_device'] . '</p>
        </div>';
    }

    return $mobile;
}

function mobile_history($array, $phrase, $locale){
    $history = '';
    for($i = 1; $i < count($array); $i++) {
        $history .=
        '<div class="well">
             <p>'
                . $phrase[$locale]['user_device_name'] . ': ' . $array[$i]['jmeno_produktu'] . '<br>'
                . $phrase[$locale]['user_device_bought'] . ': ' . $array[$i]['datum_nakupu'] . '<br>'
                . $phrase[$locale]['user_device_price'] . ': ' . $array[$i]['cena'] . 'kč<br>'
                . $phrase[$locale]['user_device_addpay'] . ': ' . $array[$i]['dotace'] . 'kč</p>
         </div>';
    }
    return $history;
}

$tablet =    '<h3>'.$phrase[$locale]['tablet'].'</h3>'.
    '<div class="well">'.
    '<div class="progress">'.
    '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">'.
    '<span class="sr-only">60% Complete</span>'.
    '</div>'.
    '</div>'.
    '<p>'.$phrase[$locale]['user_claim'].': 21. 1. 2017<br>'.$phrase[$locale]['user_subsidy'].': 14 000kč</p>'.
    '</div>'.
    '<div class="well">'.
    '<h3>'.$phrase[$locale]['user_device_cur'].'</h3>'.
    '<p>'.$phrase[$locale]['user_device_name'].': Iphone 5S 64GB<br>'.$phrase[$locale]['user_device_bought'].
    ': 21. 1. 2015<br>'.$phrase[$locale]['user_device_price'].': 16 000kč<br>'.$phrase[$locale]['user_device_addpay'].': 2 000kč</p>'.
    '</div>'.
    '<div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">'.$phrase[$locale]['user_history'].'</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">PanelBody</div>
                    </div>
                </div>
            </div>';

