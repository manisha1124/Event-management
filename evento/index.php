<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>event</title>       
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link href='https://fonts.googleapis.com/css?family=Unica One' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="evento.css">
        <style>
            body{
                background-image: url("bg3.jpg");
                background-size: cover;
                color: black;
            }
            section{               
                border: 3px solid silver;
            }
            section:hover{             
                background-color: white;
                cursor: pointer;
            }
            .text-decoration-none{
                color: black;
            }
        </style>
    </head>
    <body>
        <header>
            <nav id="indexnav">
                <a href="home.php"> <img id="logo" src="logo.png" alt="logo"></a>               
                <ul>
                    <li><a href="home.php" class="text-decoration-none font-weight-bold">Home</a></li>
                    <li><a href="gallery.php" class="text-decoration-none font-weight-bold">Gallery</a></li>
                    <li><a href="event.php" class="text-decoration-none font-weight-bold">Events</a></li>
                </ul>
            </nav>
        </header>
        <article>
            <div id="indexd1" class="font-weight-bold container" >
                <section id="s1" class="sec"><a href="login.php" class="text-decoration-none">LOGIN</a></section>
                <section id="s2" class="sec"><a href="register.php" class="text-decoration-none">REGISTER</a></section>
            </div>
        </article>
        <?php
        ?>
    </body>
</html>
