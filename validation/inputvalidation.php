<?php

function userNameValidation($username)
{
    $regex = '/^(?=[a-z]{4,20})(?=[^_]*_?[^_]*$)[\w.]+$/';

    if (!preg_match($regex, $username)) {
        echo "<p class='cancelation'>Following requirements for username must be met: (a-z), between 4-20 characters, only one '_' underscore is allowed.</p>";
        return false;
    }

    $db = connectToDatabase();
    $stmt = "SELECT * from administrator WHERE username = '$username'";
    $result = $db->query($stmt);
    if (!$result) {
        echo "<p class='cancelation'>Could not retrieve information from database</p>";
        return false;
    } else if ($db->affected_rows > 0) {
        echo "<p class='cancelation'>Username already taken</p>";
        return false;
    } else if ($db->affected_rows == 0) {
        return true;
    }
}

function nameValidation($firstname, $lastname)
{
    $regex = '/^(?=[a-zA-Z ]{2,45})[\w.]+$/';
    $errmsg = "";
    $error = 0;

    if (!preg_match($regex, $firstname)) {
        $errmsg .= "<p class='cancelation'>Firstname is not valid, must be characters a-zA-Z, 2-45</p><br/>";
        $error++;
    }
    if (!preg_match($regex, $lastname)) {
        $errmsg .= "<p class='cancelation'>Lastname is not valid, must be characters a-zA-Z, 2-45</p>";
        $error++;
    }
    if ($error != 0) {
        echo $errmsg;
        return false;
    } else {
        return true;
    }
}

function passwordValidation($password, $re_password)
{
    // $regex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    $regex = '/^(?=.*[A-Za-z])[A-Za-z]{8,}$/';
    $errmsg = "";
    $error = 0;

    if (!preg_match($regex, $password)) {
        $errmsg .= "<p class='cancelation'>Password requirements: minimum 8 characters, at least one letter and one number.</p>";
        $error++;
    }

    if (!($password == $re_password)) {
        $errmsg .= "<p class='cancelation'>Passwords does not match</p>";
        $error++;
    }
    if ($error != 0) {
        echo $errmsg;
        return false;
    } else {
        return true;
    }
}
