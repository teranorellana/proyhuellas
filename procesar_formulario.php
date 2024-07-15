<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['pet-name'];
    $petAge = $_POST['pet-age'];

    // Definir el directorio de destino
    $targetDir = "uploads/";
    
    // Crear el directorio si no existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $targetFile = $targetDir . basename($_FILES["pet-image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Verificar si el archivo es una imagen real
    if (isset($_FILES["pet-image"]) && $_FILES["pet-image"]["tmp_name"] != "") {
        $check = getimagesize($_FILES["pet-image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }

        // Verificar si el archivo ya existe
        if (file_exists($targetFile)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }

        // Verificar el tamaño del archivo
        if ($_FILES["pet-image"]["size"] > 500000) {
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }

        // Verificar si $uploadOk está en 0 por un error
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
        // Si todo está bien, intentar subir el archivo
        } else {
            if (move_uploaded_file($_FILES["pet-image"]["tmp_name"], $targetFile)) {
                $sql = "INSERT INTO mascotas (nombre, edad, img) VALUES ('$petName', '$petAge', '$targetFile')";
                if ($conn->query($sql) === TRUE) {
                    echo "Nueva mascota agregada exitosamente";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        }
    } else {
        echo "No se ha subido ninguna imagen.";
    }

    $conn->close();
}
?>