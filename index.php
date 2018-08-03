<?php

// include("db.php");

// try {
//     $db = new PDO($dsn, $username, $password, $options);
// } catch (PDOException $e) {
//     error_log("Unable to connect to database: " . $e->getMessage(), 0);
//     echo ("Unable to connect to database.");
//     exit;
// }

// function add_email($email)
// {
//     global $db;

//     $query = "INSERT INTO email_interest (email)
//               VALUES (:email)";

//     try {
//         $statement = $db->prepare($query);
//         $statement->bindValue(":email", $email);
//         $statement->execute();
//         $statement->closeCursor();
//     } catch (PDOException $e) {
//         display_db_exception($e);
//         exit();
//     }
// }

// if (isset($_GET['email'])) {
//     $email = $_GET['email'];
//     add_email($email);

//     exit();
// }

include("./view.php");

?>