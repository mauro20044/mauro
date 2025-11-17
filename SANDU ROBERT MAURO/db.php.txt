<?php
// db.php - conexiune la MySQL (XAMPP)
$host = 'localhost';
$db   = 'restaurant';     // numele bazei tale de date
$user = 'root';           // utilizatorul implicit XAMPP
$pass = '';               // parola e goală implicit

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Eroare conexiune DB: " . $e->getMessage());
}
?>
