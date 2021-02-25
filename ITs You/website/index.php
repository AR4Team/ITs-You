<?php
// By n5y
 session_start();
 if (isset($_SESSION['role']) == 'admin'){
    header('location:AddSerial.php');
    die();
 }
 include "db.php";
 if (isset($_POST['username'])) {
     $user = $_POST['username'];
     $pass = sha1($_POST['password']);
     $select = $con->query("SELECT * FROM users WHERE username='$user'");
     if ($select->num_rows > 0) {
         $user_data = $select->fetch_assoc();
         if ($pass == $user_data['password']) {
            $_SESSION['role'] = $user_data['role'];   
            if ($user_data['role'] == 'admin'){
                echo "
                <div class='noti0' style='height:55px;width:151px; background-color:#27ae60;'></div>
                <div class='noti0' style='width:146px' ><h6 class='noti1'>Logged in</h6></div>
                ";
                header('location:index.php');
                die();
            }else{
                echo "
                <div class='noti0' style='height:55px;width:100px; background-color:#c0392b;'></div>
                <div class='noti0' style='width:95px' ><h6 class='noti1'>Error</h6></div>
                ";
            }    
         } else {
             echo "
             <div class='noti0' style='height:55px;width:100px; background-color:#c0392b;'></div>
             <div class='noti0' style='width:95px' ><h6 class='noti1'>Error</h6></div>
             ";
         }
     } else {
        echo "
        <div class='noti0' style='height:55px;width:100px; background-color:#c0392b;'></div>
        <div class='noti0' style='width:95px' ><h6 class='noti1'>Error</h6></div>
        ";
     }
 }
?>
<html lang='en'>
<html>
    <head>
        <title>ItsYou ?</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="background-color:#252525;">

        <form class="form" method="post">
                <center>          
                    <div class="cc" style="height: 230px; background-color: #191919; margin-top: 6px;"></div>
                    <div class="cc" style="height: 230px;">
                        <h6 style="color: white; margin-top: 20px;">its You ?</h6>
                    </div>
                        <div class="center" style="margin-top: 10px;">
                            <form method="POST" action="">
                                <input type="text" id="T1" class="form-control" placeholder="username" name='username'>
                                <input  type="password" id="T1" class="form-control" placeholder="Password" name='password'>
                                <button type="submit" id="B1" class="btn btn-secondary" style="width: 90px; background-color: #2ecc71;">Log in</button>
                            </form>      
                        </div>        
                   <h6 class="Copyr" href="">© By n5y</h6>
                </center> 
        </form>
    </body>
</html>