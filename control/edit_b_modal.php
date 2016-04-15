<?php
require 'locale.php';

$edit_b_modal = '
            <!-- Modal -->
            <div class="modal fade" id="editModal" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
            <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="cancel" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">'.$phrase[$locale]['edit_b_tab'].'</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" name="edit_b-form" method="POST">
                                <table id="edit_b-table">
                                    <tr>
                                        <th class="th-form"></th>
                                        <td class="td-form">
                                            <select class="form-control" name="b_e-choose-device" id="b_e-choose-device">
                                                <option></option>
                                                <option value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                <option value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-name">'.$phrase[$locale]['col_name'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-name" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-lastname">'.$phrase[$locale]['col_lastname'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-lastname" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-grant">'.$phrase[$locale]['col_donate'].':</label></th>
                                        <td class="td-form"><input type="number" min="0" class="form-control" name="b_e-grant" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-device">'.$phrase[$locale]['col_device'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-device" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-price">'.$phrase[$locale]['col_price'].':</label></th>
                                        <td class="td-form"><input type="number" min="0" class="form-control" name="b_e-price" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-bought">'.$phrase[$locale]['col_bought'].':</label></th>
                                        <td class="td-form"><input id="form-date" type="date" class="form-control" name="b_e-bought" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-sn">'.$phrase[$locale]['col_sn'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-sn" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-imei">'.$phrase[$locale]['col_imei'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-imei" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-version">'.$phrase[$locale]['col_version'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-version" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-payment">'.$phrase[$locale]['col_payment'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-payment" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-supplier">'.$phrase[$locale]['col_supplier'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-supplier" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-claim">'.$phrase[$locale]['col_claim'].':</label></th>
                                        <td class="td-form"><input id="form-date" type="date" class="form-control" name="b_e-claim" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-took">'.$phrase[$locale]['col_took'].':</label></th>
                                        <td class="td-form"><input id="form-date" type="date" class="form-control" name="b_e-took" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th class="th-form"><label for="b-notes">'.$phrase[$locale]['col_notes'].':</label></th>
                                        <td class="td-form"><input type="text" class="form-control" name="b_e-notes" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <td class="th-form"><button type="submit" name="btn-new_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">'.$phrase[$locale]['cancel'].'</button>
                        </div>
                    </div>
                </div>
            </div>';