<?php

require_once '../db.php';
include_once 'inc/php/functions.php';

?>


<?php

//setup some variables
$action = array();
$action['result'] = null;

//check if the $_GET variables are present
	
//quick/simple validation
if(empty($_GET['email']) || empty($_GET['key'])){
	$action['result'] = 'error';
	$action['text'] = 'We are missing variables. Please double check your email.';			
}
		
if($action['result'] != 'error'){

	//cleanup the variables
	$email = mysqli_real_escape_string($con, $_GET['email']);
	$key = mysqli_real_escape_string($con, $_GET['key']);
	
	//check if the key is in the database
	$check_key = mysqli_query($con, "SELECT c.id, c.userid, u.name, c.email FROM confirm c, users u WHERE c.email = '$email' AND `key` = '$key' AND c.userid = u.id LIMIT 1") or die(mysqli_error());
	
	if(mysqli_num_rows($check_key) != 0){
				
		//get the confirm info
		$confirm_info = mysqli_fetch_assoc($check_key);
		

		//confirm the email and update the users database
		$update_users = mysqli_query($con, "UPDATE `users` SET `active` = 1 WHERE `id` = '$confirm_info[userid]' LIMIT 1") or die(mysqli_error());
		// create application
		$update_users = mysqli_query($con, "INSERT INTO application (email, id, name) VALUES('$email','$confirm_info[userid]', '$confirm_info[name]')") or die(mysqli_error());
		//delete the confirm row
		$delete = mysqli_query($con, "DELETE FROM `confirm` WHERE `id` = '$confirm_info[id]' LIMIT 1") or die(mysqli_error());
		
		if($update_users){
			header("location: ../login/index.php");
		}else{
			$message = 'The user could not be updated Reason: '.mysqli_error();;
		
		}
	
	}else{
		$message = 'Your key or email is not in our database. Please re-register.';
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link type="text/css" href="../css/lightmodal.min.css" rel="stylesheet" />
    <link type="text/css" href="../css/account_v3.css" rel="stylesheet" />
</head>
<body>
    <div id="particles-js" class="wrapper">
        <div class="page-header">
            <h1>
            	<?php echo $message; ?>
            </h1>
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
               
                
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="../particles.js"></script>
    <script src="../app.js"></script>  
</body>
</html> 