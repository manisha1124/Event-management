<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>cancel</title>
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
        </style>
    </head>
    <body>
        <?php
        include "normal.php";
        ?>
        <div class="container" id="con">
            <h2 class="text-center font-weight-bold">----Cancel event----</h2>
            <form class="container" id="form3" method="post" action="cancel.php">
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
                <div class="form-group">
                    <label for="date" class="label">Reason:</label>
                    <input type="textarea" size="25" placeholder="Enter your reason" class="form-control">
                </div>
                <input type="submit" class="btn btn-lg btn-info" name="sub4" id="submit">
            </form>
        </div>
        <?php
        if (isset($_POST['sub4'])) {
            $eventname =$_POST['eventname'];
            $date =$_POST['date'];
            $dept =$_POST['dept'];
            $query = "select * from events where eventname like '$eventname';";
            $r5 = mysqli_query($con, $query) or die("event selection problem");
            $rc2 = mysqli_num_rows($r5);
            if ($rc2 >= 1) {
                $qu4 = "delete from events where eventname like '$eventname';";
                $r6 = mysqli_query($con, $qu4) or die("event not deleteed");
                echo '<div class="container">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h3>Event cancelled successfully :)</h3>
            </div>           
        </div>';
            } else {
                echo "<h3>event is not found<h3>";
            }
        }
        ?>
    </body>
</html>
