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
        $qu15 = "select * from events where status='approved';";
        $r20 = mysqli_query($con, $qu15); ?>
        <div class="container">
            <div class="card-deck">
                <?php while ($row7 = mysqli_fetch_assoc($r20)){
        $event = $row7['eventname'];
        ?>
                <div class="card" style="width:400px">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $event ?></h4>
                      <p class="card-text">DATE: <?php echo $row7['date']  ?></p>                      
                      <p class="card-text">VENUE: <?php echo $row7['venue'] ?></p>
                      <p class="card-text">TIME: <?php echo $row7['time'] ?></p>
                      <p class="card-text">DESCRIPTION:<?php echo $row7['description'] ?></p>
                    </div>
                    <?php
                            $r23 = mysqli_query($con,"select * from poster where eventname='$event';") or die("here");
                            if(mysqli_num_rows($r23)==1){ 
                                $r24 = mysqli_fetch_array($r23);
                                ?>
                    <img class="card-img-top" src="poster/<?php echo $r24['image']?>" alt="Card image">
                         <?php   } ?>

                    
                </div>
         <?php 
        }?>
            </div>
        </div>
        
        
       
        

    </body>
</html>
