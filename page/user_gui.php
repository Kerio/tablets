<?php
//  import locales for translation website
require '../control/view.php';
require '../control/benefit.php';
require '../control/db_config.php';

if(!$user->is_loggedin())
{
    $user->redirect('../index.php');
}

//$user->userDataMobil();
//echo "<br>";
//$user->userDataTablet();
echo $head.
    '<!-- navigation bar -->
            <nav class="navbar navbar-inverse">  
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    
                    
        <!-- exchange language -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?locale=cz">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li><a href="?locale=eng">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div id="div-user" class="nav navbar-nav navbar-right">
                        <div class="row"><label id="label-data">'.$_SESSION['name_session'].' '.$_SESSION['last_session'].'</label></div>
                        <div class="row" id="div-logout"><label><a href="../control/logout.php"><i class="glyphicon glyphicon-log-out"></i> logout</a></label></div>
                    </div>';

                    if($_SESSION['prava_session'] == 'admin'){
                        echo '<a id="a-admin" href="admin_gui.php?locale='.$locale.'" class="btn btn-default" role="button">Admin</a>';
                    }
echo              '</div>
            </nav>

    <!-- center of page -->
    <!-- tab bar -->
    <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#benefit1">'.$phrase[$locale]['mobile'].'</a></li>
                <li><a data-toggle="tab" href="#benefit2">'.$phrase[$locale]['tablet'].'</a></li>
                <li><a data-toggle="tab" href="#benefit3">Benefit3</a></li>
            </ul>
    
        <div class="tab-content">
            <div id="benefit1" class="tab-pane fade in active">'
                .get_mobil_data($user->userDataMobil(), $phrase, $locale).
            '</div>
    
            <div id="benefit2" class="tab-pane fade">'
                .$tablet.
            '</div>
    
            <div id="benefit3" class="tab-pane fade">
                <h3>benefit3</h3>
            </div>
        </div>
    </div>'
    .$foot.
    '</body>
</html>';

