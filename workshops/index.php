<?php 
require_once '../db.php';


// Usage
$query = 'SELECT DISTINCT * FROM workshops ORDER BY day, start_time';
$workshops = mysqli_query($con, $query);
$rows = array();
while($row = $workshops->fetch_assoc()) {
    $rows[] = $row;
}
// $workshops->free();


include("./view.php");

?>