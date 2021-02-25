<?php
// By n5y
session_start();
include "db.php";
    $skey = $_GET['skey'];
    $user = $_GET['u'];
    $select = $con->query("SELECT * FROM users WHERE username='$user'");  
    if ($select->num_rows > 0) {
        $user_data = $select->fetch_assoc();
        $id = $user_data['id'];
        $products = $user_data['products'];
        $select2 = $con->query("SELECT * FROM serials WHERE skey='$skey'");
        if ($select2->num_rows > 0) {
            $serial_data = $select2->fetch_assoc();
            $newproducts = $serial_data['products'];
            $id2 = $serial_data['id'];
            if ($serial_data['used'] == '0'){
                if (strpos($products, $newproducts) !== false) {
                    echo "You Alredy Have This Program";
                }else{
                    $select3 = $con->query("UPDATE `users` SET `products` = '$products , $newproducts' WHERE `users`.`id` = $id;");
                    $select4 = $con->query("UPDATE `serials` SET `used` = '1' WHERE `serials`.`id` = $id2;");
                    echo 'Serial have Been used Successful ,The New Product For ' . $user . ' is ' . $newproducts ; 
                }             
            }else{
                echo "serial is used";
            }
        }else{
            echo "Serial is wrong";
        }
    }  else{
        echo "username is wrong" ; 
    }
?>