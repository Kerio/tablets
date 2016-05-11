<?php
//  import locales for translation website
require '../control/view.php'; // pro import hlavicky a paticky stranky
require '../control/new_b_form.php'; // pro import formulare pro novy benefit
require '../control/edit_b_modal.php'; // pro import editacniho formulare
require '../control/db_config.php'; // pro ziskani db/uzivatele/session

/* test zda je uzivatel prihlasen */
if(!$user->is_loggedin()){
    $user->redirect('../index.php?locale='.$locale);
}

/* test zda je uzivatel i administrator */
if($_SESSION['prava_session'] == 'user'){
    $user->redirect('../index.php?locale='.$locale);
}

echo $head.
        '
        <body>
        <!-- navigation bar -->
            <nav class="navbar navbar-inverse">  
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" id="label-brand" href="../index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li id="label-gui-switch"><a href="user_gui.php?locale='.$locale.'">'.$phrase[$locale]['to_user_gui'].'</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="label-name"><a id="label-data"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['name_session'].' '.$_SESSION['last_session'].'</a></li>
                        <li id="logout"><a href="../control/logout.php"><i class="glyphicon glyphicon-log-out"></i> '.$phrase[$locale]['logout'].'</a></li>
        <!-- exchange language -->
                        <li class="dropdown" id="language"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li id="czech"><a href="?locale=cs">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li id="english"><a href="?locale=en">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        <!-- center of page -->
            <div id="div-center" class="container">
        <!-- search -->
                <div id="div-search" class="form-group pull-right">
                    <input id="input-search" type="text" class="search form-control" placeholder="'.$phrase[$locale]['search'].'">
                </div>  
        <!-- tabs -->
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li id="tab-tablets" class = "active">
                            <a data-toggle="tab" href="#div-tablets">'.$phrase[$locale]['table_tablets'].'</a></li>
                        <li id="tab-phones"><a data-toggle="tab" href="#div-phones">'.$phrase[$locale]['table_phones'].'</a></li>
                        <li id="tab-new"><a data-toggle="tab" href="#div-new_b">'.$phrase[$locale]['new_b_tab'].'</a></li>
                        <li id="tab-settings"><a data-toggle="tab" href="#div-settings_tab">'.$phrase[$locale]['settings'].'</a></li>
                    </ul>
                </div>
                <div class="tab-content">
        <!-- tablets -->
                    <table id="div-tablets" class="table table-responsive table-striped tab-pane results fade active in">
                        <thead>
                            <tr>
                                <th class="admin-th" id="tablet-id">'.$phrase[$locale]['col_id'].'</th>
                                <th class="admin-th" id="tablet-name">'.$phrase[$locale]['col_name'].'</th>
                                <th class="admin-th" id="tablet-lastname">'.$phrase[$locale]['col_lastname'].'</th>
                                <th class="admin-th" id="tablet-mail">'.$phrase[$locale]['login_mail'].'</th>
                                <th class="admin-th" id="tablet-donate">'.$phrase[$locale]['col_donate'].'</th>
                                <th class="admin-th" id="tablet-device">'.$phrase[$locale]['col_device'].'</th>
                                <th class="admin-th" id="tablet-price">'.$phrase[$locale]['col_price'].'</th>
                                <th class="admin-th" id="tablet-bought">'.$phrase[$locale]['col_bought'].'</th>
                                <th class="admin-th" id="tablet-sn">'.$phrase[$locale]['col_sn'].'</th>
                                <th class="admin-th" id="tablet-imei">'.$phrase[$locale]['col_imei'].'</th>
                                <th class="admin-th" id="tablet-payment">'.$phrase[$locale]['col_payment'].'</th>
                                <th class="admin-th" id="tablet-supplier">'.$phrase[$locale]['col_supplier'].'</th>
                                <th class="admin-th" id="tablet-claim">'.$phrase[$locale]['col_claim'].'</th>
                                <th class="admin-th" id="tablet-took">'.$phrase[$locale]['col_took'].'</th>
                                <th class="admin-th" id="tablet-notes">'.$phrase[$locale]['col_notes'].'</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="15"><i class="fa fa-warning"></i> No result</td>
                            </tr>
                        </thead>
                        <tbody>';
                                /* generovani tabulky */
                                $i = 0; /* deprecated */
                                $tablets = $user->allTablets();
                                foreach($tablets as $innerarray){
                                    $col = 1;
                                    echo '<tr id="'.$i.'" class="admin-tr">';
                                    foreach ($innerarray as $value){
                                        if($col % 14 == 0 && $value == NULL){ /* vlozeni tlacitka do bunky */
                                            echo '<td class="admin-td"><button type="button" class="btn btn-default btn-xs btn-now">'.$phrase[$locale]['btn_now'].'</button></td>';
                                        }
                                        else{
                                             echo '<td class="admin-td">'.$value.'</td>';
                                        }
                                        $col++;
                                    }
                                    $i++;
                                    echo '</tr>';
                                }
