<?php
require_once 'config.php';

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $targetValue = $_POST['target_value'];
    $description = $_POST['description'];
    $objectiveId = $_POST['objective_id'];

    $query = $pdo->prepare("INSERT INTO metrics (name, unit, target_value, description, objective_id) VALUES (:name, :unit, :target_value, :description, :objective_id)");
    $query->execute([
        ':name' => $name,
        ':unit' => $unit,
        ':target_value' => $targetValue,
        ':description' => $description,
        ':objective_id' => $objectiveId,
    ]);

    echo "<p>La métrica fue creada exitosamente.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Métrica</title>
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
            <li><a href="crearObjetivo.php">Crear Objetivo</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <div class="header">
            <div class="logo">Balance ScoreCard</div>
        </div>
        <section>
            <h2>Crear Métrica</h2>
            <form action="crearMetrica.php" method="POST">
                <label for="name">Nombre de la Métrica:</label>
                <input type="text" id="name" name="name" required>

                <label for="unit">Unidad de Medida:</label>
                <input type="text" id="unit" name="unit" required>

                <label for="target_value">Valor Meta:</label>
                <input type="number" id="target_value" name="target_value" required>

                <label for="description">Descripción:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="objective_id">ID del Objetivo:</label>
                <input type="number" id="objective_id" name="objective_id" required>

                <button type="submit">Crear Métrica</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
