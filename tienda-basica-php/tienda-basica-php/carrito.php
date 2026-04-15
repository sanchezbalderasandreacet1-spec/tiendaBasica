
<?php include 'header.php'; ?>
<?php $catalogo = include 'productos.php'; ?>
<?php
// Actualizar cantidades / eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['actualizar'])) {
    foreach (($_POST['cant'] ?? []) as $id => $cant) {
      $id = (int)$id; $cant = max(0, (int)$cant);
      if ($cant === 0) { unset($_SESSION['carrito'][$id]); }
      else { if (isset($_SESSION['carrito'][$id])) $_SESSION['carrito'][$id]['cantidad'] = $cant; }
    }
  }
  if (isset($_POST['vaciar'])) { $_SESSION['carrito'] = []; }
}
$carrito = $_SESSION['carrito'] ?? [];
$subtotal = 0.0;
foreach ($carrito as $item) { $subtotal += $item['producto']['precio'] * $item['cantidad']; }
$envio = $subtotal > 0 ? 79.00 : 0.00;
$total = $subtotal + $envio;
?>

<h2>Carrito</h2>
<?php if (!$carrito): ?>
  <p>Tu carrito está vacío. <a href="index.php">Ver productos</a></p>
<?php else: ?>
  <form method="post">
    <table class="table">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($carrito as $id => $item): ?>
          <tr>
            <td><?php echo htmlspecialchars($item['producto']['nombre']); ?></td>
            <td>$<?php echo number_format($item['producto']['precio'],2); ?></td>
            <td>
              <input type="number" name="cant[<?php echo (int)$id; ?>]" value="<?php echo (int)$item['cantidad']; ?>" min="0" style="width:70px;padding:.3rem;border-radius:8px;border:1px solid #ddd">
            </td>
            <td>$<?php echo number_format($item['producto']['precio']*$item['cantidad'],2); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="total">
      <div>
        <div>Subtotal: <strong>$<?php echo number_format($subtotal,2); ?></strong></div>
        <div>Envío: <strong>$<?php echo number_format($envio,2); ?></strong></div>
        <div>Total: <strong>$<?php echo number_format($total,2); ?></strong></div>
      </div>
      <div style="display:flex;gap:.5rem">
        <button class="btn outline" name="vaciar" value="1" type="submit">Vaciar</button>
        <button class="btn" name="actualizar" value="1" type="submit">Actualizar</button>
        <a class="btn" href="checkout.php">Continuar</a>
      </div>
    </div>
  </form>
<?php endif; ?>

<?php include 'footer.php'; ?>
