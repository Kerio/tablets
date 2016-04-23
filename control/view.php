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
            <script src="../js/interaction.js"></script>
            <script type="text/javascript" src="../js/search.js"></script>
            <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>
    <!-- import ccs style -->
            <link rel="stylesheet" href="../css/main_style.css">
            <link rel="stylesheet" href="../css/admin_style.css">
            <link rel="stylesheet" href="../css/user_style.css">
            <title>'.$phrase[$locale]['kerio_b'].'</title>
        </head>';

$foot = '<!-- footer of page -->
            <footer class="navbar-fixed-bottom bg-1 text-center">
                <p>'.$phrase[$locale]['footer_text'].'</p>
            </footer>';