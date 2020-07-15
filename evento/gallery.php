
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet'>
        <link rel="stylesheet" href="evento.css">
        <style>
            .gall{
                background-color: #0066ff !important;
            }
            #galimg{
                background-color: rosybrown
            }
            .gal{
                position: relative;
                top: 100px;
                left: 5%;
            }
            .frm1{
                width: 50%;
                position: relative;
                left: 5%;
                margin-top: 10%;
            }
            p{
                font-family: monospace;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <?php
        include 'normal.php';
        $qu10 = "select * from album;";
        $r15 = mysqli_query($con, $qu10)or die("error in query");
        ?>
        <div class="container gal">
            <h2>Event gallery</h2>
            <?php
            $i = 0;
            while ($row4 = mysqli_fetch_assoc($r15)) {
                if ($i % 3 == 0) {
                    echo '<div class="row">';
                }
                ?>
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $row4['albumname']."/".$row4['cover']; ?>" alt="Card image" height="250px" style="width:100%">
                    <div class="card-body">
                        <h3 class="card-title"><?php $disp = $row4['albumname'];
                echo $disp;
                $_SESSION['disp'] = $disp; ?></h3>
                        <p class="card-text"><?php echo $row4['adesc']; ?></p>
                        <form action="display.php">
                            <button class="btn btn-primary">More photos</button> 
                        </form>
                    </div>
                </div>  
            </div>
                
                <?php
                if ($i % 3 == 2) {
                    echo '</div>';
                }
                $i++;
            }
            if (isset($_SESSION['uname'])) {
                ?>


            </div>
            <div class="container frm1">
                <h2>Upload the photos</h2>
                <form class="container" method="post" action="gallery.php" enctype="multipart/form-data">
                    <div class="from-group">
                        <label for="evntimg" class="label">Event:</label>
                        <input type="text" class="form-control" id="evntimg" required placeholder="Enter the event name" name="ename">    
                    </div>
                    <div class="from-group">
                        <label for="desc" class="label">Event Description:</label>
                        <input type="text" class="form-control" id="desc" placeholder="Enter event description" name="desc">    
                    </div>
                    <div class="from-group">
                        <label for="img" class="label">Upload image folder:</label>
                        <input type="file" class="form-control" id="img" required placeholder="upload image" accept="image/*" name="images[]" multiple directory="" webkitdirectory="">    
                    </div>
                    <div>
                        <label for="cover" class="label">Cover image:</label>
                        <input type="file" class="from-control" id="cover" placeholder="j" accept="image/*" name="cover">
                    </div>
                    <input type="submit" class="btn btn-info" value="Upload" name="upload">  
                </form>
            </div>
            <?php
            if (isset($_POST['upload'])) {
                $ename = $_POST['ename'];
                $desc = $_POST['desc'];
                $file = $_FILES['images'];
                $cover = $_FILES['cover'];
                $covername = $_FILES['cover']['name'];
                if ($ename != "") {
                    if (!is_dir($ename)) {
                        mkdir($ename);
                    } else {
                        echo '<div class="container">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
                <p>Directory already exists</p>
            </div>           
                </div>';
                        exit();
                    }
                    foreach ($_FILES['images']['name'] as $key => $name) {
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], $ename . '/' . $name);
                    }
                    echo '<div class="container">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" style="color:red" data-dismiss="alert">&times;</button>
                <p>successfully images are uploaded</p>
            </div>           
                </div>';
                } else {
                    echo "xxxxxx";
                }
                $qu10 = "insert into album(albumname,adesc,cover) values('$ename','$desc','$covername');";
                $r15 = mysqli_query($con, $qu10) or die("insert into db error");
                $dirpath = $ename . "/";
                if (is_dir($dirpath)) {
                    $files = scandir($dirpath);
                    for ($i = 2; $i < count($files); $i++) {
                        $values = $files[$i];
                        $qu11 = "insert into gallery(albumname,imgtitle) values('$ename','$values');";
                        $r16 = mysqli_query($con, $qu11) or die("insert into db error");
                    }
                }
            }
        }
        ?>
    </body>
</html>
