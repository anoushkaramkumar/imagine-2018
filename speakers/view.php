<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Imagine 2018</title>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.1/particles.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/ogv1wzn.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v4.css">
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/main_v3.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

    <div id="particles-js">
    	<div class = "info speakers">
    		<h3 class = "animated fadeIn">Interested in being a speaker?</h3>
    		<p class = "animated fadeIn ">Fill out the form below.</p>

        	<input id = "email" type="email" name = "email" class = "animated fadeIn" placeholder="Email"></input>
            <input id = "name" type="name" name = "name" class = "animated fadeIn" placeholder="Name"></input>
            <br>
            <button type="submit" class = "animated fadeIn" onClick = "addSpeaker()">
			    Submit
			</button>
            <p class="animated fadeIn error">Email not valid. Please re-enter a valid email.</p>
            <p class="animated fadeIn nameerror">Please enter your name.</p>

            <div class = "input-div">
                <input class = "animated fadeIn success" value = "Success! You'll hear from us soon!" readonly></input>
            </div>
    	</div>
	 	
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../nav.js"></script>
    <script src="../particles.js"></script>
    <script type="text/javascript">
        function addSpeaker() {
            $('.error').hide();
            $('.nameerror').hide();

            var email = document.getElementById('email').value;
            var name = document.getElementById('name').value;

            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (re.test(email) && name != "") {
                $.ajax({
                    url: 'index.php',
                    type: 'GET',
                    data: 'email=' + email + '&name=' + name,

                    success: function(result) {
                        $('#email').hide();
                        $('#name').hide();
                        $('.error').hide();
                        $('.nameerror').hide();
                        $('button').hide();
                        $('.success').show();
                    }
                });
            } else {
                if (name == "") {
                    $('.nameerror').show();
                }
                if (!re.test(email)) {
                    $('.error').show();
                }
            }  
        }
        
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '/assets/particlesjs-config.json', function() {
          console.log('callback - particles.js config loaded');
        });
    </script>

    <style>
        .speakers input {
            margin: 20px auto;
            border: 2px solid #c5c5d0;
            border-radius: 28px;
            background: 0 0;
            padding-left: 15px;
            height: 40px;
            width: 60%;
            display: block;
            font-family: 'Muli' ,sans-serif;
            font-size: 1.2em;
            color: #c5c5d0;
            transition: all .2s;
        }

        .info.speakers {
            width: 100%;
            text-align: center;
            left: 0;
            width: 100%;
            height: 28vh;
            position: absolute;
            top: 0;
            bottom: 0;
            text-align: center;
            margin: auto;
            z-index: 98;
        }

        div#particles-js {
            height: 100vh;
            padding-bottom: 0;
        }
    </style>
</body>

</html>