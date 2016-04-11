<?php
//  import locales for translation website
    require 'control/locale.php';
    require 'control/db_config.php';

if($user->is_loggedin()!=""){
    $user->redirect('page/user_gui.php?locale='.$locale);
}

if(isset($_POST['btn-login'])) {
    $umail = $_POST['usr'];
    $upass = $_POST['pwd'];

    if ($user->login($umail, $upass)) {
        $user->redirect('page/user_gui.php?locale='.$locale);
    }
}

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
                        <a class="navbar-brand" href="index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    
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
                <div class="col-lg-1"></div>
                    <div id="form" class="col-lg-3">
                        <h2>'.$phrase[$locale]['login'].'</h2>
                        <br>
                        <form name="loginform" method="POST">
                            <div class="form-group">
                                <label for="usr">'.$phrase[$locale]['login_mail'].'</label>
                                <input type="email" class="form-control" name="usr" placeholder="'.$phrase[$locale]['login_mail_text'].'">
                            </div>
                            <div class="form-group">
                                <label for="pwd">'.$phrase[$locale]['login_pwd'].':</label>
                                <input type="password" class="form-control" name="pwd" placeholder="'.$phrase[$locale]['login_pwd_text'].'">
                            </div>
                            <button type="submit" name="btn-login" class="btn btn-default">'.$phrase[$locale]['submit'].'</button>
                        </form>
                    </div>
                <div class="col-lg-1"></div>
    <!-- kerio logo -->
            <div id="div-logo" class="col-lg-6">
                <img src="img/kerio-logo.png" class="img-responsive" alt="Kerio technologies s.r.o. logo" width="600">
            </div>

    <!-- footer of page -->
            <footer class="navbar-fixed-bottom bg-1 text-center">
                <p>'.$phrase[$locale]['footer_text'].'</p>
            </footer>
        </body>
    </html>';

