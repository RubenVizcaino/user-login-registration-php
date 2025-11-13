<?php
//change this config in your db!
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hype_secure_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>