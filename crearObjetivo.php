<?php
require_once 'config.php';

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $perspectiveId = $_POST['perspective_id'];

    $query = $pdo->prepare("INSERT INTO objectives (name, description, perspective_id) VALUES (:name, :description, :perspective_id)");
    $query->execute([
        ':name' => $name,
        ':description' => $description,
        ':perspective_id' => $perspectiveId,
    ]);

    echo "<p>El objetivo fue creado exitosamente.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Objetivo</title>
    <link rel="stylesheet" href="public/cObjetivo.css">
</head>
<body>
<div class="container">
    <!-- Menú lateral -->
    <nav class="sidebar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="financiera.php">Financiera</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="procesos.php">Procesos</a></li>
            <li><a href="crearMetrica.php">Crear Métrica</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <div class="header">
            <div class="logo">Balance ScoreCard</div>
        </div>
        <section>
            <h2>Crear Objetivo</h2>
            <form action="crearObjetivo.php" method="POST">
                <label for="name">Nombre del Objetivo:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Descripción:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="perspective_id">Perspectiva:</label>
                <select id="perspective_id" name="perspective_id" required>
                    <option value="2">Clientes</option>
                    <option value="1">Procesos</option>
                    <option value="3">Financiera</option>
                </select>

                <button type="submit">Crear Objetivo</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
