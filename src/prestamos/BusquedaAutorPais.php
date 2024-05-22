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
        if (strlen($_POST['nombrePais']) >= 1) {
            $tipo = trim($_POST['optionPais']);
            $pais = trim($_POST['nombrePais']);
        }
    }

    if ($tipo == 'igual') {
        $consulta = "SELECT 
            Prestamos.id_prestamo,
            Libros.nombre_libro,
            Libros.autor,
            Libros.pais_autor,
            Prestamos.fecha_salida,
            Prestamos.fecha_max_devolucion,
            Prestamos.fecha_devolucion
        FROM 
            Prestamos
        JOIN 
            Libros ON Prestamos.fk_id_libro = Libros.id_libro
        WHERE 
            Libros.pais_autor = '$pais';
        ";
    } elseif ($tipo == 'diferente') {
        $consulta = "SELECT 
            Prestamos.id_prestamo,
            Libros.nombre_libro,
            Libros.autor,
            Libros.pais_autor,
            Prestamos.fecha_salida,
            Prestamos.fecha_max_devolucion,
            Prestamos.fecha_devolucion
        FROM 
            Prestamos
        JOIN 
            Libros ON Prestamos.fk_id_libro = Libros.id_libro
        WHERE 
            Libros.pais_autor != '$pais';
        ";
    }
    $resultado= mysqli_query($enlace, $consulta);
    if (!$resultado) {
        echo "Error en la consulta";
    }
    else {
        if (mysqli_num_rows($resultado) == 0) {
            echo "No se encontraron coincidencias.";
        } else {
    ?>

    <h2>Libros cuyo Pais de su Autor son <?php echo $tipo;?> a <?php echo $pais;?></h2>
    <table border=1>
        <thead>
            <tr>
                <th>Id Prestamo</th>
                <th>Libro</th>
                <th>Autor</th>
                <th>Fecha Salida</th>
                <th>F. Max Devolucion</th>
                <th>F. Devolucion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                $id = $renglon['id_prestamo'];
                $nombreLibro = $renglon['nombre_libro'];
                $autor = $renglon['autor'];
                $fechaSalida = $renglon['fecha_salida'];
                $fechaMaxDevolucion = $renglon['fecha_max_devolucion'];
                $fechaDevolucion = $renglon['fecha_devolucion'];
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombreLibro; ?></td>
                    <td><?php echo $autor; ?></td>
                    <td><?php echo $fechaSalida; ?></td>
                    <td><?php echo $fechaMaxDevolucion; ?></td>
                    <td><?php echo $fechaDevolucion; ?></td>
                </tr>
            <?php
            }
        }
    }
            ?>
        </tbody>
</body>

</html>