<?php
if (session_status() == PHP_SESSION_NONE) {
    //session has not started
    session_start();
}

if (!isset($_SESSION["loggedIn"])) {
    $_SESSION["loggedIn"] = false;
}
if (!$_SESSION["loggedIn"]) {
    $_SESSION["loggedIn"] = false;
}

function loginStatus() {
    if ($_SESSION["loggedIn"] == 1) {
        echo "<p class='loggedin'>Logged in</p>";
    } else {
        echo "<p class='loggedout'>Not Logged in - Sign in to edit</p>";
    }
}
