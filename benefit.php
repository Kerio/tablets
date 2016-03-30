<?php

require 'locale.php';

//  language setting
if($_GET == NULL){
    $locale = 'cz';
}
else{
    $locale = $_GET['locale'];
}

$mobile =    '<h3>'.$phrase[$locale]['mobile'].'</h3>'.
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

