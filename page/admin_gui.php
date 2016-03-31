<?php
//  import locales for translation website
require '../bin/view.php';

echo $head.
       '<body>'
    .$navbar.
    
       '<!-- center of page -->
            <div id="div-center" class="container-fluid">
        <!-- table pane -->
                <div id="div-table" class="col-md-9 table-responsive">
                    <table class="table table-striped">
                        <thead><tr><th>Col 1</th><th>Col 2</th><th>Col 3</th></tr></thead>
                        <tbody>';
                            for ($i = 0; $i < 50; $i++) {
                                echo '<tr>
                                        <td>aaaaaaaaaaaaaaaaaaaaaaa</td>
                                        <td>bbbbbbbbbbbbb</td>
                                        <td>ccccccccccccccc</td>
                                      </tr>';
                            }
echo '                  </tbody>
                     </table>
                 </div>
                 
        <!-- control pane -->
                <div id="div-control" class="col-md-3">
                    <div id="div-info" class ="row">
                        <p>Some informations</p>
                    </div>
                    <div id="div-edit" class ="container-fluid">
                        <ul class="nav nav-tabs">
                            <li class = "active"><a data-toggle="tab" href="#new_b">New benefit</a></li>
                            <li><a data-toggle="tab" href="#edit_b">Edit benefit</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="new_b" class="tab-pane fade in active">
                                <p>Creating new benefit</p>
                            </div>
                            <div id="edit_b" class="tab-pane fade">
                                <p>Editing benefit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>'
    
        .$foot.
        '</body>
    </html>';
?>
