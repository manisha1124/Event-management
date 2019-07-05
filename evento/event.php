<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>event list</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            .container{
                position: relative;
                top: 100px;
                left: 5%;
            }
            p{
                font-family: 'Belgrano';
            }
        </style>
    </head>
    <body>
        <?php
        include 'normal.php';
        $qu15 = "select * from events;";
        $r20 = mysqli_query($con, $qu15);
        while ($row7 = mysqli_fetch_assoc($r20)){
            if ($row7['status']=="approved"){
        $qu12 = "SELECT * FROM events INNER JOIN poster ON events.eventname = poster.eventname;";
        $r17 = mysqli_query($con, $qu12);
        $i = 0;
        ?>
        <div class="container">
            <?php
            while ($row5 = mysqli_fetch_assoc($r17)) {

                if ($i % 3 == 0) {
                    echo '<div class="row">';
                }
                ?>
                <div class="card">
                    <img class="card-img-top" src="poster/<?php echo $row5['image']; ?>" alt="events" height="250px" style="width:100%">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row5['eventname']; ?></h3>
                        <p class="card-text">DATE :<?php echo $row5['date']; ?></p>
                        <p class="card-text">TIME :<?php echo $row5['time']; ?></p>
                        <p class="card-text">VENUE :<?php echo $row5['venue']; ?></p>
                    </div>
                </div>
                <?php
            }
            if ($i % 3 == 2) {
                echo '</div>';
            }
            $i++;
            ?>
        </div>
        <?php }
        }?>
        

    </body>
</html>
