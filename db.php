<?php

$dbhost = "imagine.c9rfqj65zlhy.us-east-1.rds.amazonaws.com:3306";
$dbname = "innodb";

$username = 'imagine';
$password = 'tomatoSoup5102!';

$con = mysqli_connect($dbhost, $username,  $password) or die("Error connecting to database.");
mysqli_select_db($con, $dbname) or die("I couldn't find the database table ($dbname).");
?>