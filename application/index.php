<?php 

require_once '../db.php';

session_start();

if (isset($_SESSION['id']) ) {
	// $id = $_SESSION['id'];

	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 	$value = $_POST['submit'];
	// 	$name = $_POST['name'];
	// 	$age = $_POST['age'];
	// 	$email = $_POST['email'];
	// 	$tshirt = $_POST['tshirt'];
	// 	$school = $_POST['school'];
	// 	$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
	// 	$diet = $_POST['diet'];
	// 	$parent_name = $_POST['parent_name'];
	// 	$parent_email = $_POST['parent_email'];

	// 	$ques1 = $_POST['ques1'];
	// 	$ques2 = $_POST['ques2'];
	// 	$ques3 = $_POST['ques3'];
	// 	$ques4 = $_POST['ques4'];

	// 	if ($value == "Save") {
	// 		mysqli_query($con, "UPDATE application
	// 		SET name = '$name', age = '$age', email = '$email', tshirt = '$tshirt', school = '$school', gender = '$gender', diet = '$diet', parent_name = '$parent_name', parent_email = '$parent_email', ques1 = '$ques1', ques2 = '$ques2', ques3 = '$ques3', ques4 = '$ques4'
	// 		WHERE id = '$id';") or die(mysqli_error());
	// 	} else if ($value == "Submit") {
	// 		mysqli_query($con, "UPDATE application
	// 		SET name = '$name', age = '$age', email = '$email', tshirt = '$tshirt', school = '$school', gender = '$gender', diet = '$diet', parent_name = '$parent_name', parent_email = '$parent_email', ques1 = '$ques1', ques2 = '$ques2', ques3 = '$ques3', ques4 = '$ques4', submit = 1
	// 		WHERE id = '$id';") or die(mysqli_error());
	// 	} else {

	// 	}
	// }


	// $query = mysqli_query($con, "SELECT * FROM application where id = '$id' LIMIT 1") or die(mysqli_error());
	// $user_app = mysqli_fetch_array($query);

	// $percent1 = 0;
	// $name = $user_app['name'];
	// if (!empty($name)) { $percent1 += 1; }
	// $age = $user_app['age'];
	// if (!empty($age)) { $percent1 += 1; }
	// $email = $user_app['email'];
	// if (!empty($email)) { $percent1 += 1; }
	// $tshirt = $user_app['tshirt'];
	// if (!empty($tshirt)) { $percent1 += 1; }
	// $school = $user_app['school'];
	// if (!empty($school)) { $percent1 += 1; }
	// $gender = $user_app['gender'];
	// $diet = $user_app['diet'];
	// $parent_name = $user_app['parent_name'];
	// if (!empty($parent_name)) { $percent1 += 1; }
	// $parent_email = $user_app['parent_email'];
	// if (!empty($parent_email)) { $percent1 += 1; }
	// $percent1 = $percent1/7 * 100;

	// $percent2 = 0;
	// $ques1 = $user_app['ques1'];
	// if (!empty($ques1)) { $percent2 += 1; }
	// $ques2 = $user_app['ques2'];
	// if (!empty($ques2)) { $percent2 += 1; }
	// $ques3 = $user_app['ques3'];
	// if (!empty($ques3)) { $percent2 += 1; }
	// $ques4 = $user_app['ques4'];
	// if (!empty($ques4)) { $percent2 += 1; }
	// $percent2 = $percent2/4 * 100;

	// $submitted = $user_app['submit'];

	// include("./view.php");
	header("location: ../login/welcome.php");
} else {
	header("location: ../login/index.php");
}


?>