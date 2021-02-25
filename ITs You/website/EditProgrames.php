<?php
    // By n5y
if (isset($_POST['St'])) {
    session_start();
    if (isset($_SESSION['role']) != 'admin'){
       unset($_SESSION['role']);
       header('location:index.php');
       die();
   }
   
    include "db.php";  
            if ($_POST['St'] == 'Delete') {
                $Prdelete = $_POST['Programes'];
                $select = $con->query("DELETE FROM `products` WHERE `products`.`id` = $Prdelete");
                echo "
                <div class='noti0' style='height:55px;width:125px; background-color:#27ae60;'></div>
                <div class='noti0' style='width:120px' ><h6 class='noti1'>Deleted</h6></div>";
            }else {
               $NEWName = $_POST['ProgramName'];
               $select = $con->query("INSERT INTO `products` (`id`, `name`) VALUES (NULL, '$NEWName');");
               echo "
               <div class='noti0' style='height:55px;width:125px; background-color:#27ae60;'></div>
               <div class='noti0' style='width:120px' ><h6 class='noti1'>Added</h6></div>";
            }
}

?>
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
    <?php
            require_once "Header.php";
       ?>
        <center>
            <form method="POST">
           <div class="cc" style="height: 195px; background-color: #191919; margin-top: 6px;"></div>
           <div class="cc" style="height: 190px;">
                   <h6 style="color: white; margin-top: 20px;">Edit Pro</h6>
            </div>
            <div class="center" style="margin-top: 10px;">
                         <input style='width:200px' type='text' id='T1' class='form-control' placeholder='Program Name' name='ProgramName'>
                          <select name="Programes" id="Programes">         
                         <option value='NewP'>New Program</option>
                           <?php
                                session_start();
                                include "db.php";
                                $select = $con->query("SELECT * FROM `products`");
                                while ($row = $select-> fetch_assoc()){
                                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                }
                            ?>
                         </select>
                         <select name="St" id="Programes">
                         <option value='Add'>Add</option>
                         <option value='Delete'>Delete</option>                      
                         </select>
                         <br>
                        <button type="submit" id="B1" class="btn btn-secondary" style="width: 90px; background-color: #2ecc71;  margin-top: 6px;margin-bottom: 6px;   ">Go</button>
                    </form>       
            </div>                              
            <h6 class="Copyr" href="">© By n5y</h6>
        </center>
    </body>
</html>