<?php
// conexion/db_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfilDB";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
