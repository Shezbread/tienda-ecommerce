<?php
session_start();
$resenas = file_exists("reseñas.json") ? json_decode(file_get_contents("reseñas.json"), true) : [];
echo "<link rel='stylesheet' href='styles.css'>";
echo "<div class='container'><h2>Reseñas Guardadas</h2>";
foreach ($resenas as $r) {
    echo "<div class='resumen'><strong>Producto:</strong> {$r["producto"]}<br>
          <strong>Calificación:</strong> {$r["calificacion"]} / 5<br>
          <strong>Comentario:</strong> {$r["comentario"]}<br>
          </div>";
}
echo "<a href='index.html'>Volver al inicio</a></div>";
?>