<?php
// Include config file
require_once '../db.php';
include_once '../registration/inc/php/functions.php';

// Define variables and initialize with empty values
$email = $password = "";
$message = $email_err = $password_err = "";

session_start();
if (isset($_SESSION['id'])) {
    header("location: ../application");
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Email not valid. Please enter valid email.";
    } else {
        $query = sprintf("SELECT id FROM users WHERE email = '%s'",
        mysqli_real_escape_string($con, trim($_POST["email"])));
        $result = mysqli_query($con, $query);
        
       if(mysqli_num_rows($result) == 0) {
            $email_err = "This email is not in our database.";
        } else {
            $email = trim($_POST["email"]);
        }
    }

    // Validate credentials
    if(empty($email_err)){
        $password = rand(999999, 9999999);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = ? WHERE email = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_email);
            
            $param_password = $password_hash;
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){ 
                include_once '../registration/inc/php/swift/swift_required.php';
                $info = array(
                    'name' => $_SESSION['name'],
                    'email' => $email,
                    'password' => $password);

                if(send_password($info)) {
                    $message = "Email sent. You will get a new password to reset after logging in.";
                } else{
                    $message = "Could not send email.";
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }
    
    // Close connection
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v5.css">
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/account_v3.css" rel="stylesheet" />
</head>
<body>
    <header>
        <nav class="cd-stretchy-nav">
            <a class="cd-nav-trigger" href="#0">
                Menu
                <span aria-hidden="true"></span>
            </a>

            <ul>
                <li><a href="/#home"><span></span></a></li>
                <li><a href="/#about"><span>About</span></a></li>
                <li><a href="/#event-info"><span>Event info</span></a></li>
                <li><a href="/#schedule"><span>Schedule</span></a></li>
                <li><a href="/#workshops"><span>Workshops</span></a></li>
                <li><a href="/#speakers"><span>Speakers</span></a></li>
                <li><a href="/#faq"><span>FAQs</span></a></li>
                <li><a href="/#sponsors"><span>Sponsors</span></a></li>
                <li><a  href="/application"><span>Application</span></a></li>
                <li><a href="/history"><span>History</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>

    <div id="particles-js" class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h2>FORGOT PASSWORD</h2>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input placeholder = "Email" type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <div class="help-block"><?php echo $email_err; ?></div>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send Email">
            </div>
            <div class="email-msg"><?php echo $message; ?></div>
        </form>
        <div id="container">
            <section class = "animated fadeIn" id="wrapper">
                <div class="planets planet1" data-speed="0.03"></div>
                <div class="planets planet2" data-speed="0.03"></div>
                <div class="planets planet3" data-speed="0.03"></div>

                <div class="comets comet2" data-speed="0.02"></div>
                <div class="comets comet4" data-speed="0.02"></div>
            </section>
        </div>
    </div>    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script type="text/javascript" src="../nav.js"></script>
    <script src="../particles.js"></script>
    <script src="../app.js"></script>  
</body>
</html>