<?php
$host = "localhost";
$usuario = "root";
$password = "";
$basedatos = "TIENDA";

$conn = new mysqli($host, $usuario, $password, $basedatos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>