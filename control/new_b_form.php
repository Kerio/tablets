<?php

require 'locale.php';

$new_b_form = '<form class="form-inline form-new" name="new_b-form" method="POST">
                                    <table id="new_b-table">
                                        <tr>
                                            <th class="th-form"></th>
                                            <td class="td-form">
                                                <select class="form-control" name="choose-device" id="choose-device">
                                                    <option disabled selected value>'.$phrase[$locale]['choose'].'</option>
                                                    <option value="tablet">'.$phrase[$locale]['tablet'].'</option>
                                                    <option value="smartphone">'.$phrase[$locale]['mobile'].'</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_name'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-name"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_lastname'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-lastname"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_donate'].':</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-grant"></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label>'.$phrase[$locale]['col_device'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-device"></td>
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
                                            <th class="th-form"><label>'.$phrase[$locale]['col_version'].':</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-version"></td>
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
                                            <th class="th-form"><label>'.$phrase[$locale]['col_took'].':</label></th>
                                            <td class="td-form"><input id="n-form-date3" type="date" class="form-control" name="b-took"></td>
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