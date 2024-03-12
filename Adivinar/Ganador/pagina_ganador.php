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

    if(isset($_POST["enviar"])){
        if(!empty($_POST["numero"] && $_POST["nombre"] && $_POST["rondaActual"] && $_POST["numeroRandom"])){
            
            $numero = $_POST["numero"];
            $nombre = $_POST["nombre"];
            $numeroRandom = $_POST["numeroRandom"];
            $puntosAdivino = 2;
            $puntosNoAdivino = -1;

            for($i = 0; $i < count($numero); $i++){
                $contenedorEleccion = Jugador::insertarNumero($numero[$i],$nombre[$i],$numeroRandom);
                $ejecutarEleccion = $BD -> Ejecutar($contenedorEleccion);
             }

            $getAdivino = Jugador::getAdivino();
            $ejecutarAdivino = $BD -> Ejecutar($getAdivino);

            $getNoAdivino = Jugador::getNoAdivino();
            $ejecutarNoAdivino = $BD -> Ejecutar($getNoAdivino);

            foreach($ejecutarAdivino as $adivino){
                if($adivino !== null){
                         $nombreJugador = $adivino["nombre_jugador"];
                         $puntosEnRonda = $adivino["puntos_jugador"] + $puntosAdivino;
       
                         $contenedorSuma = Jugador::sumarPuntos($nombreJugador,$puntosEnRonda);
                         $ejecutarSuma = $BD -> Ejecutar($contenedorSuma);
                }
            }

            foreach($ejecutarNoAdivino as $noAdivino){
                if($noAdivino !== null){
       
                         $nombreJugador = $noAdivino["nombre_jugador"];
                         $puntosEnRonda = $noAdivino["puntos_jugador"] + $puntosNoAdivino;
       
                         $contenedorSuma = Jugador::sumarPuntos($nombreJugador,$puntosEnRonda);
                         $ejecutarSuma = $BD -> Ejecutar($contenedorSuma);
                }
            }

            $contenedorGanador = Jugador::getGanador();
            $ejecutarConsulta = $BD -> Ejecutar($contenedorGanador);
            $ganadorPuntos = $ejecutarConsulta -> fetch_assoc();
        
            $nombreJugador = $ganadorPuntos["nombre_jugador"];
            $puntosJugador = $ganadorPuntos["puntos_jugador"];

            $getPuntos = Jugador::listadoPuntos();
            $ejecutar = $BD -> Ejecutar($getPuntos);

        if($ganadorPuntos !== null){
        $pagina1='
            <h3>¡<?php echo $nombreJugador ?> es el ganador con un total de <?php echo $puntosJugador ?> puntos!</h3>';
        echo $pagina1;
         }
        $pagina2 = '
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
            <tbody>';
        echo $pagina2;

                foreach($ejecutar as $listado){ 
                    $nombre = $listado["nombre_jugador"];
                    $puntos = $listado["puntos_jugador"];
                    $pagina3 = '
                        <tr class="table table-info">
                            <td><?php echo  $nombre ?></td>
                            <td><?php echo $puntos ?></td>
                        </tr>';  
                    echo $pagina3;   
                }
        $pagina4 = '       
            </tbody>
        </table>
    </div>'; 
        echo $pagina4;        
 
        }
    }
?>