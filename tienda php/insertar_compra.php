<?php
include "conexion.php";
echo "<link rel='stylesheet' href='styles.css'>";
$id_producto = $_POST['id_producto'];
$id_cliente = $_POST['id_cliente'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$total = $_POST['total'];

$validar_producto = $conn->query("SELECT stock FROM PRODUCTO WHERE id_producto = $id_producto");
$validar_cliente = $conn->query("SELECT * FROM CLIENTE WHERE id_cliente = $id_cliente");

if ($validar_producto->num_rows > 0 && $validar_cliente->num_rows > 0) {
    $producto = $validar_producto->fetch_assoc();
    if ($producto['stock'] >= $cantidad) {
        $sql = "INSERT INTO COMPRA (cantidad, total, fecha, id_producto, id_cliente)
                VALUES ($cantidad, $total, '$fecha', $id_producto, $id_cliente)";
        if ($conn->query($sql) === TRUE) {
            $nuevoStock = $producto['stock'] - $cantidad;
            $conn->query("UPDATE PRODUCTO SET stock = $nuevoStock WHERE id_producto = $id_producto");
            echo "Compra registrada correctamente.";
        } else {
            echo "Error al registrar compra: " . $conn->error;
        }
    } else {
        echo "Stock insuficiente.";
    }
} else {
    echo "Producto o cliente no encontrado.";
}
$conn->close();
echo "<a href='index.html'>Volver al inicio</a></div>";
?>