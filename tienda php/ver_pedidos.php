<?php
session_start();
$pedidos = file_exists("pedidos.json") ? json_decode(file_get_contents("pedidos.json"), true) : [];
echo "<link rel='stylesheet' href='styles.css'>";
echo "<div class='container'><h2>Pedidos Guardados</h2>";
foreach ($pedidos as $p) {
    echo "<div class='resumen'><strong>Producto:</strong> {$p["producto"]}<br>
          <strong>Tipo:</strong> {$p["tipo"]}<br>
          <strong>Unidades:</strong> {$p["unidades"]}<br>
          <strong>Descripción:</strong> {$p["descripcion"]}<br>
          <strong>Observaciones:</strong> {$p["observaciones"]}<br>
          </div>";
}
echo "<a href='index.html'>Volver al inicio</a></div>";
?>