<?php
require_once 'config.php';

// Obtener los datos de la organización
$queryOrganization = $pdo->query("SELECT name, mission, vision FROM organization");
$organization = $queryOrganization->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance Scorecard</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
    
<div class="container">
        <!-- Menú lateral -->
        <nav class="sidebar">
            <ul>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="financiera.php">Financiera</a></li>
                <li><a href="procesos.php">Procesos</a></li>
                <li><a href="crearObjetivo.php">Crear Objetivo</a></li>
                <li><a href="crearMetrica.php">Crear Métrica</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="main-content">
            <div class="header">
            <div class="logo">Balance ScoreCard</div>
            </div>
            <section>
                <h2><?php echo htmlspecialchars($organization['name']); ?></h2>
                <div class="card">
                    <h3>Misión</h3>
                    <p><?php echo htmlspecialchars($organization['mission']); ?></p>
                </div>
                <div class="card">
                    <h3>Visión</h3>
                    <p><?php echo htmlspecialchars($organization['vision']); ?></p>
                </div>
                <div>
                <link rel="stylesheet" href="public/styles.css">
                </div>
            </section>

        </main>
    </div>
</body>
</html>
