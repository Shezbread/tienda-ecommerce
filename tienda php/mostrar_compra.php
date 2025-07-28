<?php
include 'conexion.php';
echo "<link rel='stylesheet' href='styles.css'>";
$sql = "SELECT * FROM COMPRA";
$resultado = $conn->query($sql);

echo "<h2>Listado de Compras</h2><table border='1'>";
echo "<tr><th>ID</th><th>Producto</th><th>Cliente</th><th>Cantidad</th><th>Total</th><th>Fecha</th></tr>";

while ($row = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id_compra']}</td>
            <td>{$row['id_producto']}</td>
            <td>{$row['id_cliente']}</td>
            <td>{$row['cantidad']}</td>
            <td>{$row['total']}</td>
            <td>{$row['fecha']}</td>
          </tr>";
}
echo "</table>";
echo "<a href='index.html'>Volver al inicio</a></div>";
?>