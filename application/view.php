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
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v4.css">
    <link type="text/css" href="../css/app.css" rel="stylesheet" />
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
                <li><a href="/#workshops"><span>Workshops</span></a></li>
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
    	<div class = "top">
    		<h1 class = "pagetitle gi">GENERAL INFO</h1>
    		<h1 class = "pagetitle a">APPLICATION</h1>
	    	<h2>IMAGINE 2018</h2><img src = "../assets/planet1.png">
	    </div>

	    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	    <div class = "progress">
	    	<div class="inner">
		    	<svg class="progress__cir" width="120" height="120" viewBox="0 0 120 120">
					<circle transform="rotate(-90 60 60)" class="progress__meter" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0"/>
					<circle transform="rotate(-90 60 60)" class="progress__value1" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0" />
					<text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">1</text>    
				</svg>
		    	<p>General Info</p>

		    	<svg class="progress__cir" width="120" height="120" viewBox="0 0 120 120">
					<circle transform="rotate(-90 60 60)" class="progress__meter" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0"/>
					<circle transform="rotate(-90 60 60)" class="progress__value2" cx="60" cy="60" r="54" stroke-width="12" stroke-dashoffset="0" />
					<text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">2</text>    
				</svg>
		    	<p>Application</p>

		    	<a href = "settings.php">Settings</a>
		    	<a href = "../login/logout.php">Logout</a>
<!-- 		    	<input type="submit" name = "submit" value="Submit">
 -->	    	</div>
	    </div>
	    


	    <div class = "form">
		    
			    <div class = "general-info">
			    	<br><label>Age *</label><br>
			    	<input class="req <?php echo (strlen($age) > 0)?'counted':'' ?>" type="text" name="age" value = "<?php echo $age;?>">
			    	
			    	<br><label>T-Shirt Size *</label><br>
			    	<ul class="radio-list1 <?php echo (strlen($tshirt) > 0)?'checked':'' ?>">
					    <li>
					        <label for="XS" <?php echo ($tshirt=='XS')?'class="checked"':'' ?>>
					            <input class="reqradio" type="radio" <?php echo ($tshirt=='XS')?'checked':'' ?> id="XS" value="XS" name="tshirt">XS</label>
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
			    	<input class="req <?php echo (strlen($school) > 0)?'counted':'' ?>" type="text" name="school" value = "<?php echo $school;?>">

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
					    <li>
					        <label for="rns" <?php echo ($gender=='rns')?'class="checked"':'' ?>>
					            <input type="radio" <?php echo ($gender=='rns')?'checked':'' ?> id="rns" value="rns" name="gender">RNS</label>
					    </li>
					</ul>
					<br><br>
					<br><label>Dietary Restrictions</label><br>
			    	<input type="text" name="diet" value = "<?php echo $diet;?>">

			    	<br><label>Parent/Guardian Name *</label><br>
			    	<input class="req <?php echo (strlen($parent_name) > 0)?'counted':'' ?>" type="text" name="parent_name" value = "<?php echo $parent_name;?>">

			    	<br><label>Parent/Guardian Email *</label><br>
			    	<input class="req <?php echo (strlen($parent_email) > 0)?'counted':'' ?>" type="email" name="parent_email" value = "<?php echo $parent_email;?>">
			   	 <br><a class = "gi2a">Step 2: Application</a><input class="save" type="submit" name = "submit" value="Save">
			    </div>

			    <div class = "application">
			    	<br><label>Are you a beginner in computer science? If not, tell us about some of the stuff you’ve done.</label><br>
			    	<textarea class="req <?php echo (strlen($ques1) > 0)?'counted':'' ?>" name="ques1"><?php echo $ques1;?></textarea>

			    	<br><label>Any links (e.g. Github, Personal Website, LinkedIn)?</label><br>
			    	<textarea class="req <?php echo (strlen($ques2) > 0)?'counted':'' ?>" name="ques2"><?php echo $ques2;?></textarea>

			    	<br><label>What are your three main interests in the CS field?</label><br>
			    	<textarea class="req <?php echo (strlen($ques3) > 0)?'counted':'' ?>" name="ques3"><?php echo $ques3;?></textarea>

			    	<br><label>Have you been to hackathons/technology events in the past? If so, which ones?</label><br>
			    	<textarea class="req <?php echo (strlen($ques4) > 0)?'counted':'' ?>" name="ques4"><?php echo $ques4;?></textarea>
			    	<br><a class = "a2gi">Step 1: General Info</a><input class="save" type="submit" name = "submit" value="Save">

			    </div>
			    
			</form>
		</div>

		<div style="clear: both;"></div>
    </div>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../nav.js"></script>
	<script type="text/javascript">
		var RADIUS = 54;
		var CIRCUMFERENCE = 2  * Math.PI  * RADIUS;

		var dashoffset = 0;

		function progress(value, num) {
			var progress = value / 100;
			var i = dashoffset;
			dashoffset = CIRCUMFERENCE  * (progress);

			myLoop(i, dashoffset, num);

		   	progressValue = document.querySelector('.progress__value' + num);
			progressValue.style.strokeDasharray = CIRCUMFERENCE;
		}

		function myLoop (i, dashoffset, num) {           
		   setTimeout(function () {   
		   	  progressValue = document.querySelector('.progress__value' + num);
		      progressValue.style.strokeDashoffset = CIRCUMFERENCE - i;
		      i++;
		      if (i <= dashoffset) {
		         myLoop(i, dashoffset, num);
		      } 
		   }, 7)
		}
		 
		var percent1 = <?php echo $percent1; ?>;
		var percent2 = <?php echo $percent2; ?>;

		progress(percent2, 2);
		progress(percent1, 1);

		$('.radio-list1 :radio').on('change', function () {
			$(".radio-list1 label").removeClass("checked");
		    $(this).parent().addClass("checked");
		});

		$('.radio-list2 :radio').on('change', function () {
			$(".radio-list2 label").removeClass("checked");
		    $(this).parent().addClass("checked");
		});

		$( ".gi2a" ).click(function() {
			$(".pagetitle.a").show();
			$(".application").show();
			$(".pagetitle.gi").hide();
			$(".general-info").hide();
		});

		$( ".a2gi" ).click(function() {
			$(".pagetitle.a").hide();
			$(".application").hide();
			$(".pagetitle.gi").show();
			$(".general-info").show();
		});

		$( ".general-info .req" ).change(function() { 
			var value = $(this).val();
			if (value.length > 0 && !$(this).hasClass("counted")) {
				percent1 += 14.2857143;
				progress(percent1, 1);
				$(this).addClass("counted");
			} else if (value.length == 0 && $(this).hasClass("counted")) {
				percent1 -= 14.2857143;
				progress(percent1, 1);
				progress(percent1, 1);
				$(this).removeClass("counted");	
			}
		});

		$( ".general-info .reqradio" ).change(function() { 
			var value = $(this).val();
			if (value.length > 0 && !$(".radio-list1").hasClass("checked")) {
				percent1 += 14.2857143;
				progress(percent1, 1);
				$(this).addClass("counted");
				$(".radio-list1").addClass("checked");
			}
		});

		$( ".application .req" ).change(function() { 
			var value = $(this).val();
			if (value.length > 0 && !$(this).hasClass("counted")) {
				console.log("nuni");
				percent2 += 25;
				progress(percent2, 2);
				$(this).addClass("counted");
			} else if (value.length == 0 && $(this).hasClass("counted")) {
				percent2 -= 25;
				progress(percent2, 2);
				progress(percent2, 2);
				$(this).removeClass("counted");	
			}
		});
	</script>

</body>

</html>