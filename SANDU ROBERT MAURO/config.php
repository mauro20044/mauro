<?php
$host = "127.0.0.1";
$port = 3307;
$user = "root";
$pass = "parola123";
$db = "restaurant_db";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Eroare conexiune: " . $conn->connect_error);
}
?>
