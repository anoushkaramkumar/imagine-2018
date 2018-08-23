<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: index.php");
  exit;
}

require_once '../db.php';
 
$email = $_SESSION['email']; 
$_SESSION['password_err'] = $password = $confirm_password = $name = "";
$_SESSION['email_err'] = $name_err = $email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Email not valid.';
    } else if (trim($_POST["email"]) != $_SESSION['email']) {
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    } 
    
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    if(empty($email_err) && empty($password_err) && empty($name_err)){
        
        $sql = "UPDATE users SET email = ?, password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_password, $param_uid);
            
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_uid = $_SESSION['id'];
            
            if(mysqli_stmt_execute($stmt)){ 
                $_SESSION['email'] = $email;
                $_SESSION['password_err'] = $password_err;
                $_SESSION['email_err'] = $email_err;
                header("location: welcome.php#settings");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    } 
    
    mysqli_close($con);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/lightmodal.min.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v4.css">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
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
                <li><a href="/"><span></span></a></li>
                <li><a href="/#about"><span>About</span></a></li>
                <li><a href="/#event-info"><span>Event info</span></a></li>
                <li style="display: none;"><a class="navigation__link" href="#schedule"><span>Schedule</span></a></li>
                <li><a href="/#speakers"><span>Speakers</span></a></li>
                <li><a href="/#faq"><span>FAQs</span></a></li>
                <li><a href="/#sponsors"><span>Sponsors</span></a></li>
                <li><a style="display: none;" href="/registration"><span>Register</span></a></li>
                <li><a href="logout.php"><span>Logout</span></a></li>
                <li style="display: none;"><a href="/workshops"><span>Workshops</span></a></li>
                <li><a href="/history"><span>History</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>

    <div id="particles-js" class="wrapper">
        <div class="page-header">
            <h1>Hello, <b><?php echo explode(" ", htmlspecialchars($_SESSION['name']))[0]; ?></b>! The application has not yet opened; we’ll let you know when it does.</h1>
            <p>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                <a href="#settings"><i class="fas fa-cog"></i></a>
            </p>
        </div>
        

        <div id="container">
            <section class = "animated fadeIn" id="wrapper">
                <div class="planets planet1" data-speed="0.005"></div>
                <div class="planets planet2" data-speed="0.01"></div>
                <div class="planets planet3" data-speed="0.03"></div>

                <div class="comets comet2" data-speed="0.06"></div>
                <div class="comets comet4" data-speed="0.02"></div>
            </section>
        </div>

        <div aria-hidden="false" aria-labelledby="light-modal-label" class="light-modal" id="settings" role="dialog">
        <div class="light-modal-content animated fadeIn">
            <div class="light-modal-header">
                <h3 class="light-modal-heading">ACCOUNT DETAILS</h3>
            </div>
            <div class="light-modal-body">
                <form action="#settings" method="post">
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <input placeholder = "Email" type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                        <div class="help-block"><?php echo $email_err; ?></div>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input placeholder = "Password"  type="password" name="password" class="form-control" value="<?php echo $_SESSION['password']; ?>">
                        <div class="help-block"><?php echo $password_err; ?></div>
                    </div>
                    <div style="text-align: center;margin-top: 20px;">
                        <input aria-label="close" type="submit" class="light-modal-close-icon" href="#" value="✓"></input>         
                        <button class="light-modal-close-icon" type="button" onClick="window.location.href='/login/welcome.php';"><i class="fas fa-times"></i></button>
                    </div>
                </form>                
                
            </div>
        </div>
    </div>
    </div>    

    <style type="text/css">
        .cd-stretchy-nav ul li:nth-of-type(9) a::after {
          content: "\f08b";  
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../nav.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="../particles.js"></script>
    <script src="../app.js"></script>  
</body>
</html> 