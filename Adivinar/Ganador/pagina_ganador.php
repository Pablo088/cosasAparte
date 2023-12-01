<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Felicidades</title>
</head>
<body>

</body>
</html>

<?php
    require_once("../../Adivinar/BD/conexion.php");
    require_once("../../Adivinar/Clases/Jugador.php");
    require_once("../../Adivinar/Clases/Parametros.php");

    $BD = new BD();

    $getPuntos = Jugador::listadoPuntos();
    $ejecutar = $BD -> Ejecutar($getPuntos);

    foreach($ejecutar as $ganador){
        $puntos = intval($ganador["SUM(puntos_jugador)"]);
        $puntosJugadores = [$puntos];
        
        $puntosGanador = max($puntosJugadores);
        echo $puntosGanador;
        if($ganador["SUM(puntos_jugador)"] == $puntosGanador){
            $nombreJugador = $ganador["nombre_jugador"];
            $puntosJugador = $puntosGanador;
        }
    }
    
    ?>
        <h3>¡El jugador <?php echo $nombreJugador ?> es el ganador con un total de <?php echo $puntosJugador ?> puntos!</h3>
        <form action="/pagina_principal.php" method="post">
            <button type="submit" name="enviar">Volver a Inicio</button></a>
        </form>  

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
    <?php 
    
?>