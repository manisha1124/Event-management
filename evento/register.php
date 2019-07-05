<!DOCTYPE html>
<?php
require 'connect.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            span{
                font-size: 20px;
            }
            body{
                color: #3975d6;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid row">
            <div class="col-5 one d-block"></div>
            <div class="container col-7">
                <h2 class="text-center"> -------Register-------</h2>
                <form  name="register" action="register.php" method="post" class="container frm">
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
                    <div class="form-group">
                        <i class="material-icons">domain</i>
                        <label for="dept" class="label">Dept:</label>
                        <select id="dept" class="form-control" name="dept">
                            <option>CSE</option>
                            <option>ECE</option>
                            <option>Biotech</option>
                            <option>Bioinfo</option>
                            <option>foodpro</option>
                            <option>Agri</option>
                            <option>EMT</option>
                            <option>Viscom</option>
                            <option>Aero</option>
                            <option>Mech</option>
                            <option>Civil</option>
                            <option>EEE</option>
                            <option>Maths</option>
                            <option>Eng</option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="regnum" class="label">Regnum:(UR15CS001)</label>
                        <input type="text" id="regnum" name="regnum"required placeholder="UR17EE001/KU15CS003" class="form-control" pattern="(UR)[0-9]{2}[A-Z]{2}[0-9]{3}|(KU)[0-9]{2}[A-Z]{2}[0-9]{3}">
                    </div>

                    <input class="btn btn-md" type="submit" id="submit" name="reg">
                    <input class="btn btn-md" type="reset" id="reset" name="reset">
                    <a href="index.php" class="float-right">Close</a>
                </form>
            </div>
        </div><?php
        if (isset($_POST['reg'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $pas = $_POST['pass'];
            $dept = $_POST['dept'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $regnum = $_POST['regnum'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo 'enter valid email id';
            }
            $q = "select * from userdetails where username like '$username';";
            $rd = mysqli_query($con, $q);
            $r = mysqli_num_rows($rd);
            if ($r >= 1) {
                echo "<br><script>alert('username already exisits')</script>";
            } else {
                $qi = "insert into userdetails(name,username,email,phone,password,dept,regnum,type) values('$name','$username','$email','$phone','$pas','$dept','$regnum','normal');";
                mysqli_query($con, $qi) or die("NOT REGISTERED");
                echo "<br><script>alert('Registeration successfull')</script>";
                //header("Location:normal.php");exit;
                echo "<script type='text/javascript'>window.top.location='normal.php';</script>";
            }
        }
        if (isset($_POST['close'])) {
            header("location:index.php");
        }
        ?></body>
</html>
