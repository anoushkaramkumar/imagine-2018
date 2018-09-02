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
$password = $confirm_password = $name = "";
$success = $name_err = $email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
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
    
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    } 
    

    if(empty(trim($_POST['password']))){
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } elseif(strlen(trim($_POST['password2'])) != strlen(trim($_POST['password']))){
        $password_err = "Please confirm your password.";
    } else {
        $password = trim($_POST['password']);
    }
    
    if(empty($email_err) && empty($password_err) && empty($name_err)){
        if(empty(trim($password))) {
            $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";

            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_uid);
                
                $param_name = $name;
                $param_email = $email;
                $param_uid = $_SESSION['id'];

                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                
                if(mysqli_stmt_execute($stmt)){ 
                    $success = "Your changes have been updated.";
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
        } else {
            $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";

            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_password, $param_uid);
                
                $param_name = $name;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT); 
                $param_uid = $_SESSION['id'];
                
                if(mysqli_stmt_execute($stmt)){ 
                    $success = "Your changes have been updated.";
                } else{
                    echo "Something went wrong. Please try again later.";
                }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>ACCOUNT SETTINGS</h2>
            <p></p>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <input placeholder = "Name" type="text" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>">
                <div class="help-block"><?php echo $name_err; ?></div>
            </div> 
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input placeholder = "Email" type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                <div class="help-block"><?php echo $email_err; ?></div>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input placeholder = "Change Password"  type="password" name="password" class="form-control">
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input placeholder = "Confirm Password"  type="password" name="password2" class="form-control">
                <div class="help-block"><?php echo $password_err; ?></div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
            <div class="email-msg"><?php echo $success; ?></div>
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
    <!-- <script src="../app.js"></script>   -->
</body>
</html>