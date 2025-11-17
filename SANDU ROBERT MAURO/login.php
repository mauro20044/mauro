<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $parola = $_POST['parola'];

    $stmt = $conn->prepare("SELECT id, nume, parola FROM utilizatori WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nume, $hash);
        $stmt->fetch();

        if (password_verify($parola, $hash)) {
            $_SESSION['utilizator'] = $nume;
            echo "Bun venit, $nume! <a href='index.html'>Mergi la pagină principală</a>";
        } else {
            echo "Parolă greșită!";
        }
    } else {
        echo "Utilizator inexistent!";
    }

    $stmt->close();
    $conn->close();
}
?>
