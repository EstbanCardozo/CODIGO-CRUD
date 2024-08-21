<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");
    $stmt->execute(['nombre' => $nombre, 'email' => $email, 'telefono' => $telefono]);

    header("Location: index.php");
    exit();
}
?>
