<?php
// By n5y
session_start();
include "db.php";
    $user = $_GET['u'];
    $password = sha1($_GET['p']);
    $select = $con->query("SELECT * FROM users WHERE username='$user'");
    if ($select->num_rows > 0) {
        echo "This username is Alredy used";
    }else{
        $select = $con->query("INSERT INTO users(username, password) VALUES('$user', '$password')");
        echo "Registred Successful , Thanks";
    }
?>