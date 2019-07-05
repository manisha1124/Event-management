<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>gallery</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            .main{
                position: relative;
                top: 100px;
                left: 5%;
            }
            
        </style>
    </head>
    <body>
        <?php
        include 'normal.php';
        $i=0;
        ?>
        <div class="container main">
            <h2 class="col-12"><u>Event Gallery</u></h2>
            <?php
            $dir = glob($_SESSION['disp'] . '/{*}', GLOB_BRACE);
            if($i%3==0){
                echo '<div class="row justify-content-center">';
            }
            foreach ($dir as $key => $value) { ?>
                    <div class="col-xs-1  col-sm-3">
                        <a href="" data-toggle="lightbox"><img class="img-fluid rounded thumbnail" src="<?php echo $value ?>" alt="image" height="400" width="450"></a>                    
                    </div>
                    <?php
                }
                if($i%3==3){
                    echo '</div>';
                }
                $i++;
                ?>
            </div>
        <script>
            
        </script>
    </body>
</html>
