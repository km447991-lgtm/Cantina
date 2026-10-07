<?php
declare(strict_types=1);

$dsn  = 'mysql:host=localhost;dbname=cantina;charset=utf8mb4';
$user = 'root';
$pass = '';

try {
  $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        
    PDO::ATTR_EMULATE_PREPARES   => false,                  
  ]);

  echo "✅ Conectado a MySQL/MariaDB";
} catch (PDOException $e) {
  echo "❌ Error de conexión: " . $e->getMessage();
}
?>