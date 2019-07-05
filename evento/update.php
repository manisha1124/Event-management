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
    <body><?php
    include 'admin.php';
    ?>
        <?php
        if (isset($_REQUEST["delete"])) {
            $del = $_REQUEST["del"];
            $a = implode($del);
            $querydel = "delete from events where eventname in('$a');";
            $r10=mysqli_query($con, $querydel) or die("error del query");
        }
        ?><?php
        $qur1 = "select * from events;";
        $r9 = mysqli_query($con, $qur1) or die("error selecting table");
        $rc4 = mysqli_num_rows($r9);
        ?>
        <div class="container-fluid col-8">
            <h2 class="text-center">Update Events</h2>
            <form>
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Event name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th><input type="submit" name="delete" value="Delete"></th>                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($r9)) {
                            ?>
                            <tr>
                                <td><?php echo $row['eventname']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['status']; ?></td> 
                                <td><input type="checkbox" name="del[]" value="<?php echo $row['eventname'];?>"></td>
                            </tr>                    
                        </tbody>
                    <?php }
                    ?>
                </table>
            </form>
        </div>
    </div>
    </body>
</html>
