<?php
    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");

    $BD = new BD();

    if(isset($_POST["enviar"])){
        if(!empty($_POST["nombre"])){
            $nombreJugador = $_POST["nombre"];

            foreach($nombreJugador as $nombre){
                $contenedorInsertar = Jugador::insertarJugador($nombre);
                $ejecutar = $BD -> Ejecutar($contenedorInsertar);
            }

            if($ejecutar){
                ?> <script>alert("¡A Adivinar!");
                location.href = '/Adivina/pagina_adivina.php';</script> <?php
            } else {
                ?> <script>alert("Ocurrio un error");
                location.href = 'pagina_principal.php';</script> <?php
            }
        }else{
            ?> <script>alert("Hay que ingresar los nombres de todos los jugadores");
                        location.href = 'pagina_jugadores.php';
                </script>
            <?php
        }
    }
?>