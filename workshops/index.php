<?php 
require_once '../db.php';


// Usage
$query = 'SELECT DISTINCT * FROM workshops ORDER BY keynote DESC';
$workshops = mysqli_query($con, $query);
$rows = array();
while($row = $workshops->fetch_assoc()) {
    $rows[] = $row;
}
// $workshops->free();


include("./view.php");

?>