<?php
    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");

    $BD = new BD();

    if(isset($_POST["enviar"])){
        if(!empty($_POST["cantidad"]) && !empty($_POST["rondas"])){
            $cantidad_jugadores = $_POST["cantidad"];
            $rondas = $_POST["rondas"];
            $rondaEnJuego = 1;

            $contenedorParametro = Parametros::insertarParametro($cantidad_jugadores,$rondaEnJuego,$rondas);
            $ejecutar = $BD -> Ejecutar($contenedorParametro);

            if($ejecutar){
                ?> <script>alert("A Adivinar");
                location.href = '/Adivina/pagina_adivina.php';</script> <?php
            } else {
                ?> <script>alert("Ocurrio un error");
                location.href = 'pagina_principal.php';</script> <?php
            }
        }
    }
?>