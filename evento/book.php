<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>book event</title>
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
            body{
                color: black;
            }
            .cen{
                position: relative;
                left: 45%;
            }
            p{
                font-family: monospace;
                font-size: 20px;
            }
        </style>
    </head>
    <?php
    include "normal.php";
    ?>
    <body>
        <div class="container" id="con">
            <form class="container" id="form3" method="post" action="book.php">
                <h2 class="text-center font-weight-bold">----Book event----</h2>
                <div class="form-group">
                    <i class="material-icons">event_note</i>
                    <label for="eventname" class="label">Event Name:</label>
                    <input type="text" required name="eventname" placeholder="enter event name" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">date_range</i>
                    <label for="date" class="label">Date:</label>
                    <input type="date" required name="date" class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">watch</i>
                    <label for="time" class="label">Time:</label>
                    <input type="time" name="time" required class="form-control">
                </div>
                <div class="form-group">
                    <i class="material-icons">alarm</i>
                    <label for="date" class="label">Duration:</label>
                    <input type="number" required name="duration" placeholder="in hours" class="form-control">
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
                    <i class="material-icons">location_on</i>
                    <label for="date" class="label">Venue:</label>
                    <select name="venue" required class="form-control"> 
                        <option>Elohim</option>
                        <option>Pep</option>
                        <option>Bethesda</option>
                        <option>Emanuel</option>
                        <option>Gallery</option>
                        <option>DGS</option>
                        <option>other</option>
                    </select>
                </div>
                <div class="form-group">
                    <i class="material-icons">location_on</i>
                    <label for="eventname" class="label">Other:</label>
                    <input type="text" name="other" class="form-control">
                </div>
                <div class="form-group">
                    <label for="eventname" class="label">Event Description:</label>
                    <input type="textarea" name="des" class="form-control">
                </div>
                <input class="btn btn-lg btn-primary" type="submit" name="sub3" >
                <input class="btn btn-md btn-outline-primary" type="reset" id="reset" name="reset">
                <input class="btn btn-md btn-outline-primary" type="button" id="close" name="close" value="Close">
            </form>
        </div>
        <?php
        if (isset($_POST['sub3'])) {
            $eventname = $_POST['eventname'];
            $date = $_POST['date'];
            $time = $_POST['time'] . ":00";
            $dept = $_POST['dept'];
            $duration = $_POST['duration'];
            $venue = $_POST['venue'];
            $other = $_POST['other'];
            $des = $_POST['des'];
            $qu1 = "select * from events where eventname like '$eventname';";
            $r3 = mysqli_query($con, $qu1) or die("connection failed");
            $rc1 = mysqli_num_rows($r3);
            if ($rc1 >= 1) {
                echo '<div class="container">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
                Event already Registered :|
            </div>           
        </div>';
            } else {
                $qu17 = "select * from events where date like '$date' and time like '$time' and venue like '$venue';";
                $r22 = mysqli_query($con, $qu17) or die("error");
                $rc7 = mysqli_num_rows($r22);
                if ($rc7 >= 1) {
                    while ($row9 = mysqli_fetch_assoc($r22)) {
                        echo '<div class="container">
            <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
            <p>The venue has already been booked by ' . $row9['dept'] . ' department on ' . $row9['date'] . ' for ' . $row9['duration'] . ' hours please check the booked venue on that date by clicking Show Booking<i class="material-icons">arrow_downward</i></p>
                
            </div>           
                </div>'?><div class="alert alert-primary alert-dismissable">
                    <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button><button type="button" class="btn btn-primary cen" data-toggle="modal" data-target="#myModal">Show Bookings</button></div>
                  <?php  }
                } else {
                    $qu2 = "insert into events(eventname,date,time,duration,venue,dept,status,description)values('$eventname','$date','$time','$duration','$venue','$dept','pending','$des');";
                    $r4 = mysqli_query($con, $qu2) or die("details not saved");
                    echo '<div class="container">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
                <p>Event Registered successfully wait and check the status:)</p>
            </div>           
                </div>';
                }
            }
        }
        ?>
        
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Events booked on the same day and venue</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="con table table-bordered table-hover text-center table-info">
                            <thead>
                                <tr>
                                    <th>Eventname</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                </tr>
                                <tr>
                                    <?php 
                                    $qu18 = "select * from events where date like '$date' and venue like '$venue';";
                                    $rc23 = mysqli_query($con, $qu18);
                                    while($row10 = mysqli_fetch_assoc($rc23)){?>
                                    <td><?php echo $row10['eventname'] ?></td>
                                    <td><?php echo $row10['date'] ?></td>
                                    <td><?php echo $row10['time'] ?></td>
                                    <td><?php echo $row10['venue'] ?></td>
                                   <?php } ?>
                                </tr>
                                    
                            </thead>
                        </table>
                    </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



    </div>
</body>
</html>
