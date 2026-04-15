
# Tienda Básica en PHP (HTML + PHP + Carrito con sesiones)

Una tienda muy simple para fines didácticos. No usa base de datos: los productos están en un arreglo PHP. El carrito se guarda en la sesión.

## Requisitos
- PHP 7.4+ (recomendado PHP 8+)
- Servidor con soporte para sesiones (PHP por defecto)

## Cómo ejecutar
1. Copia la carpeta `tienda-basica-php/` a tu servidor (por ejemplo, `htdocs/` en XAMPP o `www/` en Apache).
2. Inicia el servidor web y visita `http://localhost/tienda-basica-php/`.

## Estructura
- `index.php` — Lista de productos y permite agregar al carrito.
- `carrito.php` — Ver, actualizar cantidades y eliminar productos del carrito.
- `checkout.php` — Resumen final (simulado) y limpiar carrito.
- `productos.php` — Catálogo (arreglo PHP).
- `styles.css` — Estilos básicos.

## Nota
Este proyecto es educativo. No incluye seguridad avanzada, pagos reales ni persistencia en base de datos.
