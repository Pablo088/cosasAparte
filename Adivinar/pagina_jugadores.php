<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinar</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body style="background-image: url('/documentacion/imagen/imagen_de_fondo.jpg') ;background-repeat: no-repeat;  background-position: center top; background-size: cover ;max-width: 5%; max-height: 5%; ">
    <h1>Ingresen sus nombres</h1>

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
            ?> 
                <form action="configuracion.php" method="post">
                    <?php
                    for($i = 0; $i < $cantidad_jugadores; $i++){
                        ?>
                           <input type="text" placeholder="Jugador <?php echo $i ?>" name="nombre[]" value=""> 
                        <?php
                    }
                    ?>   
                    <button type="submit" name="enviar" class="">Enviar</button>
                </form>
            <?php
            
        }else{
                ?> <script>alert("Hay un campo vacío. Asegurense de llenarlos todos.");
                            location.href = 'pagina_principal.php';
                    </script>
                <?php
            }
    }
    ?>
</body>
</html>