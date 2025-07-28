<?php
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT id_producto, nombre, descripcion, categoria, precio FROM PRODUCTO";
$result = $conn->query($sql);

$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = [
        "id" => $row["id_producto"],
        "nombre" => $row["nombre"],
        "categoria" => $row["categoria"], 
        "precio" => $row["precio"]
    ];
}

echo json_encode($productos);
$conn->close();
?>