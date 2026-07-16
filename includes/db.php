<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "happy_teeth_clinic";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// echo "Database Connected Successfully!";

?>