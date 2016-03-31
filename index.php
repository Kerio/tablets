<?php
//  import locales for translation website
    require 'bin/locale.php';

echo '<!DOCTYPE html>
    <html lang= "\'.$phrase[$locale][\'lang\'].\'">
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
        </head>
        
        <body>
    <!-- navigation bar -->
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="page/zaklad_stranky.php?locale='.$locale.'">default page</a></li>
                        <li><a href="page/user_gui.php?locale='.$locale.'">user GUI</a></li>
                        <li><a href="page/admin_gui.php?locale='.$locale.'">admin GUI</a></li>
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
            <div class="container">
                <div id="midlle" class="row">
    <!-- login formu -->
                    <div id="form" class="col-md-6">
                        <h2>'.$phrase[$locale]['login'].'</h2>
                        <br>
                        <form name="loginform" method="POST" action="bin/checklogin.php">
                            <div class="form-group">
                                <label for="usr">'.$phrase[$locale]['login_mail'].'</label>
                                <input type="text" class="form-control" name="usr" placeholder="'.$phrase[$locale]['login_mail_text'].'">
                            </div>
                            <div class="form-group">
                                <label for="pwd">'.$phrase[$locale]['login_pwd'].':</label>
                                <input type="password" class="form-control" name="pwd" placeholder="'.$phrase[$locale]['login_pwd_text'].'">
                            </div>
                            <button type="submit" class="btn btn-default">'.$phrase[$locale]['submit'].'</button>
                        </form>
                    </div>

    <!-- kerio logo -->
            <div id="div-logo" class="col-md-6">
                <img src="img/kerio-logo.png" class="img-responsive" alt="Kerio technologies s.r.o. logo" width="500">
            </div>

    <!-- footer of page -->
            <footer class="navbar-fixed-bottom bg-1 text-center">
                <p>'.$phrase[$locale]['footer_text'].'</p>
            </footer>
        </body>
    </html>';

