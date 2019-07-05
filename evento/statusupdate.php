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
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>status update</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link href='https://fonts.googleapis.com/css?family=Unica One' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="evento.css">
        <style>
            td{
                color: white;
            }

        </style>
    </head>
    <?php
    include 'admin.php';
    ?>
    <body>
        <?php
        if (isset($_REQUEST["statsub"])) {
            $stat = $_REQUEST["status"];
            $b = implode($stat);
            $qur2 = "update events set status='approved' where eventname in('$b');";
            $rc6 = mysqli_query($con, $qur2) or die("error in update query");
        }
        ?>
        <?php
        $qur1 = "select * from events;";
        $r9 = mysqli_query($con, $qur1) or die("error selecting table");
        $rc5 = mysqli_num_rows($r9);
        ?>
        <div class="container col-8 float-right">
            <h2 class="text-center">Update the status</h2><form method="post">
                <table class="con table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Event name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Venue</th>
                            <th>Department</th>
                            <th>Status update</th>
                            <th>Event Current status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($r9)) {
                            ?>
                            <tr>
                                <td><?php echo $row['eventname'];?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['venue']; ?></td>
                                <td><?php echo $row['dept']; ?></td>
                                <td><input type="checkbox" name="status[]" value="<?php echo $row['eventname']; ?>">Approve ?</td>
                                <td><?php echo $row['status']; ?></td>                            
                            </tr> 
                            <?php
                        }
                        ?>
                        <tr>                       
                            <td colspan="8"><input class="btn btn-outline" type="submit" name="statsub" value="Update"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
