<?php
require_once 'config.php';

// Obtener los objetivos de la perspectiva financiera
$perspectiveId = 3; // ID de la perspectiva financiera
$queryObjectives = $pdo->prepare("SELECT id, name, description FROM objectives WHERE perspective_id = :perspectiveId");
$queryObjectives->execute([':perspectiveId' => $perspectiveId]);
$objectives = $queryObjectives->fetchAll(PDO::FETCH_ASSOC);

// Obtener las métricas para cada objetivo
$metrics = [];
if (!empty($objectives)) {
    $objectiveIds = implode(',', array_column($objectives, 'id')); // Crear una lista de IDs
    $queryMetrics = $pdo->query("SELECT objective_id, name, unit, target_value, description FROM metrics WHERE objective_id IN ($objectiveIds)");
    $metrics = $queryMetrics->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC); // Agrupar métricas por `objective_id`
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perspectiva Financiera</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
<div class="container">
    <!-- Menú lateral -->
    <nav class="sidebar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="clientes.php">Clientes</a></li>
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
            <h2>Objetivos de la Perspectiva Financiera</h2>
            <?php if (!empty($objectives)) : ?>
                <?php foreach ($objectives as $objective) : ?>
                    <div class="card">
                        <h4>Id objetivo: <?php echo htmlspecialchars($objective['id']); ?></h4>
                        <h3><?php echo htmlspecialchars($objective['name']); ?></h3>
                        <p><?php echo htmlspecialchars($objective['description']); ?></p>
                        <h4>Métricas</h4>
                        <?php if (!empty($metrics[$objective['id']])) : ?>
                            <ul>
                                <?php foreach ($metrics[$objective['id']] as $metric) : ?>
                                    <li>
                                        <strong><?php echo htmlspecialchars($metric['name']); ?></strong> 
                                        (<?php echo htmlspecialchars($metric['unit']); ?>): 
                                        Meta <?php echo htmlspecialchars($metric['target_value']); ?><br>
                                        <em><?php echo htmlspecialchars($metric['description']); ?></em>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>No hay métricas definidas para este objetivo.</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No hay objetivos definidos para la perspectiva financiera.</p>
            <?php endif; ?>
        </section>
    </main>
</div>
</body>
</html>
