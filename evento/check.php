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
        <title>check</title>
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
                color: black;
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
            <h2 class="text-center font-weight-bold">----Check event----</h2>
            <form class="container" id="form3" method="post" action="check.php">
                <div class="form-group">
                    <i class="material-icons">event_note</i>
                    <label for="eventname" class="label">Event Name:</label>
                    <input type="text" required name="eventname" placeholder="enter event name" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons" style="font-size:20px">date_range</i>
                    <label for="date" class="label">Date:</label>
                    <input type="date" required name="date" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">domain</i>
                    <label for="date" class="label">Department:</label>
                    <select name="dept" class="form-control">
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
                <input class="btn btn-lg btn-info" type="submit" name="sub5" id="submit" value="Check">
            </form>
        </div>
        <?php
        if (isset($_POST['sub5'])) {
            $eventname = $_POST['eventname'];
            $date = $_POST['date'];
            $dept = $_POST['dept'];
            $qu5 = "select * from events where(eventname like '$eventname' and date like '$date' and dept like '$dept');";
            $r7 = mysqli_query($con, $qu5) or die("event selection problem");
            $rc3 = mysqli_num_rows($r7);
            if ($rc3 >= 1) {
                $qu6 = "select status from events where eventname like '$eventname';";
                $r8 = mysqli_query($con, $qu6) or die("error fetching status");
                while ($row2 = mysqli_fetch_assoc($r8)) {
                    echo '<div class="container">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button><p>STATUS:'.$row2['status'].'</p></div>           
        </div>';
            }
        }
        }
            ?>
    </body>
</html>
