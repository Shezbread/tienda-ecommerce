<?php
session_start();
header("Content-Type: application/json");

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

$input = json_decode(file_get_contents("php://input"), true);

if (isset($input["id"]) && isset($input["nombre"]) && isset($input["precio"])) {
    $_SESSION["carrito"][] = [
        "id" => $input["id"],
        "nombre" => $input["nombre"],
        "precio" => $input["precio"],
    ];

    echo json_encode(["status" => "ok", "mensaje" => "Producto agregado"]);
} else {
    echo json_encode(["status" => "error", "mensaje" => "Datos inválidos"]);
}
?>