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
            <title>ads</title>
            <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
            <link rel="stylesheet" href="evento.css">
            <style>
                section{
                    color: white;
                    opacity: 1.0;
                    font-weight: bold;
                    background: #0066ff;
                    padding: 30px;
                }
                section:hover{
                    color: black;
                    background-color: white;
                } 
                .frm{
                    background-color: rgba(255,255,255,0.5);
                }
                p{
                font-family: monospace;
                font-size: 20px;
            }
            </style>
        </head>
        <body>
            <?php
            include "normal.php";
            ?>
            <div class="container" id="con">
                <h2 class="text-center font-weight-bold">----Request ads----</h2>
                <form class="container" id="form3" method="post" action="ads.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <i class="material-icons">event_note</i>
                        <label for="eventname" class="label">Event Name:</label>
                        <input type="text" required name="eventname" placeholder="enter event name" class="form-control">
                    </div>
                    <div class="form-group">
                        <i class="material-icons">image</i>
                        <label for="eventname" class="label">Poster:</label>                    
                        <input class="form-control-file" type="file" accept="image/*" required name="poster">
                    </div>
                    <input class="btn btn-lg btn-info" type="submit" name="adsub" id="submit">
                    </fieldset>
                </form>
            </div>
            <?php
            if (isset($_POST['adsub'])) {
                $eventname = $_POST['eventname'];
                $file = $_FILES['poster'];
                $filename = $_FILES['poster']['name'];
                $filetmpname = $_FILES['poster']['tmp_name'];
                $target = "poster/" . $filename;
                $qu7 = "insert into poster(eventname,imagetmp,image) values('$eventname','$filetmpname','$filename');";
                mysqli_query($con, $qu7) or die("error");
                move_uploaded_file($filetmpname, $target);
                echo '<div class="container" style="z-index:20;">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
                <p>Ads Requested.</p>
                <p>Check the home page if ads pop up in 4s</p>
            </div>           
                </div>';
            }
       
        ?>
    </body>
</html>
