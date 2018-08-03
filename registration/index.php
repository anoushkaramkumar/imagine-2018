<?php

require_once '../db.php';
include_once 'inc/php/functions.php';
 
$email = $password = $confirm_password = $name = "";
$form_display = $error_msg = $confirm_msg = $name_err = $email_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Email not valid. Please enter valid email.";
    } else {
        $query = sprintf("SELECT id FROM users WHERE email = '%s'",
        mysqli_real_escape_string($con, trim($_POST["email"])));
        $result = mysqli_query($con, $query);
        
       if(mysqli_num_rows($result) == 1) {
            $email_err = "This email is already taken.";
        } else {
            $email = trim($_POST["email"]);
        }
    }
             
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

     if(empty(trim($_POST['name']))){
        $name_err = "Please enter your name.";     
    } else{
        $name = trim($_POST['name']);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Passwords did not match.';
        }
    }
    
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err)){
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $add = mysqli_query($con, "INSERT INTO users (email, password, name, active) VALUES('$email','$password','$name',0)");

        if ($add) {
            $userid = mysqli_insert_id($con);
            $key = $name . $email . date('mY');
            $key = md5($key);

            $confirm = mysqli_query($con, "INSERT INTO confirm VALUES(NULL,'$userid','$key','$email')");

            if ($confirm) {
                include_once 'inc/php/swift/swift_required.php';
                $info = array(
                    'name' => $name,
                    'email' => $email,
                    'key' => $key);

                if(send_email($info)) {
                    $confirm_msg = "Thanks for signing up. Please check your email for confirmation!";
                    $form_display = "form_hide";
                } else{
                    $confirm_msg = "Could not send confirmation email.";
                }

            } else {
                $error_msg = 'Confirm row was not added to the database. Reason: ' . mysqli_error($con);
            }
        } else {
            $error_msg = 'User could not be added to the database. Reason: ' . mysqli_error($con);
        }
    }
}

include("./view.php");
?>
 
