<?php 

    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");

    $BD = new BD();

    $contenedorParametro = Parametros::getParametro();
    $ejecutar = $BD -> Ejecutar($contenedorParametro);
    $parametro = $ejecutar -> fetch_assoc();

    if(isset($_POST["enviar"])){
        $borrarParametro = Parametros::eliminarParametro();
        $ejecutarConsulta = $BD -> Ejecutar($borrarParametro);

        $borrarPuntos = Parametros::eliminarPuntos();
        $ejecutar = $BD -> Ejecutar($borrarPuntos);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Inicio</title>
</head>
<body style="background-image: url('/documentacion/imagen/imagen_de_fondo.jpg') ;background-repeat: no-repeat;  background-position: center top; background-size: cover ;max-width: 50%; max-height: 50%; ">
    <h1>Establece la cantidad de jugadores y puntos para comenzar a jugar</h1>
    <form action="pagina_jugadores.php" method="post">
        <input type="number" name="cantidad" value="<?php echo $parametro["cantidad_jugadores"] ?>" min="2" max="10" placeholder="Cantidad de Jugadores">
        <input type="number" name="rondas" value="<?php echo $parametro["rondas"] ?>" min="1" placeholder="Cantidad de Rondas">
        <button type="submit" name="enviar">Siguiente</button>
    </form>
</body>
</html>