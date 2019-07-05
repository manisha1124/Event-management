<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>gallery update</title>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Amita'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            td{
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
        include 'admin.php';
        if (isset($_REQUEST["up"])) {
            $up = $_REQUEST["delete"];
            $b = implode($up);
            $qu14 = "select * from gallery where imgtitle in('$b');";
            $r19 = mysqli_query($con, $qu14) or die("error del query");
            while ($row3 = mysqli_fetch_assoc($r19)) {
                unlink($row3['alumnname']."/".$row3['imgtitle']);
            }
            $qur2 = "delete from gallery where imgtitle in('$b')";
            $rc6 = mysqli_query($con, $qur2) or die("error in update query");
        }
        $qu13 = "select * from gallery;";
        $r18 = mysqli_query($con, $qu13) or die("error in selecting");
        ?>
        <div class="container col-8 float-right">
            <h2 class="text-center">Update the Gallery</h2><form method="post">
                <table class="con table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Album Name</th>
                            <th>Image title</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row6 = mysqli_fetch_assoc($r18)) {
                            ?>
                            <tr>
                                <td><?php echo $row6['albumname'];?></td>
                                <td><?php echo $row6['imgtitle']; ?></td>
                                <td><img class="img-fluid" src="<?php echo $row6['albumname']."/".$row6['imgtitle']; ?>" height="150px" width="150px"></td>
                                <td><input type="checkbox" name="delete[]" value="<?php echo $row6['imgtitle']; ?>">Delete photo?</td>                           
                            </tr> 
                            <?php
                        }
                        ?>
                        <tr>                       
                            <td colspan="8"><input class="btn btn-outline" type="submit" name="up" value="Update"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    </body>
</html>
