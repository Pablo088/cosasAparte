<?php
    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");

    $BD = new BD();

    $listadoJugador = Jugador::listadoPuntos();
    $ejecutar = $BD -> Ejecutar($listadoJugador);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Puntos</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand mx-4">Adivina</a>
        <div class="me-auto">
            <a href="/Adivina/pagina_puntos.php"><button class="btn btn-outline-light">Tabla de Puntos</button></a>
        </div>
    </nav>

    <div class="m-5" style="display: flex; justify-content: center;align-items: center;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table table-primary">
                    <th>Jugador</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($ejecutar as $listado){ 
                    $nombre = $listado["nombre_jugador"];
                    $puntos = $listado["SUM(puntos_jugador)"];
                ?>
                <tr class="table table-info">
                    <td><?php echo  $nombre ?></td>
                    <td><?php echo $puntos ?></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
    <a href="/Adivina/pagina_adivina.php?sumar = 1"><button>Volver al juego</button></a>
</body>
</html>