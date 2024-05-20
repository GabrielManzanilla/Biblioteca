<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta a clientes</title>

</head>
<body>
    <div class="main-content">

        <div class="form-container">
            <form  id="altaClienteForm" action="ClientesAltaBD.php" method="post">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="apellidoPaterno">Apellido Paterno:</label><br>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno"><br>
                <label for="apellidoMaterno">Apellido Materno:</label><br>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno"><br>
                <label for="curp">CURP:</label><br>
                <input type="text" id="curp" name="curp"><br>
                <label for="domicilio">Domicilio:</label><br>
                <input type="text" id="domicilio" name="domicilio"><br>
                <label for="municipio">Municipio:</label><br>
                <input type="text" id="municipio" name="municipio"><br>
                <input type="submit" value="Guardar">
            </form>
        </div>

    <script>
        document.getElementById('altaClienteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar que el formulario se envíe normalmente
            var formData = new FormData(this);

            // Enviar los datos del formulario usando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'ClientesAltaBD.php', true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Mostrar el mensaje de éxito
                    alert('Cliente creado exitosamente');
                    // Actualizar la página
                    window.location.href = 'AltaUsuarios.php';
                } else {
                    // Manejar errores si es necesario
                    alert('Error al crear el cliente');
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>