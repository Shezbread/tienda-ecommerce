<?php
include 'conexion.php';
$id_cliente = $_POST['id_cliente'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$verificar = "SELECT * FROM CLIENTE WHERE id_cliente = $id_cliente";
$resultado = $conn->query($verificar);

if ($resultado->num_rows > 0) {
    echo "El ID del cliente ya existe. Por favor elige otro.";
} else {
    $sql = "INSERT INTO CLIENTE (id_cliente, nombre, email, direccion)
            VALUES ($id_cliente, '$nombre', '$email', '$direccion')";
    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error al insertar: " . $conn->error;
    }
}
$conn->close();

echo "<a href='index.html'>Volver al inicio</a></div>";
?>