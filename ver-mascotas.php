<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/tienda.js" async></script>
    <title>Mascotas</title>
    <link rel="stylesheet" href="css/mascotas.css">
</head>
<body>
    <header>
        <div class="btn-container">
            <a href="/ver-mascotas.php" class="btn-neon">
                <span id="span1"></span>
                <span id="span2"></span>
                <span id="span3"></span>
                <span id="span4"></span>
                Perros
            </a>
            <a href="/gatos.php" class="btn-neon">
                <span id="span1"></span>
                <span id="span2"></span>
                <span id="span3"></span>
                <span id="span4"></span>
                Gatos
            </a>
        </div>
        <section class="textos-header">
            <h1>Mascotas</h1>
        </section>
    </header>
    <section class="contenedor"> 
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            <?php
            include("conexion.php");
            
            // Verificar si la conexión es exitosa
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            $sql = "SELECT nombre, edad, img FROM mascotas";
            $result = $conn->query($sql);

            // Verificar si la consulta es exitosa
            if ($result === false) {
                echo "Error en la consulta: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='item'>";
                        echo "<span class='titulo-item'>" . htmlspecialchars($row["nombre"]) . "</span>";
                        echo "<img src='" . htmlspecialchars($row["img"]) . "' alt='" . htmlspecialchars($row["nombre"]) . "' class='img-item'>";
                        echo "<span class='precio-item'>" . htmlspecialchars($row["edad"]) . " años</span>";
                        echo "<button class='boton-item'>Adoptar</button>";
                        echo "</div>";
                    }
                } else {
                    echo "0 resultados";
                }
            }

            $conn->close();
            ?>
        </div>
    </section>
    
    <!-- Botón flotante -->
    <a href="agregarmascota.php" class="btn-plus" id="add-pet-btn"><i class="fas fa-plus"></i></a>

</body>
</html>