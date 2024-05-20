<!DOCTYPE html>
<html>
<head>
    <title>Ver Clientes</title>
</head>
<body>
    <h2>Libros</h2>

    <?php
    include("../../conexion.php");
    $libro = "SELECT * FROM Libros";
    $resultado = mysqli_query($enlace, $libro);

    if (!$resultado) {
        echo "Error en la consulta";
    }
    ?>

    <table>
        <thead>
            <tr>            
                <th>Id</th>                
                <th>Nombre </th>   
                <th>Editorial</th>                
                <th>Autor</th>                             
                <th>Genero</th > 
                <th>Domicilio</th > 
                <th>Pais Autor</th > 
                <th>No. Paginas</th > 
                <th>Año Edicion</th > 
                <th>Precio</th >                          
            </tr>
        </thead>
        <tbody>
            <?php
            while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                $id = $renglon['id_libro'];
                $nombre = $renglon['nombre'];
                $editorial = $renglon['editorial'];
                $autor = $renglon['autor'];
                $genero = $renglon['genero'];
                $paisAutor = $renglon['pais_autor'];
                $numeroPaginas = $renglon['numero_paginas'];
                $anioEdicion = $renglon['anio_edicion'];
                $precio = $renglon['precio'];
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $editorial; ?></td>
                    <td><?php echo $autor; ?></td>
                    <td><?php echo $genero; ?></td>
                    <td><?php echo $paisAutor; ?></td>
                    <td><?php echo $anioEdicion; ?></td>
                    <td><?php echo $precio; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>