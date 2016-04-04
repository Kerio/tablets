<?php
//  import locales for translation website
require '../control/view.php';
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

echo $head.
       '<body>
        <!-- navigation bar -->
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
                    </div>
                    
                    <a id="a-admin" href="user_gui.php?locale='.$locale.'" class="btn btn-default" role="button">User</a>
                    
                </div>
            </nav>

        <!-- center of page -->
            <div id="div-center" class="container-fluid">
        <!-- table pane -->
                <div id="div-table" class="col-lg-9 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th><th>Jméno</th><th>Přijmení</th><th>Dotace</th><th>Zařízeni</th>                                <th>Cena</th>
                                <th>Sériové číslo</th><th>IMEI</th><th>Verze</th><th>Typ platby</th>
                                <th>Dodavatel</th><th>Datum</th><th>Poznánky</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $array = $user->allTablets();
                            foreach($array as $innerarray){
                                echo '<tr>';
                                foreach ($innerarray as $value){
                                    echo '<td>'.$value.'</td>';
                                }
                                echo '</tr>';
                            }
//                            for ($i = 0; $i < 50; $i++) {
//                                echo '<tr>
//                                        <td>aaaaaaaaaaaaaa</td>
//                                        <td>bbbbbbbbbbbbb</td>
//                                        <td>ccccccccccccccc</td>
//                                      </tr>';
//                            }
echo '                  </tbody>
                     </table>
                 </div>
                 
        <!-- control pane -->
                <div id="div-control" class="col-lg-3">
                    <div id="div-info" class ="row">
                        <p>Some informations</p>
                    </div>
                    <div id="div-edit" class ="container-fluid">
                        <ul class="nav nav-tabs">
                            <li class = "active"><a data-toggle="tab" href="#new_b">'.$phrase[$locale]['new_b_tab'].'</a></li>
                            <li><a data-toggle="tab" href="#edit_b">'.$phrase[$locale]['edit_b_tab'].'</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="new_b" class="tab-pane fade in active">
                                <p>Creating new benefit</p>
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
