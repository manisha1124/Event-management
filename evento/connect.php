<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>connect</title>
    </head>
    <body><?php
        $host="localhost";
        $pwd="";
        $user="root";
        $con= mysqli_connect($host, $user, $pwd);
        $db="evnto";
        mysqli_select_db($con, $db) or die("database connectivity problem");
        ?></body>
</html>
