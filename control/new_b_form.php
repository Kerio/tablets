<?php

require 'locale.php';

$new_b_form = '<form class="form-inline" name="new_b-form" method="POST">
                                    <table id="new_b-table">
                                        <tr>
                                            <th class="th-form"></th>
                                            <td class="td-form">
                                                <select class="form-control" id="choose-device">
                                                    <option></option>
                                                    <option>Tablet</option>
                                                    <option>Chytrý telefon</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-name">Jméno:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-name" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-lastname">Příjmení:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-lastname" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-grant">Dotace:</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-grant" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-device">Zařízení:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-device" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-price">Cena:</label></th>
                                            <td class="td-form"><input type="number" min="0" class="form-control" name="b-price" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-bought">Zakoupeno:</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-bought" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-sn">Sériové číslo:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-sn" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-imei">IMEI:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-imei" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-version">Verze:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-version" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-payment">Typ platby:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-payment" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-supplier">Dodavatel:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-supplier" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-claim">Datum nároku:</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-claim" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-taking">Datum převzetí:</label></th>
                                            <td class="td-form"><input id="form-date" type="date" class="form-control" name="b-taking" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <th class="th-form"><label for="b-notes">Poznámky:</label></th>
                                            <td class="td-form"><input type="text" class="form-control" name="b-notes" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <td class="th-form"><button type="submit" name="btn-new_b" class="btn btn-default">Odešli</button></td>
                                        </tr>
                                    </table>
                                </form>';