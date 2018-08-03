<?php

include("../db.php");

if (isset($_GET['email']) && isset($_GET['name'])) {
    $email = $_GET['email'];
    $name = $_GET['name'];
    
    mysqli_query($con, "INSERT INTO speaker_interest (email, name)
              VALUES ('$email', '$name')");

    exit();
}

include("./view.php");

?>