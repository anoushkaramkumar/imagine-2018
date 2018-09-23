<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:url" content="https://imagine.hackbca.com" />
    <meta property="og:title" content="Imagine 2018" />
    <meta property="og:image" content="https://imagine.hackbca.com/assets/banner.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Imagine 2018 Application</title>
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.1/particles.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/ogv1wzn.css">
    <link rel="stylesheet" type="text/css" href="../loading-bar.css"/>
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v5.css">
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/app_v3.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body class="page-section" >
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
                <li><a href="/#schedule"><span>Schedule</span></a></li>
                <li><a href="/workshops"><span>Workshops</span></a></li>
                <li><a href="/#speakers"><span>Speakers</span></a></li>
                <li><a href="/#faq"><span>FAQs</span></a></li>
                <li><a href="/#sponsors"><span>Sponsors</span></a></li>
                <li><a class="active" href="/application"><span>Application</span></a></li>
                <li><a href="/history"><span>History</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>
    
    <div class = "container">
    	<?php if ($submitted == 0) { ?>

    	<div class = "top">
    		<h1 class = "pagetitle gi">REGISTRATION</h1>
	    	<h2>IMAGINE 2018</h2><img src = "../assets/planet1.png">
	    </div>

	    
	    <div class = "progress">
	    	<div class="inner">
		    	<svg class="progress__cir" width="120" height="120" viewBox="0 0 120 120">
					<circle transform="rotate(-90 60 60)" class="progress__meter" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0"/>
					<circle transform="rotate(-90 60 60)" class="progress__value1" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0" />
					<text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">%</text>    
				</svg>
		    	<p>Registration</p>
<!-- 
		    	<svg class="progress__cir" width="120" height="120" viewBox="0 0 120 120">
					<circle transform="rotate(-90 60 60)" class="progress__meter" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0"/>
					<circle transform="rotate(-90 60 60)" class="progress__value2" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0" />
					<text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">2</text>    
				</svg>
		    	<p>Application</p> -->

		    	<a href = "settings.php">Settings</a>
		    	<a href = "../login/logout.php">Logout</a>
<!-- 		    	<input type="submit" name = "submit" value="Submit">
 -->	    	</div>
	    </div>
	    
	    
		    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		    	<div class = "form">
			    	<div class="general-info">
				    	<br><label>Age *</label><br>
				    	<input class="req <?php echo (strlen($age) > 0)?'counted':'' ?>" type="text" name="age" value = "<?php echo $age;?>" required>
				    	
				    	<br><label>T-Shirt Size *</label><br>
				    	<ul class="radio-list1 <?php echo (strlen($tshirt) > 0)?'checked':'' ?>">
						    <li>
						        <label for="XS" <?php echo ($tshirt=='XS')?'class="checked"':'' ?>>
						            <input class="reqradio" type="radio" <?php echo ($tshirt=='XS')?'checked':'' ?> id="XS" value="XS" name="tshirt" required>XS</label>
						    </li>
						    <li>
						        <label for="S" <?php echo ($tshirt=='S')?'class="checked"':'' ?>>
						            <input class="reqradio" type="radio" <?php echo ($tshirt=='S')?'checked':'' ?> id="S" value="S" name="tshirt">S</label>
						    </li>
						    <li>
						        <label for="M" <?php echo ($tshirt=='M')?'class="checked"':'' ?>>
						            <input class="reqradio" type="radio" <?php echo ($tshirt=='M')?'checked':'' ?> id="M" value="M" name="tshirt">M</label>
						    </li>
						    <li>
						        <label for="L" <?php echo ($tshirt=='L')?'class="checked"':'' ?>>
						            <input class="reqradio" type="radio" <?php echo ($tshirt=='L')?'checked':'' ?> id="L" value="L" name="tshirt">L</label>
						    </li>
						    <li>
						        <label for="XL" <?php echo ($tshirt=='XL')?'class="checked"':'' ?>>
						            <input class="reqradio" type="radio" <?php echo ($tshirt=='XL')?'checked':'' ?> id="XL" value="XL" name="tshirt">XL</label>
						    </li>
						</ul>
						<br><br>

						<br><label>School *</label><br>
				    	<input class="req <?php echo (strlen($school) > 0)?'counted':'' ?>" type="text" name="school" value = "<?php echo $school;?>" required>

				    	<br><label>Gender</label><br>
				    	<ul class="radio-list2">
						    <li>
						        <label for="male" <?php echo ($gender=='male')?'class="checked"':'' ?>>
						            <input type="radio" <?php echo ($gender=='male')?'checked':'' ?> id="male" value="male" name="gender">Male</label>
						    </li>
						    <li>
						        <label for="female" <?php echo ($gender=='female')?'class="checked"':'' ?>>
						            <input type="radio" <?php echo ($gender=='female')?'checked':'' ?> id="female" value="female" name="gender">Female</label>
						    </li>
						    <li>
						        <label for="other" <?php echo ($gender=='other')?'class="checked"':'' ?>>
						            <input type="radio" <?php echo ($gender=='other')?'checked':'' ?> id="other" value="other" name="gender">Other</label>
						    </li>
						</ul>
						<br><br>
						<br><label>Dietary Restrictions</label><br>
				    	<input type="text" name="diet" value = "<?php echo $diet;?>" >

				    	<br><label>Parent/Guardian Name *</label><br>
				    	<input class="req <?php echo (strlen($parent_name) > 0)?'counted':'' ?>" type="text" name="parent_name" value = "<?php echo $parent_name;?>" required>

				    	<br><label>Parent/Guardian Email *</label><br>
				    	<input class="req <?php echo (strlen($parent_email) > 0)?'counted':'' ?>" type="email" name="parent_email" value = "<?php echo $parent_email;?>" required>
				    </div>

				    <!-- <div class="application">
				    	<br><label>Are you a beginner in computer science? If not, tell us about some of the stuff you’ve done.</label><br>
				    	<textarea class="req <?php echo (strlen($ques1) > 0)?'counted':'' ?>" name="ques1"><?php echo $ques1;?></textarea>

				    	<br><label>Any links (e.g. Github, Personal Website, LinkedIn)?</label><br>
				    	<textarea class="req <?php echo (strlen($ques2) > 0)?'counted':'' ?>" name="ques2"><?php echo $ques2;?></textarea>

				    	<br><label>What are your three main interests in the CS field?</label><br>
				    	<textarea class="req <?php echo (strlen($ques3) > 0)?'counted':'' ?>" name="ques3"><?php echo $ques3;?></textarea>

				    	<br><label>Have you been to hackathons/technology events in the past? If so, which ones?</label><br>
				    	<textarea class="req <?php echo (strlen($ques4) > 0)?'counted':'' ?>" name="ques4"><?php echo $ques4;?></textarea>
				    </div> -->
			    	
			    	<input class="save" type="submit" name = "submit" value="Submit">
			    </div>
				    
				</form>
				<div style="clear: both;"></div>
			</div>
			<script type="text/javascript">
				var RADIUS = 54;
				var CIRCUMFERENCE = 2  * Math.PI  * RADIUS;

				var dashoffset1 = 0;
				var dashoffset2 = 0;

				function progress1(value) {
					var progress = value / 100;
					var i = dashoffset1;
					dashoffset1 = CIRCUMFERENCE  * (progress);

					myLoop1(i, dashoffset1);

				   	progressValue = document.querySelector('.progress__value1');
					progressValue.style.strokeDasharray = CIRCUMFERENCE;
				}

				function myLoop1(i, dashoffset1) {           

				   setTimeout(function () {   
				   	  progressValue = document.querySelector('.progress__value1');
				      progressValue.style.strokeDashoffset = CIRCUMFERENCE - i;
				      i++;
				      if (i <= dashoffset1) {
				         myLoop1(i, dashoffset1);
				      } 
				   }, 7)
				}

				var percent1 = <?php echo $percent1; ?>;

				progress1(percent1);
				console.log(percent1);

				$('.radio-list1 :radio').on('change', function () {
					$(".radio-list1 label").removeClass("checked");
				    $(this).parent().addClass("checked");
				});

				$('.radio-list2 :radio').on('change', function () {
					$(".radio-list2 label").removeClass("checked");
				    $(this).parent().addClass("checked");
				});

				$( ".general-info .req" ).change(function() { 
					var value = $(this).val();
					if (value.length > 0 && !$(this).hasClass("counted")) {
						percent1 += 20;
						progress1(percent1);
						$(this).addClass("counted");
					} else if (value.length == 0 && $(this).hasClass("counted")) {
						percent1 -= 20;
						progress1(percent1);
						$(this).removeClass("counted");	
					}
				});

				$( ".general-info .reqradio" ).change(function() { 
					var value = $(this).val();
					if (value.length > 0 && !$(".radio-list1").hasClass("checked")) {
						percent1 += 20;
						progress1(percent1);
						$(this).addClass("counted");
						$(".radio-list1").addClass("checked");
					}
				});

			</script>

	    <?php } else if ($paid == 0) { ?>
	    	<div class = "top">
	    		<h1 class = "pagetitle gi">PAYMENT</h1>
		    	<h2>IMAGINE 2018</h2><img src = "../assets/planet1.png">

		    	<p>Please fill out the information below and create a Regpacks account in order to buy a ticket for Imagine. Regpacks is the payment registration software that we’re using: for more details, you can check out their privacy and security policies <a target = "_blank" style = "margin: 0; display: inline; background: none; color: white; padding: 0; font-size: inherit; font-weight: normal;" href ="https://www.regpacks.com">here</a>. If you have any concerns, please reach out to us at contact@hackbca.com. By the end of the day, you should receive an email saying that your ticket is confirmed once your payment is processed.<br><b>Use code imagine18 for the registration code.</b></p>

		    	<div id="regpack_iframe_container" style="background: #ffffffde;"><div id="regpack_noscript_div"><a href="https://www.regpacks.com/">Registration Software</a>| <a href="https://www.regpacks.com/solutions/payment-security/ ">Registration Software Payment Processing</a>| <a href="https://www.regpacks.com/solutions/">Registration tools</a>| <a href="https://www.regpacks.com/solutions/integrated-payments/">Online Payment Processing Software</a></div><script id="regpack_iframe" type="text/javascript" data-cfasync="false" src="https://www.regpacks.com/reg/regpack_iframe.js?gid=100900907"></script></div>

		    	<p><b>REFUND POLICY: </b>Tickets to Imagine 2018 are non-refundable. Please keep this in mind when buying one.</p>
		    </div>

			
	    <?php } else { ?>
	    <div class = "top">
	    	<h1 class = "pagetitle gi">CONFIRMED!</h1>
	    	<h2>IMAGINE 2018</h2><img src = "../assets/planet1.png">

	    	<h3>Woohoo! You're confirmed for Imagine 2018! We can't wait to see you there! <br>Keep on the lookout for an email to sign up for workshops.</h3>
	    	<img style="margin: auto; display: block; padding-top: 30px; width: 60%; min-width: 300px; max-width: 600px;" src="http://38.media.tumblr.com/99a798b0c09e3d59c3b43ab9c659fe8a/tumblr_nada10dAv71sg4xhqo1_500.gif"><br><br>
	    </div>
	    <?php } ?>

		
    </div>
    

	<script type="text/javascript" src="../nav.js"></script>
	

</body>

</html>