echo '                  </tbody>
                    </table>
        <!-- smartphones -->                
                    <table id="div-phones" class="table table-responsive table-striped tab-pane fade results">
                        <thead>
                            <tr>
                                <th class="admin-th" id="phone-id">'.$phrase[$locale]['col_id'].'</th>
                                <th class="admin-th" id="phone-name">'.$phrase[$locale]['col_name'].'</th>
                                <th class="admin-th" id="phone-lastname">'.$phrase[$locale]['col_lastname'].'</th>
                                <th class="admin-th" id="phone-mail">'.$phrase[$locale]['login_mail'].'</th>
                                <th class="admin-th" id="phone-donate">'.$phrase[$locale]['col_donate'].'</th>
                                <th class="admin-th" id="phone-device">'.$phrase[$locale]['col_device'].'</th>
                                <th class="admin-th" id="phone-price">'.$phrase[$locale]['col_price'].'</th>
                                <th class="admin-th" id="phone-bought">'.$phrase[$locale]['col_bought'].'</th>
                                <th class="admin-th" id="phone-sn">'.$phrase[$locale]['col_sn'].'</th>
                                <th class="admin-th" id="phone-imei">'.$phrase[$locale]['col_imei'].'</th>
                                <th class="admin-th" id="phone-payment">'.$phrase[$locale]['col_payment'].'</th>
                                <th class="admin-th" id="phone-supplier">'.$phrase[$locale]['col_supplier'].'</th>
                                <th class="admin-th" id="phone-claim">'.$phrase[$locale]['col_claim'].'</th>
                                <th class="admin-th" id="phone-took">'.$phrase[$locale]['col_took'].'</th>
                                <th class="admin-th" id="phone-notes">'.$phrase[$locale]['col_notes'].'</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="15"><i class="fa fa-warning"></i> No result</td>
                            </tr>
                        </thead>
                        <tbody>';
                                /* generovani tabulky */
                                $phones = $user->allMobiles();
                                foreach($phones as $innerarray){
                                    echo '<tr class="admin-tr">';
                                    $col=1;
                                        foreach ($innerarray as $value){
                                            if($col % 14 == 0 && $value == NULL){
                                                echo '<td class="admin-td"><button type="button" class="btn btn-default btn-xs btn-now">'.$phrase[$locale]['btn_now'].'</button></td>';
                                            }
                                            else{
                                                echo '<td class="admin-td">'.$value.'</td>';
                                            }
                                            $col++;
                                        }
                                    echo '</tr>';
                                }

echo '                  </tbody>
                    </table>
        <!-- new benefit -->
                    <div id="div-new_b" class="tab-pane fade">
                        '.$new_b_form.'
                    </div>
        <!-- settings -->
                    <div id="div-settings_tab" class="tab-pane fade">
                        <div id="div-donate">
                            <form class="form-inline" method="post" action="../control/dotaceCreate.php">
                                <div class="form-group">
                                    <select class="form-control" name="settings_choose-device" id="settings_choose-device" title="Please select option in the list."required>
                                        <option id="settings_choose-select" disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                        <option id="settings_choose-tablet" value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                        <option id="settings_choose-phone" value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="l-donate-settings" for="search">'.$phrase[$locale]['curr_donate'].':</label>
                                    <input type="number" min="0" class="form-control" id="i-donate-settings" name="settings_grant" title="Please fill out this field." required>
                                </div>
                                <button id="b-donate-settings"type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></button>
                            </form>
                            <div id="div-table_donates">';
                        $donates = $user->getNewestGrant();
echo'                           <table id="table_donates">
                                    <tr>
                                        <th id="label-show-actual_donate" class="th-table">'.$phrase[$locale]['actual_donate'].'</th>
                                    </tr>
                                    <tr>
                                        <td id="label-show-tablet" class="th-table">'.$phrase[$locale]['tablet'].'</th><td id="label-show-tablet_donate" class="td-table">'.$donates[0].',-</td>
                                    </tr>
                                    <tr>
                                        <td id="label-show-phone" class="th-table">'.$phrase[$locale]['mobile'].'</th><td id="label-show-phone_donate" class="td-table">'.$donates[1].',-</td>
                                    </tr>
                                </table>
                            </div>
                         </div>   
                    </div>
                </div>  
            </div>'
        .$edit_b_modal.'
        '.$foot.
        '
        <script type="text/javascript">';
 echo "   $(function(){
            $('#div-tablets').tablesorter();
            $('#div-phones').tablesorter();
          });";
echo '  </script>
        </body>
    </html>';

