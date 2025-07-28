<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();
echo "<link rel='stylesheet' href='styles.css'>";

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: carrito.php?msg=expirada");
    exit;
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['regenerado'])) {
    session_regenerate_id(true);
    $_SESSION['regenerado'] = true;
}

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto"])) {
    $producto = trim($_POST["producto"]);
    if ($producto !== "") {
        $_SESSION["carrito"][] = htmlspecialchars($producto);
    }
}

echo "<div class='container'><h2>Carrito de Compras</h2>";
if (empty($_SESSION["carrito"])) {
    echo "<p>Tu carrito está vacío.</p>";
} else {
    echo "<ul>";
    foreach ($_SESSION["carrito"] as $p) {
        echo "<li>$p</li>";
    }
    echo "</ul>";
    echo "<form action='pedido_form.html'><input type='submit' value='Proceder al pedido'></form>";
}
?>
<form method="POST">
  <label>Producto:</label>
  <input type="text" name="producto" required>
  <input type="submit" value="Agregar al carrito">
</form>
<a href="vaciar_carrito.php">Vaciar carrito</a> |
<a href="index.html">Inicio</a>