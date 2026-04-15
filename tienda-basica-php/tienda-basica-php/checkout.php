
<?php include 'header.php'; ?>
<?php
$carrito = $_SESSION['carrito'] ?? [];
$subtotal = 0.0;
foreach ($carrito as $item) { $subtotal += $item['producto']['precio'] * $item['cantidad']; }
$envio = $subtotal > 0 ? 79.00 : 0.00;
$total = $subtotal + $envio;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Simulación de "pedido realizado"
  $_SESSION['carrito'] = [];
  $ok = true;
}
?>

<h2>Checkout</h2>
<?php if (empty($carrito) && empty($ok)): ?>
  <p>No tienes artículos en el carrito. <a href="index.php">Volver a la tienda</a></p>
<?php elseif (!empty($ok)): ?>
  <p>🎉 ¡Gracias por tu compra! Tu pedido ha sido registrado (simulado).</p>
  <p><a class="btn" href="index.php">Volver al inicio</a></p>
<?php else: ?>
  <div class="card">
    <div class="p">
      <p>Resumen del pedido. Total a pagar: <strong>$<?php echo number_format($total,2); ?></strong></p>
      <form method="post" style="display:grid;gap:.5rem;max-width:420px">
        <input required name="nombre" placeholder="Nombre" style="padding:.5rem;border-radius:8px;border:1px solid #ddd">
        <input required name="email" type="email" placeholder="Correo" style="padding:.5rem;border-radius:8px;border:1px solid #ddd">
        <input required name="direccion" placeholder="Dirección" style="padding:.5rem;border-radius:8px;border:1px solid #ddd">
        <button class="btn" type="submit">Realizar pedido</button>
      </form>
    </div>
  </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
