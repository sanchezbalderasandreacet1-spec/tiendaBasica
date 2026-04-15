
<?php include 'header.php'; $catalogo = include 'productos.php'; ?>

<?php
// Agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $id = (int) $_POST['id'];
  $cantidad = max(1, (int) ($_POST['cantidad'] ?? 1));
  if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];
  if (!isset($_SESSION['carrito'][$id])) {
    // Buscar producto
    foreach ($catalogo as $p) if ($p['id'] === $id) { $_SESSION['carrito'][$id] = ['producto'=>$p,'cantidad'=>0]; break; }
  }
  $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
  header('Location: carrito.php');
  exit;
}
?>

<div class="grid">
<?php foreach ($catalogo as $p): ?>
  <div class="card">
    <img src="<?php echo htmlspecialchars($p['imagen']); ?>" alt="<?php echo htmlspecialchars($p['nombre']); ?>">
    <div class="p">
      <h3><?php echo htmlspecialchars($p['nombre']); ?></h3>
      <div class="price">$<?php echo number_format($p['precio'], 2); ?></div>
      <form method="post" style="margin-top:.5rem;display:flex;gap:.5rem;align-items:center">
        <input type="hidden" name="id" value="<?php echo (int)$p['id']; ?>">
        <input type="number" name="cantidad" value="1" min="1" style="width:60px;padding:.4rem;border-radius:8px;border:1px solid #ddd">
        <button class="btn" type="submit">Agregar</button>
      </form>
    </div>
  </div>
<?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
