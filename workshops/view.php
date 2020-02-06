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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="../css/modal_v3.css">
    <link rel="stylesheet" href="https://s3.amazonaws.com/imagine-2018/css/nav_v5.css">
    <link type="text/css" href="https://s3.amazonaws.com/imagine-2018/css/workshops.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/micromodal@0.3.2/dist/micromodal.min.js"></script>
    
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
                <li><a href="/#schedule"><span>Schedule</span></a></li>
                <li><a class="active" href="/#workshops"><span>Workshops</span></a></li>
                <li><a href="/#speakers"><span>Speakers</span></a></li>
                <li><a href="/#faq"><span>FAQs</span></a></li>
                <li><a href="/#sponsors"><span>Sponsors</span></a></li>
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
                <h5>SUN 30</h5>
                <div class="times">
                    <span><b>8AM</b>  Check In</span>
                    <span><b>9AM</b>  Opening Keynote: Anthony Johnson</span>
                    <span><b>10AM - 4PM</b>  Workshops/Talks/Activities</span>
                    <span><b>12PM - 2PM</b>  Lunch (Staggered)</span>
                    <span><b>4PM - 5PM</b>  Closing Ceremony</span>
                </div>
            </div>
            <div class="clear" style="clear: both;"></div>
        </div>
    </div>

    <div class = "workshops">
         <?php foreach ($workshops as $workshop) { ?>
      <div class="modal micromodal-slide" id="modal-<?php echo $workshop['wkshp_id']; ?>" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
              <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo $workshop['wkshp_id'];?>-title">
                <header class="modal__header">
                  <h2 class="modal__title" id="modal-<?php echo $workshop['wkshp_id'];?>-title">
                    <?php echo $workshop['title']; ?>
                  </h2>
                  <p></p>
                </header>
                <main class="modal__content" id="modal-<?php echo $workshop['wkshp_id'];?>-content">
                    <div class="img-title">
                        <img src = "https://s3.amazonaws.com/imagine-2018/assets/keynotes/<?php echo $workshop['speaker_img']; ?>">
                        <span>
                            <p><?php echo $workshop['name']; ?></p>
                            <p><?php echo $workshop['speaker_title']; ?></p>
                        </span>
                    </div>

                    <p>
                        <b>Description: </b><br><?php echo $workshop['description']; ?> 
                    </p>
                    <p>
                        <b>Prerequisites: </b><br><?php echo $workshop['prereqs']; ?> 
                    </p>
                </main>
                <footer class="modal__footer">
                  <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
              </div>
            </div>
      </div>

       <?php } ?>
        <h3>WORKSHOPS</h3>
        
        <h4 class="day">- SATURDAY -</h4>
        <?php foreach ($workshops as $workshop) {
            if ($workshop['day']=='SAT') {

                $start_time = new DateTime($workshop['start_time']);
                $end_time = new DateTime($workshop['end_time']);?>
            <div class="card">
                <button class = "modal-open" data-micromodal-trigger="modal-<?php echo $workshop['wkshp_id'];?>" >
                  <i class="fas fa-plus-circle"></i>
                </button>
                <h4><?php echo $workshop['title']; ?></h4>
                 <!-- <span><?php /* echo $start_time->format('h:ia'); */?> - <?php /*echo $end_time->format('h:ia'); */?></span> -->
                <div class="img-title">
                    <img src = "https://s3.amazonaws.com/imagine-2018/assets/keynotes/<?php echo $workshop['speaker_img']; ?>">
                    <span>
                        <p><?php echo $workshop['name']; ?></p>
                        <p><?php echo $workshop['speaker_title']; ?></p>
                    </span>
                </div>
                
            </div>
        <?php }} ?>

        <h5>ACTIVITIES</h5>

        <div class="card activity">    
            <h4>Smash Tournament</h4>
            <span>11:45am - 12:45pm</span>
        </div>

        <div class="card activity">    
            <h4>Cupstacking</h4>
            <span>12:45pm - 1:45pm</span>
        </div>

        <div class="card activity">    
            <h4>Code Golf</h4>
            <span>2:00pm - 3:00pm</span>
        </div>

        <div class="card activity">    
            <h4>Karaoke</h4>
            <span>3:00pm - 3:45pm</span>
        </div>

        <div class="card activity">    
            <h4>Pitch Competition</h4>
            <span>3:45pm - 4:45pm</span>
        </div>


         <h4 class="day">- SUNDAY -</h4>
        <?php foreach ($workshops as $workshop) {
            if ($workshop['day']=='SUN') {
                $start_time = new DateTime($workshop['start_time']);
                $end_time = new DateTime($workshop['end_time']);?>
            <div class="card">
                <button class = "modal-open" data-micromodal-trigger="modal-<?php echo $workshop['wkshp_id'];?>" >
                  <i class="fas fa-plus-circle"></i>
                </button>
                <h4><?php echo $workshop['title']; ?></h4>
                <span><i class="fas fa-tag"></i> <?php echo $workshop['tags']; ?></span>
                <!-- <span><?php /* echo $start_time->format('h:ia'); */?> - <?php /*echo $end_time->format('h:ia'); */?></span> -->
                <div class="img-title">
                    <img src = "https://s3.amazonaws.com/imagine-2018/assets/keynotes/<?php echo $workshop['speaker_img']; ?>">
                    <span>
                        <p><?php echo $workshop['name']; ?></p>
                        <p><?php echo $workshop['speaker_title']; ?></p>
                    </span>
                </div>
                
            </div>
        <?php }} ?>

        
        <h5>ACTIVITIES</h5>

        <div class="card activity">    
            <h4>Website Competition</h4>
            <span>10:30am - 11:30am</span>
        </div>

        <div class="card activity">    
            <h4>Smash Tournament</h4>
            <span>12:00pm - 1:00pm</span>
        </div>

        <div class="card activity">    
            <h4>Cupstacking</h4>
            <span>2:15pm - 3:00pm</span>
        </div>
    </div>


    
    <script>
        $( document ).ready(function() {
            MicroModal.init();
        });
    </script>
    
    <script type="text/javascript" src="../nav.js"></script>

</body>

</html>