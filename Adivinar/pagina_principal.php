<?php 

    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");

    $BD = new BD();
    
    $borrarParametro = Parametros::eliminarParametro();
    $ejecutarConsulta = $BD -> Ejecutar($borrarParametro);

    $borrarPuntos = Parametros::eliminarPuntos();
    $ejecutar = $BD -> Ejecutar($borrarPuntos);

        $pagina = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
            <title>Inicio</title>
        </head>
        <body>
            <h1>Establece la cantidad de jugadores, rondas y numeros a adivinar para comenzar a jugar</h1>
            <form action="pagina_jugadores.php" method="post">
                <input type="number" name="cantidad" value="" min="1" max="10" placeholder="Cantidad de Jugadores">
                <input type="number" name="rondas" value="" min="1" placeholder="Cantidad de Rondas">
                <input type="number" name="numeros_adivinar" value="" min="2" placeholder="Cantidad a adivinar">
                <button type="submit" name="enviar">Siguiente</button>
            </form>
        </body>
        </html>';
        echo $pagina;
?>