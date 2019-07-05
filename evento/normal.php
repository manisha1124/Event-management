<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require 'connect.php';
//if ($_SESSION['uid'] == TRUE) {
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>registered users</title>
        <link rel="stylesheet" href="evento.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            section{
                opacity: 1.0;
                font-weight: bold;
                background: #0066ff;
                padding: 30px;
                font-family: 'Unica One',monospace;
            }
            section:hover{
                background-color: white;
            }    
            .sidebar{
                height: 250px;
                position: fixed;
                left: 0px;
                opacity: 0.7;
                float: left;   
                top: 200px; 
                z-index: 2;
            }
            .normal{
                background-image: url("calen.jpg");
                background-size: cover;
                background-repeat: none;
            }
            .text-decoration-none{
                color: black;
            }
            .back{
                position: fixed;
                bottom: 0px;
                right: 0px;
            }
        </style>
    </head>
    <body class="normal">
        <header>
            <nav id="indexnav">                
                <a href="home.php"> <img id="logo" src="logo.png" alt="logo"></a>
                <ul>
                    <li><a href="home.php" class="text-decoration-none font-weight-bold">Home</a></li>
                    <li><a href="gallery.php" class="text-decoration-none font-weight-bold">Gallery</a></li>
                    <li><a href="event.php" class="text-decoration-none font-weight-bold">Events</a></li>
                </ul> 
                    <?php 
                    if (isset($_SESSION['type']) and $_SESSION['type']=="admin"){
                        echo '<a href="admin.php" class="text-decoration-none text-light float-left" >Back to Admin panel</a>';
                        echo '<a href="admin.php" class="text-decoration-none back" ><button class="btn btn-outline-primary">Back to Admin panel</button></a>';
                    }
                    else{
                        echo'';
                    }
                    if (isset($_SESSION['uname'])) { ?>
                    <a href="logout.php"><button class="btn btn-primary float-right" name="logout"><?php echo $_SESSION['uname'] . " "; ?>Logout</button></a>   
                        <?php
                    } else {
                        echo '<a href="login.php"><button class="btn btn-primary float-right" name="login">Login</button></a>';
                    }
                    ?>             
            </nav>
        </header>
        <?php
        if (isset($_SESSION['uname'])) {
            ?>
            <div id="normalsidebar" class="container sidebar col-2">
                <section><a href="book.php" class="text-decoration-none font-weight-bold">Book Event</a></section>
                <section><a href="cancel.php" class="text-decoration-none font-weight-bold">Cancel Event</a></section>
                <section><a href="check.php" class="text-decoration-none font-weight-bold">Check Status</a></section>
                <section><a href="ads.php" class="text-decoration-none font-weight-bold">Request Ads</a></section>
            </div>
            <?php
        }
//        } else {
//            header("Location: index.php");
//        }
        ?>
    </body>
</html>
