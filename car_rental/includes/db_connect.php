<?php
$host = "localhost";
$user = "root";    // XAMPP default username
$pass = "";        // XAMPP default password (blank)
$dbname = "car_rental";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
