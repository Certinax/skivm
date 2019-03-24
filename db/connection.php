<?php

function connectToDatabase() {
    $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        } else {
            return $db;
        }
}