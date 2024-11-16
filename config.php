<?php
$host = 'localhost'; // o 'postgres-db' si usas Docker en una red personalizada
$port = '5432';
$dbname = 'bsc_admin';
$user = 'bsc';
$password = 'bsc';

try {
    // Crear la conexión PDO
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Configurar el manejo de errores en PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error en la conexión, mostrar el mensaje
    die("Error de conexión: " . $e->getMessage());
}
?>
