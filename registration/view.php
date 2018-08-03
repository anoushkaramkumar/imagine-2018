<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/account_v2.css" rel="stylesheet" />
</head>
<body>
    <div id="particles-js"  class="wrapper">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class = "home"><a href="/"><i class="fas fa-long-arrow-alt-left"></i></a></div>
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
    <script src="../particles.js"></script>
    <script src="../app.js"></script>  
</body>
</html>