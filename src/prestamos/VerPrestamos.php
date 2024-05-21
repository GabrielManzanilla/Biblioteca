<!DOCTYPE html>
<html>
<head>
    <title>Ver Clientes</title>
</head>
<body>
    
    <h2>Libros</h2>

    <?php
    include("../conexion.php");
    $libro = 
    "SELECT 
        Prestamos.id_prestamo,
        Libros.nombre_libro,
        CONCAT(Usuarios.nombre, ' ', Usuarios.apellido_paterno, ' ', Usuarios.apellido_materno) AS nombre_usuario,
        Prestamos.fecha_salida,
        Prestamos.fecha_max_devolucion,
        Prestamos.fecha_devolucion
    FROM 
        Prestamos
    JOIN 
        Libros ON Prestamos.fk_id_libro = Libros.id_libro
    JOIN 
        Usuarios ON Prestamos.fk_id_usuario = Usuarios.id_usuario;
    ";

    $resultado = mysqli_query($enlace, $libro);

    if (!$resultado) {
        echo "Error en la consulta";
    }
    ?>

    <table>
        <thead>
            <tr>            
                <th>Id Prestamo</th>                
                <th>Libro</th>   
                <th>Usuario</th>                
                <th>Fecha Salida</th>                             
                <th>F. Max Devolucion</th > 
                <th>F. Devolucion</th >                      
            </tr>
        </thead>
        <tbody>
            <?php
            while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                $id = $renglon['id_prestamo'];
                $nombreLibro = $renglon['nombre_libro'];
                $nombreUsuario = $renglon['nombre_usuario'];
                $fechaSalida = $renglon['fecha_salida'];
                $fechaMaxDevolucion = $renglon['fecha_max_devolucion'];
                $fechaDevolucion = $renglon['fecha_devolucion'];
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombreLibro; ?></td>
                    <td><?php echo $nombreUsuario; ?></td>
                    <td><?php echo $fechaSalida; ?></td>
                    <td><?php echo $fechaMaxDevolucion; ?></td>
                    <td><?php echo $fechaDevolucion; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>