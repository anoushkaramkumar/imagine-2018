<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:url" content="https://imagine.hackbca.com" />
    <meta property="og:title" content="Imagine 2018" />
    <meta property="og:image" content="https://imagine.hackbca.com/assets/banner.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Imagine 2018 Workshops</title>
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/imagine-2018/assets/favicon.ico">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v4.css">
    <link type="text/css" href="../css/workshops.css" rel="stylesheet" />
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
                <li><a class="active" href="#home"><span></span></a></li>
                <li><a href="#about"><span>About</span></a></li>
                <li><a href="#event-info"><span>Event info</span></a></li>
                <li><a href="#schedule"><span>Schedule</span></a></li>
                <li><a href="#workshops"><span>Workshops</span></a></li>
                <li><a href="#speakers"><span>Speakers</span></a></li>
                <li><a href="#faq"><span>FAQs</span></a></li>
                <li><a href="#sponsors"><span>Sponsors</span></a></li>
                <li><a  href="/application"><span>Application</span></a></li>
                <li><a href="/history"><span>History</span></a></li>
            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>
    </header>

    <div class = "schedule">
        <h3>SCHEDULE</h3>
        <div class = "blocks">
            <div class = "b left">
                <h4>DAY ONE</h4>
                <h5>SAT 29</h5>
                <div class="times">
                    <span><b>8AM</b>  Check In</span>
                    <span><b>9AM</b>  Opening Ceremony, Keynote: Eliot Horowitz</span>
                    <span><b>10AM - 5PM</b>  Workshops/Talks/Activities</span>
                    <span><b>12PM - 2PM</b>  Lunch (Staggered)</span>
                    <span><b>5PM - 7PM</b>  Activities</span>
                    <span><b>5PM - 7PM</b>  Dinner (Staggered)</span>
                    <span><b>7:15PM</b>  Closing Keynote: Michael Geraghty</span>
                </div>
            </div>
            <div class = "b right">
                <h4>DAY TWO</h4>
                <h5>SAT 30</h5>
                <div class="times">
                    <span><b>8AM</b>  Check In</span>
                    <span><b>9AM</b>  Opening Keynote: Anthony Johnson</span>
                    <span><b>10AM - 4PM</b>  Workshops/Talks/Activities</span>
                    <span><b>12PM - 2PM</b>  Lunch (Staggered)</span>
                    <span><b>4PM - 5PM</b>  Opening Ceremony, Keynote: Ruth Kedar</span>
                </div>
            </div>
            <div class="clear" style="clear: both;"></div>
        </div>
    </div>

    <div class = "workshops">
        <h3>WORKSHOPS</h3>
        
        <?php foreach ($workshops as $workshop) { ?>
            <div class="card">
                <h4><?php echo $workshop['title']; ?></h4>
                <span><i class="fas fa-tag"></i> <?php echo $workshop['tags']; ?></span>
                <div class="img-title">
                    <img src = "../assets/<?php echo $workshop['speaker_img']; ?>">
                    <span>
                        <p><?php echo $workshop['name']; ?></p>
                        <p><?php echo $workshop['speaker_title']; ?></p>
                    </span>
                </div>
                <div class="desc">
                    <?php echo $workshop['description']; ?> 
                </div>
            </div>
        <?php } ?>

        
    </div>
        
    <!-- <script type="text/javascript" src="../scroll.js"></script> -->
    <script type="text/javascript" src="../nav.js"></script>

</body>

</html>