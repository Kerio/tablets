<?php
require 'locale.php';

$head = '<!DOCTYPE html>
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
            <link rel="stylesheet" href="../css/main_style.css">
            <link rel="stylesheet" href="../css/admin_style.css">
            <link rel="stylesheet" href="../css/user_style.css">
        </head>';

//$navbar = '
//        <!-- navigation bar -->
//            <nav class="navbar navbar-inverse">
//                <div class="container">
//                    <div class="navbar-header">
//                        <a class="navbar-brand" href="../index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
//                    </div>
//
//        <!-- exchange language -->
//                    <ul class="nav navbar-nav navbar-right">
//                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
//                            <ul class="dropdown-menu">
//                                <li><a href="?locale=cz">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
//                                <li><a href="?locale=eng">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
//                            </ul>
//                        </li>
//                    </ul>
//
//                    <ul class="nav navbar-nav navbar-right">
//                        <label><a href="../control/logout.php"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
//                    </ul>
//                </div>
//            </nav>';

$foot = '<!-- footer of page -->
            <footer class="navbar-fixed-bottom bg-1 text-center">
                <p>'.$phrase[$locale]['footer_text'].'</p>
            </footer>';