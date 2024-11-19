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
    <style>
        .iframe-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .edit-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
<div class="container">
        <!-- Menú lateral -->
        <nav class="sidebar">
            <ul>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="financiera.php">Financiera</a></li>
                <li><a href="procesos.php">Procesos</a></li>
                <li><a href="innovacion.php">Innovacion y aprendizaje</a></li>
                <li><a href="crearObjetivo.php">Crear Objetivo</a></li>
                <li><a href="crearMetrica.php">Crear Métrica</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="container">
    <!-- Contenido principal -->
    <main class="main-content">
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

            <!-- Contenedor del iframe -->
            <div class="iframe-container">
                <iframe 
                    width="750" 
                    height="506" 
                    frameborder="0" 
                    scrolling="no" 
                    src="https://onedrive.live.com/embed?resid=AD32DDB37226AACA%2113651&authkey=%21APsD7Pwmsy25q94&em=2&wdAllowInteractivity=False&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True&wdInConfigurator=True">
                </iframe>
            </div>

            <!-- Enlace para editar Excel -->
            <div class="edit-link" style="text-align: center;">
                <a href="https://1drv.ms/x/s!AsqqJnKz3TKt6lPVvjcMq8ZZEifA?e=ZgfL2R" target="_blank">EDITAR EXCEL</a>
            </div>
        </section>
    </main>
</div>
</body>
</html>