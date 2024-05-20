<!DOCTYPE html>
<html>
<head>
    <title>Ver Clientes</title>
</head>
<body>
    <h2>Clientes</h2>

    <?php
    include("../../conexion.php");
    $usuario = "SELECT * FROM Usuarios";
    $resultado = mysqli_query($enlace, $usuario);

    if (!$resultado) {
        echo "Error en la consulta";
    }
    ?>

    <table>
        <thead>
            <tr>            
                <th>Id</th>                
                <th>Nombre </th>   
                <th>Apellido Paterno </th>                
                <th>Apellido Materno</th>                             
                <th>Curp</th > 
                <th>Domicilio</th > 
                <th>Municipio</th > 
                <th>Estado</th > 
                <th>Fecha Nacimiento</th >                          
            </tr>
        </thead>
        <tbody>
            <?php
            while ($renglon = $resultado->fetch_array(MYSQLI_ASSOC)) {
                $id = $renglon['id_usuario'];
                $nombre = $renglon['nombre'];
                $apellidoPaterno = $renglon['apellido_paterno'];
                $apellidoMaterno = $renglon['apellido_materno'];
                $curp = $renglon['curp'];
                $domicilio = $renglon['domicilio'];
                $municipio = $renglon['municipio'];
                $estado = $renglon['estado'];
                $fechaNacimiento = $renglon['fecha_nacimiento'];
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $apellidoPaterno; ?></td>
                    <td><?php echo $apellidoMaterno; ?></td>
                    <td><?php echo $curp; ?></td>
                    <td><?php echo $domicilio; ?></td>
                    <td><?php echo $municipio; ?></td>
                    <td><?php echo $estado; ?></td>
                    <td><?php echo $fechaNacimiento; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>