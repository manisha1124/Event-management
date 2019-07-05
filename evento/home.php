<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'connect.php';
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
            .jumborton{
                font-family: 'Unica One',monospace;
            }
            .con1{
                background-color: rgba(255,255,255,0.5);
                height: 400px;
                position: relative;
                top: 180px;
            }
        </style>
        <script>
            if (!sessionStorage.adModal) {
                setTimeout(function () {
                    $('#admodal').find('.item').first().addClass('active');
                    $('#admodal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }, 3000);
                $(document).ready(function () {
                    // Activate Carousel
                    $("#myCarousel").carousel({
                        interval: 4000,
                        cycle: true
                    });

                    // Enable Carousel Indicators
                    $(".item1").click(function () {
                        $("#myCarousel").carousel(0);
                    });
                    $(".item2").click(function () {
                        $("#myCarousel").carousel(1);
                    });
                    $(".item3").click(function () {
                        $("#myCarousel").carousel(2);
                    });

                    // Enable Carousel Controls
                    $(".carousel-control-prev").click(function () {
                        $("#myCarousel").carousel("prev");
                    });
                    $(".carousel-control-next").click(function () {
                        $("#myCarousel").carousel("next");
                    });
                });


            }
            sessionStorage.adModal = 1;

        </script>
    </head>
    <body>
        <?php
        include 'normal.php';
        $qu9 = "select * from poster;";
        $r14 = mysqli_query($con, $qu9) or die("error selecting table");
        $rc5 = mysqli_num_rows($r14);
        ?>
        <div class="modal fade" id="admodal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container mt-3">
                            <h2>Events this week</h2>
                            <div id="myCarousel" class="carousel slide">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li class="item1 active"></li>
                                    <li class="item2"></li>
                                    <li class="item3"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="pos.jpg" alt="1" width="490" height="500">
                                    </div>
                                    <?php
                                    $qu16 = "SELECT * FROM events INNER JOIN poster ON events.eventname = poster.eventname;";
                                    $r21 = mysqli_query($con, $qu16);
                                    while ($row8 = mysqli_fetch_assoc($r21)) {
                                        if ($row8['status'] == "approved") {
                                            $dir = glob('poster/{*}', GLOB_BRACE);
                                            ?>
                                            <?php foreach ($dir as $key => $value) { ?>
                                                <div class="carousel-item">
                                                    <img src="<?php echo $value ?>" alt="2" width="490" height="500">
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#myCarousel">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Close</button><br class="visible-xs">
                        <br class="visible-xs">
                        <a href="event.php"><button class="btn btn-success" type="button" id="buttonSuccess">More about Event</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumborton con1 text-center">
            <h1 class="display-3">Know about the<h1>
                    <span class="display-4">Events</span>
                    <h2>in our college</h2>
                    <div class="d-inline">
                        <a href="gallery.php"><button class="btn btn-outline-info btn-lg">View Gallery Of Past Events</button></a>
                        <a href="event.php"><button class="btn btn-outline-info btn-lg">Show About Upcoming Events</button></a>
                    </div>
                    </div>
                    </body>
                    </html>