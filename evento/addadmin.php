<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'connect.php';
?>
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>add admin</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <?php
        include 'admin.php';
        ?>
        <style>
            .frm{
               background: transparent; 
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center"> ---Register Admin---</h2>
            <form class="container frm" name="addadmin" action="addadmin.php" method="post">
                <div class="form-group">
                    <i class="material-icons">account_box</i>
                    <label for="name" class="label">Name:</label>
                    <input type="text" id="name" name="name" required placeholder="xyz" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">perm_identity</i>
                    <label for="username" class="label">Username:</label>
                    <input type="text" id="username" required name="username" placeholder="enter your username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="label"><span>@ </span>Email:</label>
                    <input type="email" id="email" required name="email" placeholder="xyz@college.edu.in" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">https</i>
                    <label for="pass" class="label">Password:</label>
                    <input type="password" id="pass" required name="pass" placeholder="*******" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">phone_in_talk</i>
                    <label for="phone" class="label">Phone:</label>
                    <input type="tel" id="phone" name="phone" required placeholder="+91999999999" class="form-control">
                </div>
                <input class="btn btn-md" type="submit" id="submit" name="adminreg">
                <input class="btn btn-md" type="reset" id="reset" name="reset">
            </form>
        </div>
        <?php
        if (isset($_POST['adminreg'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $pas = $_POST['pass'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $q7 = "select * from userdetails where username like '$username';";
            $r11 = mysqli_query($con, $q7);
            $rc6 = mysqli_num_rows($r11);
            if ($rc6 >= 1) {
                echo "<br><script>alert('username already exisits')</script>";
            } else {
                $qui = "insert into userdetails(name,username,email,phone,password,type) values('$name','$username','$email','$phone','$pas','admin');";
                mysqli_query($con, $qui) or die("NOT REGISTERED");
                echo "<br><script>alert('Registeration successfull')</script>";
//                header("location:admin.php");exit;
                echo "<script type='text/javascript'>window.top.location='normal.php';</script>";
            }
        }
        ?>
    </body>
</html>
