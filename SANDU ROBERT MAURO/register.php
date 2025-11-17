<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $parola = password_hash($_POST['parola'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO utilizatori (nume, email, parola) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nume, $email, $parola);

    if ($stmt->execute()) {
        echo "Cont creat cu succes! <a href='login.html'>Autentifică-te aici</a>";
    } else {
        echo "Eroare: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
