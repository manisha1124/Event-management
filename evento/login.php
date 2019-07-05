<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'connect.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>login page</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            body{
                color: #3975d6;
            }
            
        </style>
    </head>
    <body>
        <div class="container-fluid row">
            <div class="col-5 one d-block"></div>
            <div class="container col-7">
                <h2 class="text-center">--LOGIN TO YOUR ACCOUNT--</h2>
                <form class="container frm" name="login" action="login.php" method="post">                   
                    <div class="form-group">
                        <i class="material-icons">account_box</i>
                        <label for="name" class="label">Username or Email:</label>
                        <input type="text" id="username" required name="username" placeholder="enter your username/emailID" class="form-control">
                    </div>
                    <div class="form-group">
                        <i class="material-icons">https</i>
                        <label for="name" class="label">Password:</label>
                        <input type="password" id="pass" required name="pass" placeholder="******" class="form-control">
                    </div>
                    <input  class="btn btn-md" type="submit" id="submit" name="login" value="LOGIN">
                    <a href="index.php" class="float-right">Close</a> 
                </form>
                </div>
            </div>
            <?php           
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $q1 = "select * from userdetails where (username like '$username' or email like '$username' and password like '$pass');";
                $r1 = mysqli_query($con, $q1) or die("error");
                $r2 = mysqli_num_rows($r1);
               if ($r2 >= 1) {
                   $row1= mysqli_fetch_assoc($r1);
                   $_SESSION['uid']=$row1['uid'];
                   $_SESSION['uname']=$row1['username'];
                   $_SESSION['type']=$row1['type'];
                   $type = $row1['type'];
                    if ($type == 'normal') {
                        header("location:normal.php");
                        exit();
                    } elseif ($type == 'admin') {
                        header("location:admin.php");
                        exit();
                    }
                } 
               else {
                    echo '<div class="container">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h3>INVALID userID or password :\</h3>
            </div>           
        </div>';
                }
            }
            ?>
    </body>
</html>
