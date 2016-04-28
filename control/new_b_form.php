<?php
/*** Modul s formularem pro novy benefit***/

require 'locale.php';  // pro pouziti frazi

/* promenna uchovavajici cely formular pro novy benefit */
$new_b_form = '
                <!-- Form for new benefit -->
                <form class="form-inline form-new" name="new_b-form" method="POST">
                                    <table id="new_b-table">
                                        <tr>
                                            <th class="th-form"></th>
                                            <td class="td-form">
                                                <select class="form-control" name="choose-device" id="choose-device" title="Please select option in the list."required>
                                                    <option disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                                    <option value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                    <option value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['login_mail'].':</label></th>
                                            <td class="td-form"><input type="email" class="form-control" name="b-email" title="Please fill out this field." required></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_donate'].':</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-grant"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_device'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-device" title="Please fill out this field." required></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_price'].':</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-price"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_bought'].':</label></th>
                                            <td class="td-form"><input id="n-form-date1" type="date" class="form-control" name="b-bought"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_sn'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-sn"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_imei'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-imei"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_payment'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-payment"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_supplier'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-supplier"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_claim'].':</label></th>
                                            <td class="td-form"><input id="n-form-date2" type="date" class="form-control" name="b-claim"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_notes'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-notes"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td class="td-form"><button id="new-b-submit" type="submit" name="btn-new_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button></td>
                                        </tr>
                                    </table>
                                </form>';