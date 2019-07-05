<?php
session_start();
require 'connect.php';
//if ($_SESSION['uid'] == TRUE) {
    ?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html lang="en">
        <head>
            <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
            <title>admin</title>       
            <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
            <link href='https://fonts.googleapis.com/css?family=Unica One' rel='stylesheet'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="evento.css">
            <style>
                .back{
                    background: -webkit-linear-gradient(to right, #141e30, #243b55);
                    background: linear-gradient(to right, #141e30, #002c89);
                    height: 100%;
                }
                header{
                    font-family: 'Unica One',monospace;
                }
                hr {
                    height: 2px;
                    background-color: white;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    width: 90%;
                }
                .nav-link{
                    color: white;
                    font-family: 'Unica One',monospace;
                }
                .col-2{
                    position: fixed;
                }
                .btn-outline{
                    color: white;
                    border-color: white;
                }
            </style>
        </head>
        <?php
        $qur3 = "delete from events where date < curdate();";
        mysqli_query($con, $qur3) or die("error date query");
        ?>
        <body class="back text-light">
            <header class="h1 col-12 container-fluid">
                <img id="logo" src="" alt="log">
                <form action="logout.php" method="post">
                    <button class="btn btn-outline float-right" name="logout"><?php echo $_SESSION['uname'] . " "; ?>Logout</button>  
                </form> 
                <p class="text-center">Admin Panel</p>
                
            </header>
            <hr>
            <div class="container sticky-top">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.php">Events</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="container col-2 float-left">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="statusupdate.php">Status Update</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update.php">Update Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addadmin.php">Add Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galleryupdate.php">Gallery Update</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adsmanage.php">Ads</a>
                        </li>
                    </ul>
                </div>
                <?php
//            } else {
//                header("Location: index.php");
//            }
           ?>
    </body>
</html>
