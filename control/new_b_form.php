<?php

require 'locale.php';

$new_b_form = '<form class="form-inline" name="new_b-form" method="POST">
                                    <table id="new_b-table">
                                        <tr>
                                            <th class="th-form"></th>
                                            <td class="td-form">
                                                <select class="form-control" name="choose-device" id="choose-device">
                                                    <option><label> </label></option>
                                                    <option value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                    <option value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-name">'.$phrase[$locale]['col_name'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-name"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-lastname">'.$phrase[$locale]['col_lastname'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-lastname"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-grant">'.$phrase[$locale]['col_donate'].':</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-grant"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-device">'.$phrase[$locale]['col_device'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-device"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-price">'.$phrase[$locale]['col_price'].':</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-price"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-bought">'.$phrase[$locale]['col_bought'].':</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-bought"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-sn">'.$phrase[$locale]['col_sn'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-sn"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-imei">'.$phrase[$locale]['col_imei'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-imei"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-version">'.$phrase[$locale]['col_version'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-version"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-payment">'.$phrase[$locale]['col_payment'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-payment"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-supplier">'.$phrase[$locale]['col_supplier'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-supplier"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-claim">'.$phrase[$locale]['col_claim'].':</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-claim"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-took">'.$phrase[$locale]['col_took'].':</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-took"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-notes">'.$phrase[$locale]['col_notes'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-notes"></td>
                                        </tr>
                                        <tr>
                                            <td class="th-form"><button type="submit" name="btn-new_b" class="btn btn-default">'.$phrase[$locale]['btn_send'].'</button></td>
                                        </tr>
                                    </table>
                                </form>';