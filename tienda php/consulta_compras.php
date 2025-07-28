<?php
include "conexion.php";
echo "<link rel='stylesheet' href='styles.css'>";
$sql = "SELECT c.nombre, COUNT(*) as total_compras
        FROM COMPRA cp
        JOIN CLIENTE c ON cp.id_cliente = c.id_cliente
        GROUP BY cp.id_cliente
        HAVING COUNT(*) > 2";

$result = $conn->query($sql);

echo "<h2>Clientes con más de 2 compras</h2>";
while ($row = $result->fetch_assoc()) {
    echo "{$row["nombre"]} - Compras: {$row["total_compras"]}<br>";
}
$conn->close();
echo "<a href='index.html'>Volver al inicio</a></div>";
?>