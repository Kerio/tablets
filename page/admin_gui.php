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
        '
        
        <body>
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
            <div id="div-center" class="container">
                    <div id="div-search">
                        <form id="form-search" class="form-inline" role="form">
                            <input type="text" class="form-control" id="search" placeholder="Vyhledat">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></button>
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </div>    
                    <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class = "active">
                            <a data-toggle="tab" href="#div-tablets">'.$phrase[$locale]['table_tablets'].'</a></li>
                        <li><a data-toggle="tab" href="#div-phones">'.$phrase[$locale]['table_phones'].'</a></li>
                        <li><a data-toggle="tab" href="#div-new_b">'.$phrase[$locale]['new_b_tab'].'</a></li>
                        <li><a data-toggle="tab" href="#div-settings_tab">'.$phrase[$locale]['settings'].'</a></li>
                    </ul>
                    </div>
                    <div class="tab-content">
                            <table id="div-tablets" class="table table-responsive table-striped tab-pane fade active in">
                                <thead>
                                    <tr>
                                        <th class="admin-th">'.$phrase[$locale]['col_id'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_name'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_lastname'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_donate'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_device'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_price'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_bought'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_sn'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_imei'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_version'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_payment'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_supplier'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_claim'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_took'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_notes'].'</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $i = 0;
                                $tablets = $user->allTablets();
                                foreach($tablets as $innerarray){
                                    $col = 1;
                                    echo '<tr id="'.$i.'">';
                                    foreach ($innerarray as $value){
                                        if($col % 14 == 0){
                                            echo '<td class="admin-td"><button type="button" class="btn btn-default">Teď</button></td>';
                                        }
                                        else{
                                             echo '<td class="admin-td">'.$value.'</td>';
                                        }
                                        $col++;
                                    }
                                    $i++;
                                    echo '</tr>';
                                }
echo '                          </tbody>
                            </table>
                        
                            <table id="div-phones" class="table table-responsive table-striped tab-pane fade">
                                <thead>
                                    <tr>
                                        <th class="admin-th">'.$phrase[$locale]['col_id'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_name'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_lastname'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_donate'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_device'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_price'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_bought'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_sn'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_imei'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_payment'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_supplier'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_claim'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_took'].'</th>
                                        <th class="admin-th">'.$phrase[$locale]['col_notes'].'</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $phones = $user->allMobiles();
                                foreach($phones as $innerarray){
                                    echo '<tr>';
                                    $col=1;
                                        foreach ($innerarray as $value){
                                            if($col % 13 == 0){
                                                echo '<td class="admin-td"><button type="button" class="btn btn-default">Teď</button></td>';
                                            }
                                            else{
                                                echo '<td class="admin-td">'.$value.'</td>';
                                            }
                                            $col++;
                                        }
                                    echo '</tr>';
                                }

echo '                          </tbody>
                            </table>
                        
                        <div id="div-new_b" class="tab-pane fade">
                            '.$new_b_form.'
                        </div>
                        <div id="div-settings_tab" class="tab-pane fade">
                            <div id="div-donate">
                                <form class="form-inline" role="form">
                                    <div class="form-group">
                                        <label for="search">Aktuální dotace:</label>
                                        <input type="number" min="0" class="form-control" id="search">
                                    </div>
                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></button>
                                </form>
                            </div>   
                        </div>
                    </div>  
                
            </div>'
        .$foot.
        '</body>
    </html>';
?>
