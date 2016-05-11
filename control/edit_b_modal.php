<?php
/*** Modul obsahujici modal s editacnim formularem ***/

require 'locale.php'; // pro pouziti frazi 

/* promenna s vyskakovaci oknem (modalem), ktere v sobe ma editacni formular */
$edit_b_modal = '
            <!-- Modal -->
            <div class="modal fade" id="editModal" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
            <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="e-label-higline">'.$phrase[$locale]['edit_b_tab'].'</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing benefit -->
                            <form class="form-inline" name="edit_b-form" id="edit_b-form" method="POST" action="../control/updateBenefit.php">
                                <table id="edit_b-table">
                                    <tr>
                                        <th class="th-form"></th>
                                        <td class="td-form">
                                            <select class="form-control" name="b_e-choose-device" id="b_e-choose-device">
                                                <option id="e-choose-select" disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                                <option id="e-choose-tablet" value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                <option id="e-choose-phone" value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-name">'.$phrase[$locale]['col_name'].':</label></th>
                                        <td class="td-form"><input id="e-input-name" type="text" class="form-control" name="b_e-name" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-lastname">'.$phrase[$locale]['col_lastname'].':</label></th>
                                        <td class="td-form"><input id="e-input-lastname" type="text" class="form-control" name="b_e-lastname" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-donate">'.$phrase[$locale]['col_donate'].':</label></th>
                                        <td class="td-form"><input id="e-input-donate" type="number" min="0" class="form-control" name="b_e-grant" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-device">'.$phrase[$locale]['col_device'].':</label></th>
                                        <td class="td-form"><input id="e-input-device" type="text" class="form-control" name="b_e-device"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-price">'.$phrase[$locale]['col_price'].':</label></th>
                                        <td class="td-form"><input id="e-input-price" type="number" min="0" class="form-control" name="b_e-price"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-bought">'.$phrase[$locale]['col_bought'].':</label></th>
                                        <td class="td-form"><input id="e-form-date1" type="date" class="form-control" name="b_e-bought"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-sn">'.$phrase[$locale]['col_sn'].':</label></th>
                                        <td class="td-form"><input id="e-input-sn" type="text" class="form-control" name="b_e-sn"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-imei">'.$phrase[$locale]['col_imei'].':</label></th>
                                        <td class="td-form"><input id="e-input-imei" type="text" class="form-control" name="b_e-imei"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-payment">'.$phrase[$locale]['col_payment'].':</label></th>
                                        <td class="td-form"><input id="e-input-payment" type="text" class="form-control" name="b_e-payment"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-supplier">'.$phrase[$locale]['col_supplier'].':</label></th>
                                        <td class="td-form"><input id="e-input-supplier" type="text" class="form-control" name="b_e-supplier"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-claim">'.$phrase[$locale]['col_claim'].':</label></th>
                                        <td class="td-form"><input id="e-form-date2" type="date" class="form-control" name="b_e-claim"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-took">'.$phrase[$locale]['col_took'].':</label></th>
                                        <td class="td-form"><input id="e-form-date3" type="date" class="form-control" name="b_e-took"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label id="e-label-notes">'.$phrase[$locale]['col_notes'].':</label></th>
                                        <td class="td-form"><input id="e-input-notes" type="text" class="form-control" name="b_e-notes"></td>
                                    </tr>
                                    <input type="number" class="form-control hidden" name="b_e-id" readonly required>
                                    <input type="email" class="form-control hidden" name="b_e-email" readonly required>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="btn-edit_b" id="btn-edit_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button>
                            <button type="button" class="btn btn-default" id="btn-storno_edit" data-dismiss="modal">'.$phrase[$locale]['cancel'].'</button>
                        </div>
                    </div>
                </div>
            </div>';