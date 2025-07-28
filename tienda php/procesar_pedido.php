<?php
session_start();
require_once "Pedido.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pedido = new Pedido(
        $_POST["descripcion"],
        $_POST["tipo"],
        $_POST["producto"],
        $_POST["unidades"],
        $_POST["observaciones"]
    );

    $pedidoData = [
        "producto" => $pedido->producto,
        "tipo" => $pedido->tipo,
        "unidades" => $pedido->unidades,
        "descripcion" => $pedido->descripcion,
        "observaciones" => $pedido->observaciones,
    ];

    $archivo = "pedidos.json";
    $pedidos = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];
    $pedidos[] = $pedidoData;
    file_put_contents($archivo, json_encode($pedidos, JSON_PRETTY_PRINT));

    echo "<link rel='stylesheet' href='style.css'>";
    echo "<div class='container'>";
    echo $pedido->mostrarResumen();
    echo "<a href='index.html'>Volver al inicio</a></div>";
} else {
    echo "Acceso no permitido.";
}
?>