<?php
// conexiones/usuarioregistro.php
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario de la base de datos es diferente
$password = ""; // Cambia esto si tu contraseña de la base de datos es diferente
$dbname = "huellitas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
