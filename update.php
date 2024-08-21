<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id");
    $stmt->execute(['nombre' => $nombre, 'email' => $email, 'telefono' => $telefono, 'id' => $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Usuario</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" required>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <input type="text" name="telefono" value="<?php echo $user['telefono']; ?>" required>
            <button type="submit" name="update">Actualizar Usuario</button>
        </form>
    </div>
</body>
</html>
