<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mascota</title>
</head>
<body>
    <div id="add-pet-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <form id="add-pet-form" action="procesar_formulario.php" method="POST" enctype="multipart/form-data">
                <label for="pet-name">Nombre:</label>
                <input type="text" id="pet-name" name="pet-name" required>
                <label for="pet-age">Edad:</label>
                <input type="text" id="pet-age" name="pet-age" required>
                <label for="pet-image">Imagen:</label>
                <input type="file" id="pet-image" name="pet-image" accept="image/*" required>
                <button type="submit">Agregar Mascota</button>
            </form>
        </div>
    </div>

    <script src="js/mascotas.js"></script>
    <?php 
    include("procesar_formulario.php");
    ?>
</body>
</html>