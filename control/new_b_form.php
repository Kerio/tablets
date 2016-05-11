<?php
/*** Modul s formularem pro novy benefit***/

require 'locale.php';// pro pouziti frazi

/* promenna uchovavajici cely formular pro novy benefit */
$new_b_form = '
                <!-- Form for new benefit -->
                <form class="form-inline form-new" name="new_b-form" method="POST" action="../control/createBenefit.php">
                                    <table id="new_b-table">
                                        <tr>
                                            <th class="th-form"></th>
                                            <td class="td-form">
                                                <select class="form-control" name="choose-device" id="choose-device" title="Please select option in the list."required>
                                                    <option id="choose-select" disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                                    <option id="choose-tablet" value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                    <option id="choose-phone" value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-mail">'.$phrase[$locale]['login_mail'].':</label></th>
                                            <td class="td-form"><input id="input-mail" type="email" class="form-control" name="b-email" title="Please fill out this field." required></td>
                                        </tr>
                                        
                                        <input type="number" min="0" class="form-control hidden" name="b-grant">
                                        
                                        <tr>
                                            <th class="th-form"><label id="label-device">'.$phrase[$locale]['col_device'].':</label></th>
                                            <td class="td-form"><input id="input-device" type="text" class="form-control" name="b-device" title="Please fill out this field." required></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-price">'.$phrase[$locale]['col_price'].':</label></th>
                                            <td class="td-form"><input id="input-price" type="number" min="0" class="form-control" name="b-price"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-bought">'.$phrase[$locale]['col_bought'].':</label></th>
                                            <td class="td-form"><input id="n-form-date1" type="date" class="form-control" name="b-bought"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-sn">'.$phrase[$locale]['col_sn'].':</label></th>
                                            <td class="td-form"><input id="input-sn" type="text" class="form-control" name="b-sn"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-emei">'.$phrase[$locale]['col_imei'].':</label></th>
                                            <td class="td-form"><input id="input-emei" type="text" class="form-control" name="b-imei"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-payment">'.$phrase[$locale]['col_payment'].':</label></th>
                                            <td class="td-form"><input id="input-payment" type="text" class="form-control" name="b-payment"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-supplier">'.$phrase[$locale]['col_supplier'].':</label></th>
                                            <td class="td-form"><input id="input-supplier" type="text" class="form-control" name="b-supplier"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-claim">'.$phrase[$locale]['col_claim'].':</label></th>
                                            <td class="td-form"><input id="n-form-date2" type="date" class="form-control" name="b-claim"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label id="label-notes">'.$phrase[$locale]['col_notes'].':</label></th>
                                            <td class="td-form"><input id="input-notes" type="text" class="form-control" name="b-notes"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td class="td-form"><button id="new-b-submit" type="submit" name="btn-new_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button></td>
                                        </tr>
                                    </table>
                                </form>';