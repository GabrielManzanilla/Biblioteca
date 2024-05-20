<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>
</head>

<body>
    <!-- Botón de salida -->
    <a href="clientealta.php" class="exit-btn">Salir</a>

    <div class="container">
        <?php
        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellidoPaterno']) >= 1 && strlen($_POST['apellidoMaterno']) >= 1 && strlen($_POST['curp']) >= 1 && strlen($_POST['domicilio']) >= 1 && strlen($_POST['municipio']) >= 1 && strlen($_POST["estado"]) >= 1 && strlen($_POST["fechaNacimiento"]) >= 1) {
            $nombre = trim($_POST['nombre']);
            $apellidoPaterno =trim($_POST['apellidoPaterno']);
            $apellidoMaterno = trim($_POST['apellidoMaterno']);
            $curp = trim($_POST['curp']);
            $domicilio = trim($_POST['domicilio']);
            $municipio = trim($_POST['municipio']);
            $estado = trim($_POST['estado']);
            $fechaNacimiento = trim($_POST['fechaNacimiento']);
            include ("../../index.php");
            $consulta = "INSERT INTO Usuarios (nombre, apellido_paterno, apellido_materno, curp, domicilio, municipio, estado, fecha_nacimiento)
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$curp','$domicilio', '$municipio','$estado','$fechaNacimineto')";
            $resultado = mysqli_query($enlace, $consulta);
            if ($resultado) {
                echo "<h2>Cliente creado exitosamente</h2>";
            } else {
                echo "<h2>Error al crear el cliente</h2>";
                echo "<p>" . mysqli_error($enlace) . "</p>";
            }
        } else {
            echo "<h2>Favor de introducir datos</h2>";
            echo "<p>Todos los campos son obligatorios</p>";
        }
        ?>
    </div>
</body>

</html>