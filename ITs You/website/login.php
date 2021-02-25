<?php
// By n5y
session_start();
include "db.php";
    $user = $_GET['u'];
    $pass = sha1($_GET['p']);
    $select = $con->query("SELECT * FROM users WHERE username='$user'");
    if ($select->num_rows > 0) {
        $user_data = $select->fetch_assoc();
        if ($pass == $user_data['password']) {
            echo "Logged in  - Products : " . $user_data['products'];
        } else {
            echo "Login Filed";
        }
    } else {
        echo "Login Filed";
    }
?>