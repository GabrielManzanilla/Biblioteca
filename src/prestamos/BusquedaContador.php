<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("../conexion.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $option = trim($_POST['optionFilter']);
    }

    if ($option == 'Usuarios') {
        $consulta = "SELECT 
        CONCAT(Usuarios.nombre, ' ', Usuarios.apellido_paterno, ' ', Usuarios.apellido_materno) AS nombre_usuario,
        GROUP_CONCAT(Libros.nombre_libro SEPARATOR ', ') AS libros_sacados,
        COUNT(Libros.id_libro) as cantidad_libros
    FROM 
        Prestamos
    JOIN 
        Libros ON Prestamos.fk_id_libro = Libros.id_libro
    JOIN 
        Usuarios ON Prestamos.fk_id_usuario = Usuarios.id_usuario
    GROUP BY 
        nombre_usuario;
    ";
    } elseif ($option == 'Libros') {
        $consulta = "SELECT 
        Libros.nombre_libro,
        COUNT(Prestamos.id_prestamo) AS veces_prestado
    FROM 
        Prestamos
    JOIN 
        Libros ON Prestamos.fk_id_libro = Libros.id_libro
    GROUP BY 
        Libros.nombre_libro;
    ";
    }

    $resultado = mysqli_query($enlace, $consulta);
    if (!$resultado) {
        echo "Error en la consulta";
    }
    ?>

    <h2>Filtro de cantidad para: <?php echo $option;?></h2>
    <table border=1>
        <thead>
            <tr>
                <th><?php echo $option ?> </th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($option == 'Libros') {
                while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                    $nombreLibro = $renglon['nombre_libro'];
                    $vecesPrestado = $renglon['veces_prestado'];
            ?>
                    <tr>
                        <td><?php echo $nombreLibro; ?></td>
                        <td><?php echo $vecesPrestado; ?></td>
                    </tr>
            <?php
                }
            }
            if ($option == 'Usuarios') {

                while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                    $nombreUsuario = $renglon['nombre_usuario'];
                    $librosSacados = $renglon['libros_sacados'];
                    $cant = $renglon['cantidad_libros']
            ?>
                    <tr>
                        <td><?php echo $nombreUsuario; ?></td>
                        <td><?php echo $librosSacados; ?></td>
                        <td><?php echo $cant; ?></td>
                    </tr>
            <?php
                }
            }
            
            ?>
        </tbody>
</body>

</html>