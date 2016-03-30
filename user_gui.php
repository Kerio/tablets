<?php
//  import locales for translation website
require 'locale.php';
require 'benefit.php';

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

echo '<!-- tab bar -->';
echo '<div class="container">';
echo    '<ul class="nav nav-tabs">';
echo        '<li class="active"><a data-toggle="tab" href="#benefit1">'.$phrase[$locale]['mobile'].'</a></li>';
echo        '<li><a data-toggle="tab" href="#benefit2">'.$phrase[$locale]['tablet'].'</a></li>';
echo        '<li><a data-toggle="tab" href="#benefit3">Benefit3</a></li>';
echo    '</ul>';

echo '<div class="tab-content">';
echo   '<div id="benefit1" class="tab-pane fade in active">';
echo        $mobile;
echo  '</div>';

echo  '<div id="benefit2" class="tab-pane fade">';
echo        $tablet;
echo  '</div>';

echo  '<div id="benefit3" class="tab-pane fade">';
echo    '<h3>benefit3</h3>';
echo  '</div>';
echo '</div>';
echo '</div>';

echo '    <!-- footer of page -->';
echo '    <footer class="navbar-fixed-bottom bg-1 text-center">';
echo '        <p>'.$phrase[$locale]['footer_text'].'</p>';
echo '    </footer>';
echo '</body>';

