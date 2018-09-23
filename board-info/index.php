<?php session_start(); 

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}

include("../db.php");

$applications = mysqli_query($con, "SELECT distinct name, age, email, tshirt, school, gender, diet, parent_name, parent_email, submit, paid from application where age > 0 order by paid desc, submit desc");
$cresult = mysqli_query($con, "SELECT count(name) as count FROM innodb.application where age > 0");
$row = $cresult->fetch_object();
$count = $row->count;

$sresult = mysqli_query($con, "SELECT count(name) as count FROM innodb.application where age > 0 AND submit=1");
$row = $sresult->fetch_object();
$submit = $row->count;

$presult = mysqli_query($con, "SELECT count(name) as count FROM innodb.application where age > 0 AND paid=1");
$row = $presult->fetch_object();
$paid = $row->count;

?>

<head>
    <title>Applications</title>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>

<body>
<h4>App Started: <?php echo $count; ?></h4>
<h4>Registered: <?php echo $submit; ?></h4>
<h4>Paid: <?php echo $paid; ?></h4>
<ul class="collapsible">
    <?php foreach ($applications as $app) { ?>
        <li>
          <div class="collapsible-header"><?php echo $app['name']; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STATUS:&nbsp;
            <?php if ($app['submit']) { ?>
                <span style="color: green;"> SUBMITTED,</span>
            <?php } else {?>
                <span style="color: red;"> NOT SUBMITTED,</span>
            <?php } ?>

            <?php if ($app['paid']) { ?>
                <span style="color: green;">&nbsp;&nbsp;PAID</span>
            <?php } else {?>
                <span style="color: red;">&nbsp;&nbsp;NOT PAID</span>
            <?php } ?>
          </div>
          <div class="collapsible-body">
            <div class="row">
                <div class="col l12">
                    <p><b>Age: </b> <?php echo $app['age']; ?></p>
                    <p><b>Email: </b> <?php echo $app['email']; ?></p>
                    <p><b>Shirt Size: </b> <?php echo $app['tshirt']; ?></p>
                    <p><b>School: </b> <?php echo $app['school']; ?></p>
                    <p><b>Gender: </b> <?php echo $app['gender']; ?></p>
                    <p><b>Dietary Restrictions: </b> <?php echo $app['diet']; ?></p>
                    <p><b>Parent Name: </b> <?php echo $app['parent_name']; ?></p>
                    <p><b>Parent Email: </b> <?php echo $app['parent_email']; ?></p>
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

