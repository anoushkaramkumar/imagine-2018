<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dupk3ebhq/image/upload/v1580966069/imagine/favicon_glhvjd.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/nav_v5.css">
    <link type="text/css" href="../css/account_v3.css" rel="stylesheet" />
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
                <li><a href="/workshops"><span>Workshops</span></a></li>
                <li><a href="/#speakers"><span>Speakers</span></a></li>
                <li><a href="/#faq"><span>FAQs</span></a></li>
                <li><a href="/#sponsors"><span>Sponsors</span></a></li>
                <li><a  href="/application"><span>Application</span></a></li>
                <li><a href="/history"><span>History</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>

    <div id="particles-js"  class="wrapper">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>REGISTER</h2>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <input placeholder="Name" type="text" name="name"class="form-control" value="<?php echo $name; ?>">
                <div class="help-block"><?php echo $name_err; ?></div>
            </div>  
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input placeholder="Email" type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <div class="help-block"><?php echo $email_err; ?></div>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input placeholder="Password" type="password" name="password" class="form-control" value="">
                <div class="help-block"><?php echo $password_err; ?></div>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input placeholder="Confirm Password" type="password" name="confirm_password" class="form-control" value="">
                <div class="help-block"><?php echo $confirm_password_err; ?></div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            
            <div class="email-msg"><a style="color:white;" href = "/login">Already have an account?</a></div>
            <div class="email-msg"><?php echo $confirm_msg; ?></div>
            <div class="email-msg"><?php echo $error_msg; ?></div>
        </form>

        <div id="container">
            <section class = "animated fadeIn" id="wrapper">
                <div class="planets planet1" data-speed="0.03"></div>
                <div class="planets planet2" data-speed="0.03"></div>
                <div class="planets planet3" data-speed="0.03"></div>

                <!-- <div class="comets comet1" data-speed="0.02"></div> -->
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