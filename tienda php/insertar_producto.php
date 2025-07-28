<?php
include "conexion.php";
echo "<link rel='stylesheet' href='styles.css'>";
$id_producto = $_POST["id_producto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];

$verificar = "SELECT * FROM PRODUCTO WHERE id_producto = $id_producto";
$resultado = $conn->query($verificar);

if ($resultado->num_rows > 0) {
    echo "El ID del producto ya existe. Por favor elige otro.";
} else {
    $sql = "INSERT INTO PRODUCTO (id_producto, nombre, descripcion, categoria, precio, stock)
            VALUES ($id_producto, '$nombre', '$descripcion', '$categoria', $precio, $stock)";

    if ($conn->query($sql) === true) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al insertar: " . $conn->error;
    }
}

$conn->close();

echo "<a href='index.html'>Volver al inicio</a></div>";
?>