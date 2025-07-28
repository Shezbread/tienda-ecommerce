<?php
include "conexion.php";
echo "<link rel='stylesheet' href='styles.css'>";
echo "<h2>Productos registrados</h2>";
$result = $conn->query("SELECT * FROM PRODUCTO");
while ($row = $result->fetch_assoc()) {
    echo "{$row["nombre"]} - Precio: {$row["precio"]} - Stock: {$row["stock"]}<br>";
}

echo "<h2>Clientes registrados</h2>";
$result = $conn->query("SELECT * FROM CLIENTE");
while ($row = $result->fetch_assoc()) {
    echo "{$row["nombre"]} - Email: {$row["email"]}<br>";
}
$conn->close();
echo "<a href='index.html'>Volver al inicio</a></div>";
?>