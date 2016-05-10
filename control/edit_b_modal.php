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
                            <h4 class="modal-title">'.$phrase[$locale]['edit_b_tab'].'</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing benefit -->
                            <form class="form-inline" name="edit_b-form" id="edit_b-form" method="POST" action="../control/updateBenefit.php">
                                <table id="edit_b-table">
                                    <tr>
                                        <th class="th-form"></th>
                                        <td class="td-form">
                                            <select class="form-control" name="b_e-choose-device" id="b_e-choose-device">
                                                <option disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                                <option value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                <option value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_name'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-name" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_lastname'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-lastname" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_donate'].':</label></th>
                                        <td class="td-form"><input type="number" min="0" class="form-control" name="b_e-grant" disabled></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_device'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-device"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_price'].':</label></th>
                                        <td class="td-form"><input type="number" min="0" class="form-control" name="b_e-price"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_bought'].':</label></th>
                                        <td class="td-form"><input id="e-form-date1" type="date" class="form-control" name="b_e-bought"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_sn'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-sn"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_imei'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-imei"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_payment'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-payment"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_supplier'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-supplier"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_claim'].':</label></th>
                                        <td class="td-form"><input id="e-form-date2" type="date" class="form-control" name="b_e-claim"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_took'].':</label></th>
                                        <td class="td-form"><input id="e-form-date3" type="date" class="form-control" name="b_e-took"></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label>'.$phrase[$locale]['col_notes'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-notes"></td>
                                    </tr>
                                    <input type="number" class="form-control hidden" name="b_e-id" readonly required>
                                    <input type="email" class="form-control hidden" name="b_e-email" readonly required>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="btn-edit_b" id="btn-edit_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">'.$phrase[$locale]['cancel'].'</button>
                        </div>
                    </div>
                </div>
            </div>';