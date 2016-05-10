<?php
    require 'control/locale.php'; // pro pouziti frazi
    require 'control/db_config.php'; // db/user/session

/* test zda je uzivatel prihlasen */
if($user->is_loggedin()!=""){
    $user->redirect('page/user_gui.php?locale='.$locale);
}
/* vypis chybove hlasky */
if(isset($_REQUEST["connect"])) {
    echo "Chybný E-mail nebo heslo!".'<br>';
    echo "Kombinace zadaného E-mailu a hesla neodpovídá položkám v databázi";
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
        </head>
        
        <body>
    <!-- navigation bar -->
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" id="label-brand" href="index.php?locale='.$locale.'">'.$phrase[$locale]['kerio_b'].'</a>
                    </div>
                    
    <!-- exchange language -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" id="language"><a class="dropdown-toggle"data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-globe"></span>   '.$phrase[$locale]['nav_lang'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li id="czech"><a href="?locale=cs">'.$phrase[$locale]['nav_lang_cz'].'</a></li>
                                <li id="english"><a href="?locale=en">'.$phrase[$locale]['nav_lang_eng'].'</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

    <!-- center of page -->
            <div class="container">
                <div id="midlle" class="row">
    <!-- login form -->
                    <div class="col-lg-1"></div>
                        <div id="form" class="col-lg-3">
                            <h2 id="label-highline">'.$phrase[$locale]['login'].'</h2>
                            <br>
                            <form name="loginform" method="POST" action="single-sign-on/idp.php">
                                <div class="form-group">
                                    <label id="label-email">'.$phrase[$locale]['login_mail'].':</label>
                                        <input id="input-email" type="email" class="form-control" name="usr" placeholder="'.$phrase[$locale]['login_mail_text'].'">
                                </div>
                                <div class="form-group">
                                    <label id="label-psw">'.$phrase[$locale]['login_pwd'].':</label>
                                    <input id="input-psw" type="password" class="form-control" name="pwd" placeholder="'.$phrase[$locale]['login_pwd_text'].'">
                                </div>
                                <button id="button-submit" type="submit" name="btn-login" class="btn btn-default">'.$phrase[$locale]['submit'].'</button>
                            </form>
                        </div>
                    <div class="col-lg-1"></div>
    <!-- kerio logo -->
                    <div id="div-logo" class="col-lg-6">
                        <img src="img/kerio-logo.png" class="img-responsive" alt="Kerio technologies s.r.o. logo" width="600">
                    </div>

    <!-- footer of page -->
                    <footer id="footer" class="navbar-fixed-bottom bg-1 text-center">
                        <p>'.$phrase[$locale]['footer_text'].'</p>
                    </footer>
                </div>
            </div>
        </body>
    </html>';

