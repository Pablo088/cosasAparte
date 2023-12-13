<?php
    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");
    require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");

    $BD = new BD();

    $getParametro = Parametros::getParametro();
    $ejecutar = $BD -> Ejecutar($getParametro);
    $parametro = $ejecutar -> fetch_assoc();

    $rondaEnJuego = $parametro["ronda_en_juego"];
    $rondas = $parametro["rondas"];

    $sumar = 1;
    $rondaActual = $rondaEnJuego + $sumar;

    $getJugador = Jugador::getJugador();
    $contenedorJugador = $BD -> Ejecutar($getJugador);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Adivina</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand mx-4">Adivina</a>
        <div class="me-auto">
            <a href="/Adivina/pagina_puntos.php"><button class="btn btn-outline-info">Tabla de Puntos</button></a>
        </div>
    </nav>
    <h1>Escojan un numero del 1 al 2</h1>
    <h3 id="contenedorRondas">Ronda <?php echo $rondaEnJuego ?> </h3>
    <?php if($rondaEnJuego < $rondas){ ?>

    <form action="adivina.php" method="post">
        <?php
            foreach($contenedorJugador as $jugador){
                
        ?> 
                <h3><?php echo $jugador["nombre_jugador"] ?></h3>
                <input type="number" name="numero[]" value="">
                <input type="hidden" name="nombre[]" value="<?php echo $jugador['nombre_jugador'] ?>">
        <?php
            } 
        ?>
        <input type="hidden" name="rondaActual" value="<?php echo $rondaActual ?>">
       <button type="submit" name="enviar">Enviar</button>
    </form>
    <a href="/Ganador/pagina_ganador.php"><button type="button"> Terminar Juego</button></a>
   <?php }else if($rondaEnJuego == $rondas){ ?>

    <form action="/Ganador/pagina_ganador.php" method="post">
        <h3>¡Ultima Ronda!</h3>
        <?php
            foreach($contenedorJugador as $jugador){
                
        ?> 
                <h3><?php echo $jugador["nombre_jugador"] ?></h3>
                <input type="number" name="numero[]" value="">
                <input type="hidden" name="nombre[]" value="<?php echo $jugador["nombre_jugador"] ?>">
        <?php
            } 
        ?>
        <input type="hidden" name="rondaActual" value="<?php echo $rondaActual ?>">
       <button type="submit" name="enviar">Enviar</button>
    </form>
        <?php   } ?>
</body>
</html>