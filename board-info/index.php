<?php session_start(); 

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}

include("../db.php");

$speaker_list = mysqli_query($con, "Select distinct name, email from speaker_interest order by name");
$attendee_list = mysqli_query($con, "Select distinct email from email_interest order by email");

?>

<head>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>

<body>
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s6"><a href="#tab1">Speaker Interest</a></li>
        <li class="tab col s6"><a href="#tab2">Attendee Interest</a></li>
      </ul>
    </div>
    <div id="tab1" class="col s12">
    	<h3>Speaker Interest</h3>
    	<table>
    		<thead>
    			<th>Name</th>
    			<th>Email</th>
    		</thead>
    		<?php foreach($speaker_list as $speaker) {?>
    			<tr>
    				<td><?php echo $speaker['name']?></td>
    				<td><?php echo $speaker['email']?></td>
    			</tr>
    		<?php }?>
		</table>
    </div>
   	<div id="tab2" class="col s12">
    	<h3>Attendee Interest</h3>
    	<table>
    		<thead>
    			<th>Email</th>
    		</thead>
    		<?php foreach($attendee_list as $a) {?>
    			<tr>
    				<td><?php echo $a['email']?></td>
    			</tr>
    		<?php }?>
		</table>
    </div>
  </div>
</body>

<script type="text/javascript">
 	$(document).ready(function(){
	    $('ul.tabs').tabs();
	});
</script>

