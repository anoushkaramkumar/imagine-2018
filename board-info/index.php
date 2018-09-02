<?php session_start(); 

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}

include("../db.php");

$applications = mysqli_query($con, "SELECT distinct name, age, email, tshirt, school, gender, diet, parent_name, parent_email, ques1, ques2, ques3, ques4 from application where age > 0 order by age desc");
$result = mysqli_query($con, "SELECT count(name) as count FROM innodb.application where age > 0");
$row = $result->fetch_object();
$count = $row->count;

?>

<head>
    <title>Applications</title>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>

<body>
<h4>Count: <?php echo $count; ?></h4>
<ul class="collapsible">
    <?php foreach ($applications as $app) { ?>
        <li>
          <div class="collapsible-header"><?php echo $app['name']; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STATUS:&nbsp;
            <?php if (empty($app['ques1']) || empty($app['ques3']) || empty($app['ques4'])) { ?>
                <span style="color: red;"> INCOMPLETE</span>
            <?php } else {?>
                <span style="color: green;"> COMPLETE</span>
            <?php } ?>
          </div>
          <div class="collapsible-body">
            <div class="row">
                <div class="col l6">
                    <p><b>Age: </b> <?php echo $app['age']; ?></p>
                    <p><b>Email: </b> <?php echo $app['email']; ?></p>
                    <p><b>Shirt Size: </b> <?php echo $app['tshirt']; ?></p>
                    <p><b>School: </b> <?php echo $app['school']; ?></p>
                    <p><b>Gender: </b> <?php echo $app['gender']; ?></p>
                    <p><b>Dietary Restrictions: </b> <?php echo $app['diet']; ?></p>
                    <p><b>Parent Name: </b> <?php echo $app['parent_name']; ?></p>
                    <p><b>Parent Email: </b> <?php echo $app['parent_email']; ?></p>
                </div>
                <div class="col l6">
                    <p><b>Are you a beginner in computer science? If not, tell us about some of the stuff you’ve done. </b><br><?php echo $app['ques1']; ?></p>
                    <p><b>Any links (e.g. Github, Personal Website, LinkedIn)?</b><br> <?php echo $app['ques2']; ?></p>
                    <p><b>What are your three main interests in the CS field?</b><br> <?php echo $app['ques3']; ?></p>
                    <p><b>Have you been to hackathons/technology events in the past? If so, which ones?</b><br> <?php echo $app['ques4']; ?></p>
                </div>
            </div>
          </div>
        </li>
    <?php } ?>
    
</body>

<script type="text/javascript">
 	$(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>

