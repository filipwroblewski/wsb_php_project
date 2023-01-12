<?php
    // load login data
    require_once('../credentials/db-login.php');

    // connection to database
    $mysqli = new mysqli("localhost", $login, $pass, "oto_sadzonki");
?>