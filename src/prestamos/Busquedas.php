<!-- Libros sacados en un mes
    Veces que se presto cada libro
    Autores del libro /igual a o diferente de
    Veces que hizo prestamos un usuario
    -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research</title>
</head>
<body>
    <div>
        <h2>Realizar Busqueda</h2>
        <div>
            <form action="BusquedaMes.php" method="post">
                <label>"Buscar los libros sacados en el mes: "</label><br>
                <select name="mes" id="mes">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <input type="submit" value="Solicitar">
            </form>
        </div>
        <div>
            <form action="BusquedaContador.php" method="post">
                <label for="">Filtrar Prestamos por: </label><br>
                <label for="">
                    Usuarios
                    <input type="radio" name="optionFilter" id="" value="Usuarios">
                    <input type="radio" name="optionFilter" id="" value="Libros">
                    Libros
                </label><br>
                <input type="submit" value="Solicitar">
            </form>
        </div>
        <div>
            <form action="BusquedaAutorPais.php" method="POST">
                <label for="">Filtrar Libros por el Pais del Autor : </label><br>
                <label>
                    Igual a
                    <input type="radio" name='optionPais' id="" value="igual">
                    <input type="radio" name='optionPais' id="" value="diferente">
                    Diferentes de
                </label><br>
                <input type="text" name="nombrePais" id="nombrePais" placeholder="Nombre del pais">
                <input type="submit" value="Solicitar">
            </form>
        </div>
    </div>
</body>
</html>