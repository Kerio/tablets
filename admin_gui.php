<?php
//  import locales for translation website
require 'locale.php';

//  language setting
if($_GET == NULL){
    $locale = 'cz';
}
else{
    $locale = $_GET['locale'];
}

echo '<!DOCTYPE html>
    <html lang= "'.$phrase[$locale]['lang'].'">
        <head>
            <meta charset="utf-8">
        <!-- automatic width according device -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- import Bootstrap v.3.3.6 -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- import ccs style -->
            <link rel="stylesheet" href="css/main_style.css">
            <link rel="stylesheet" href="css/admin_style.css">
        </head>

    <body>
        <!-- navigation bar -->
            <nav class="navbar navbar-inverse">  
                <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.php">'.$phrase[$locale]['kerio_b'].'</a>
                        </div>
                    <ul class="nav navbar-nav">
                        <li><a href="zaklad_stranky.php">default page</a></li>
                        <li><a href="user_gui.php">user GUI</a></li>
                        <li><a href="admin_gui.php">admin GUI</a></li>
                    </ul>
        <!-- exchange language -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?locale=cz">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li><a href="?locale=eng">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
        <!-- center of page -->
            <div id="div-center" class="container-fluid">
        <!-- table pane -->
                <div id="div-table" class="col-md-9 table-responsive">
                    <table class="table table-striped">
                        <thead><tr><th>Col 1</th><th>Col 2</th><th>Col 3</th></tr></thead>
                        <tbody>';
        for ($i = 0; $i < 50; $i++) {
            echo '<tr><td>aaaaaaaaaaaaaaaaaaaaaaa</td><td>bbbbbbbbbbbbb</td><td>ccccccccccccccc</td></tr>';
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
            </div>
            
        <!-- footer of page -->
            <footer class="navbar-fixed-bottom bg-1 text-center">
                <p>'.$phrase[$locale]['footer_text'].'</p>
            </footer>
        </body>
    </html>';
?>
