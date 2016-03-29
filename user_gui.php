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

echo '<!DOCTYPE html>';
echo '<html lang= "'.$phrase[$locale]['lang'].'">';
echo '    <head>';
echo '        <meta charset="utf-8">';
echo '    <!-- automatic width according device -->';
echo '        <meta name="viewport" content="width=device-width, initial-scale=1">';
echo '    <!-- import Bootstrap v.3.3.6 -->';
echo '        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
echo '        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
echo '        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
echo '    <!-- import ccs style -->';
echo '        <link rel="stylesheet" href="css/main_style.css">';
echo '    </head>';

echo '    <body>';
echo '    <!-- navigation bar -->';
echo '        <nav class="navbar navbar-inverse">';
echo '            <div class="container">';
echo '                <div class="navbar-header">';
echo '                    <a class="navbar-brand" href="index.php">'.$phrase[$locale]['kerio_b'].'</a>';
echo '                </div>';
echo '                <ul class="nav navbar-nav">';
echo '                    <li><a href="zaklad_stranky.php">default page</a></li>';
echo '                    <li><a href="user_gui.php">user GUI</a></li>';
echo '                    <li><a href="admin_gui.php">admin GUI</a></li>';
echo '                </ul>';
echo '     <!-- exchange language -->';
echo '                <ul class="nav navbar-nav navbar-right">';
echo '                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>';
echo '                        <ul class="dropdown-menu">';
echo '                            <li><a href="?locale=cz">'.$phrase[$locale]['nav_lang_cz'].'</a></li>';
echo '                            <li><a href="?locale=eng">'.$phrase[$locale]['nav_lang_eng'].'</a></li>';
echo '                        </ul>';
echo '                    </li>';
echo '                </ul>';
echo '            </div>';
echo '        </nav>';

echo '<!-- center of page -->';
echo '<ul class="nav nav-tabs">';
echo    '<li class="tab"><a data-toggle="pill" href="#benefit1">mobil</a></li>';
echo    '<li><a data-toggle="tab" href="#benefit2">tablet</a></li>';
echo    '<li><a data-toggle="tab" href="#benefit3">Benefit3</a></li>';
echo '</ul>';
echo '<div class="tab-content">';
echo   '<div id="benefit1" class="tab-pane fade in active">';
echo    '<h3>mobil</h3>';
echo    '<div class="well">';
echo        '<div class="progress">';
echo          '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">';
echo                '<span class="sr-only">60% Complete</span>';
echo            '</div>';
echo        '</div>';
echo        '<p>nárok na další: 21. 1. 2017<br>výše příspěvku: 14 000kč</p>';
echo    '</div>';
echo    '<div class="well">';
echo    '<h3>aktuální zařízení</h3>';
echo    '<p>název: Iphone 5S 64GB<br>zakoupeno: 21. 1. 2015<br>cena: 16 000kč<br>doplatek: 2 000kč</p>';
echo    '</div>';
echo  '</div>';

echo  '<div id="benefit2" class="tab-pane fade">';
echo    '<h3>tablet</h3>';
echo  '</div>';

echo  '<div id="benefit3" class="tab-pane fade">';
echo    '<h3>benefit3</h3>';
echo  '</div>';
echo '</div>';

echo '    <!-- footer of page -->';
echo '    <footer class="navbar-fixed-bottom bg-1 text-center">';
echo '        <p>'.$phrase[$locale]['footer_text'].'</p>';
echo '    </footer>';
echo '</body>';

