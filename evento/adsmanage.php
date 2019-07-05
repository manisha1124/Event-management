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
            thumbnail{
                height: 100px;
                width: 100px;
            }
            td{
                color: white;
            }
        </style>
    </head>
    <?php
    require 'connect.php';
    $qur4 = "delete poster from poster inner join events on events.eventname=poster.eventname where date < curdate();";
    mysqli_query($con, $qur4) or die("error date query");
    ?>
    <body>
        <?php
        include 'admin.php';
        if (isset($_POST["upd"])) {
            $del = $_POST["del"];
            $a = implode($del);
            $qu8 = "select image from poster where eventname in('$a');";
            $r13 = mysqli_query($con, $qu8) or die("error del query");
            while ($row3 = mysqli_fetch_assoc($r13)) {
                unlink("poster/" .$row3['image']);
            }
            $querydel = "delete from poster where eventname in('$a');";
            $r10 = mysqli_query($con, $querydel) or die("error del query");
        }
        $qur4 = "SELECT *
FROM events
INNER JOIN poster ON events.eventname = poster.eventname;";
        $r12 = mysqli_query($con, $qur4) or die("error selecting table");
        ?>
        <div class="container col-8 float-right">
            <h2 class="text-center">poster</h2><form method="post">
                <table class="con table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Event name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Venue</th>
                            <th>Department</th>
                            <th>Event status</th>
                            <th>poster</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($r12)) {
                            ?>
                            <tr class="text-centered">
                                <td><?php echo $row['eventname']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['venue']; ?></td>
                                <td><?php echo $row['dept']; ?></td>
                                <td><?php echo $row['status']; ?></td> 
                                <td><img class="image-fluid thumbnail" src="poster/<?php echo $row['image']; ?>" height="300" width="300"></td>
                                <td><input type="checkbox" name="del[]" value="<?php echo $row['eventname']; ?>">Delete ?</td>
                            </tr> 
                            <?php
                        }
                        ?>
                        <tr>                       
                            <td colspan="9"><input class="btn btn-outline" type="submit" name="upd" value="Update"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
