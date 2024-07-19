<?php
include 'conexiones/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $portada = $_POST['portada'];
    $avatar = $_POST['avatar'];

    // Comprueba si el usuario ya existe
    $sql_check = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Si el usuario existe, actualiza los datos
        $sql_update = "UPDATE usuarios SET portada='$portada', avatar='$avatar' WHERE nombre_usuario='$nombre_usuario'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Perfil actualizado exitosamente";
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    } else {
        // Si el usuario no existe, inserta nuevos datos
        $sql_insert = "INSERT INTO usuarios (nombre_usuario, portada, avatar) VALUES ('$nombre_usuario', '$portada', '$avatar')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Perfil guardado exitosamente";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
