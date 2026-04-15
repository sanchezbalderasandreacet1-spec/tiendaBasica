
<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$carrito = $_SESSION['carrito'] ?? [];
$items = array_sum(array_column($carrito, 'cantidad')) ?: 0;
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda Básica PHP</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>🛍️ Tienda Básica</h1>
      <nav>
        <a href="index.php">Inicio</a> · 
        <a href="carrito.php">Carrito <span class="badge"><?php echo $items; ?></span></a>
      </nav>
    </div>
