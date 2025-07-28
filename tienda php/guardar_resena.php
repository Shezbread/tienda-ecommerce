<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaResena = [
        "producto" => $_POST["producto"],
        "calificacion" => $_POST["calificacion"],
        "comentario" => $_POST["comentario"],
    ];

    $archivo = "reseñas.json";
    $resenas = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];
    $resenas[] = $nuevaResena;
    file_put_contents($archivo, json_encode($resenas, JSON_PRETTY_PRINT));
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<div class='container'><h2>¡Gracias por tu reseña!</h2><a href='index.html'>Volver al inicio</a></div>";
} else {
    echo "Método no permitido.";
}
?>