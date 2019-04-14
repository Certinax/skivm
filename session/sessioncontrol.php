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
