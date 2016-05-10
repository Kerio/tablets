<?php

require '../control/view.php'; // pro pouziti frazi
require '../control/benefit.php'; // pro pouziti funkci 
require '../control/db_config.php'; // db/user/session

/* test zda je uzivatel prihlasen */
if(!$user->is_loggedin()){
    $user->redirect('../index.php');
}

echo $head.
    '<!-- navigation bar -->
            <nav class="navbar navbar-inverse">  
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" id="label-brand" href="../index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>';
                    /* pridani odkazu na administratorske rozhrani */
                    if($_SESSION['prava_session'] == 'admin'){
                         echo '<ul class="nav navbar-nav">
                                   <li id="label-gui-switch"><a href="admin_gui.php?locale='.$locale.'">'. $phrase[$locale]['admin'] .'</a></li>
                               </ul>';
                    }
echo '               <ul class="nav navbar-nav navbar-right">
                        <li id="label-name"><a id="label-data"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['name_session'].' '.$_SESSION['last_session'].'</a></li>
                        <li id="logout"><a href="../control/logout.php"><i class="glyphicon glyphicon-log-out"></i> logout</a></li>
    <!-- exchange language -->
                        <li class="dropdown" id="language"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li id="czech"><a href="?locale=cs">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li id="english"><a href="?locale=en">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>';


echo              '
    <!-- center of page -->
    <!-- tab bar -->
    <div class="container">
        <ul id="benefit-tab" class="nav nav-tabs">
            <li id="benefit-mobile" class="active"><a data-toggle="tab" href="#benefit1">'.$phrase[$locale]['mobile'].'</a></li>
            <li id="benefit-tablet"><a data-toggle="tab" href="#benefit2">'.$phrase[$locale]['tablet'].'</a></li>
        </ul>
    <!-- benefits -->
        <div class="tab-content">
            <div id="benefit1" class="tab-pane fade in active">'
                .get_mobile_data($user->userDataMobil(), $phrase, $locale, $db_con).
            '</div>
    
            <div id="benefit2" class="tab-pane fade">'
                .get_tablet_data($user->userDataTablet(), $phrase, $locale, $db_con).
            '</div>
        </div>
    </div>'
    .$foot.
    '</body>
</html>';

