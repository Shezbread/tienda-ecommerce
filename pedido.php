<?php
include 'conexion.php';

$id_cliente = $_POST['id_cliente'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$fecha = date('Y-m-d');

// Cálculo total y validación
$sql_precio = "SELECT precio FROM PRODUCTO WHERE id_producto = $id_producto";
$result = $conn->query($sql_precio);
$row = $result->fetch_assoc();
$total = $cantidad * $row['precio'];

$sql = "INSERT INTO PEDIDO (id_cliente, id_producto, cantidad, total, fecha)
        VALUES ($id_cliente, $id_producto, $cantidad, $total, '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Pedido realizado con éxito.";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
