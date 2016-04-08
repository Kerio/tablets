<?php
//  import locales for translation website
require '../control/view.php';
require '../control/new_b_form.php';
require '../control/db_config.php';

if(!$user->is_loggedin()){
    $user->redirect('../index.php?locale='.$locale);
}

if($_SESSION['prava_session'] == 'user'){
    $user->redirect('../index.php?locale='.$locale);
}

//$user_id = $_SESSION['user_session'];
//$user_name = $_SESSION['name_session'];
//$user_prijmeni = $_SESSION['last_session'];
//$user_prava = $_SESSION['prava_session'];

$tablets;

echo $head.
        '<body>
        <!-- navigation bar -->
            <nav class="navbar navbar-inverse">  
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="user_gui.php?locale='.$locale.'">'.$phrase[$locale]['to_user_gui'].'</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="label-data"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['name_session'].' '.$_SESSION['last_session'].'</a></li>
                        <li><a href="../control/logout.php"><i class="glyphicon glyphicon-log-out"></i> '.$phrase[$locale]['logout'].'</a></li>
        <!-- exchange language -->
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?locale=cz">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li><a href="?locale=eng">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        <!-- center of page -->
            <div id="div-center" class="row container-fluid">
        <!-- table pane -->
                <div id="div-tables" class="col-lg-8 col-md-8 col-sm-6 col-xs-4 container-fluid">
                    <ul class="nav nav-tabs">
                        <li class = "active">
                            <a data-toggle="tab" href="#div-tablets">'.$phrase[$locale]['table_tablets'].'</a></li>
                        <li><a data-toggle="tab" href="#div-phones">'.$phrase[$locale]['table_phones'].'</a></li>
                    </ul>
                    
                    <div class="tab-content ">
                        <div id="div-tablets" class"tab-pane fade active in">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th class="admin-th">ID</th>
                                        <th class="admin-th">Jméno</th>
                                        <th class="admin-th">Přijmení</th>
                                        <th class="admin-th">Dotace</th>
                                        <th class="admin-th">Zařízeni</th>
                                        <th class="admin-th">Cena</th>
                                        <th class="admin-th">Zakoupeno</th>
                                        <th class="admin-th">Sériové číslo</th>
                                        <th class="admin-th">IMEI</th>
                                        <th class="admin-th">Verze</th>
                                        <th class="admin-th">Typ platby</th>
                                        <th class="admin-th">Dodavatel</th>
                                        <th class="admin-th">Datum nároku</th>
                                        <th class="admin-th">Datum převzetí</th>
                                        <th class="admin-th">Poznánky</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $i = 0;
                                $tablets = $user->allTablets();
                                foreach($tablets as $innerarray){
                                    echo '<tr id="'.$i.'">';
                                        foreach ($innerarray as $value){
                                            echo '<td class="admin-td">'.$value.'</td>';
                                        }
                                    $i++;
                                    echo '</tr>';
                                }
echo '                          </tbody>
                            </table>
                        </div>
                        
                        <div id="div-phones" class="tab-pane fade">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="admin-th">ID</th>
                                        <th class="admin-th">Jméno</th>
                                        <th class="admin-th">Přijmení</th>
                                        <th class="admin-th">Dotace</th>
                                        <th class="admin-th">Zařízeni</th>
                                        <th class="admin-th">Cena</th>
                                        <th class="admin-th">Zakoupeno</th>
                                        <th class="admin-th">Sériové číslo</th>
                                        <th class="admin-th">IMEI</th>
                                        <th class="admin-th">Typ platby</th>
                                        <th class="admin-th">Dodavatel</th>
                                        <th class="admin-th">Datum nároku</th>
                                        <th class="admin-th">Datum převzetí</th>
                                        <th class="admin-th">Poznánky</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $phones = $user->allMobiles();
                                foreach($phones as $innerarray){
                                    echo '<tr>';
                                        foreach ($innerarray as $value){
                                            echo '<td class="admin-td">'.$value.'</td>';
                                        }
                                    echo '</tr>';
                                }

echo '                          </tbody>
                            </table>
                        </div>
                    </div>    
                </div> 
                
        <!-- control pane -->
                <div id="div-control" class="col-lg-4 col-md-4 col-sm-6 col-xs-8 ">
                    <div id="div-edit" class ="container-fluid">
                        <ul class="nav nav-tabs">
                            <li class = "active"><a data-toggle="tab" href="#new_b">'.$phrase[$locale]['new_b_tab'].'</a></li>
                            <li><a data-toggle="tab" href="#edit_b">'.$phrase[$locale]['edit_b_tab'].'</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="new_b" class="tab-pane fade in active">
                                '.$new_b_form.'
                            </div>
                            <div id="edit_b" class="tab-pane fade">
                                <p>Editing benefit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>'

        .$foot.
        '</body>
    </html>';
?>
