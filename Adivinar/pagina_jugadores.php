<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinar</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Ingresen sus nombres</h1>

    <?php

    require_once("C:\laragon\www\Adivinar\BD\conexion.php");
    require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");
    require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");

    $BD = new BD();

    if(isset($_POST["enviar"])){
        if(!empty($_POST["cantidad"] && $_POST["rondas"] && $_POST["numeros_adivinar"])){

            $cantidad_jugadores = $_POST["cantidad"];
            $rondas = $_POST["rondas"];
            $numerosAdivinar = $_POST["numeros_adivinar"];
            $rondaEnJuego = 1;

            $contenedorParametro = Parametros::insertarParametro($cantidad_jugadores,$rondaEnJuego,$rondas,$numerosAdivinar);
            $ejecutar = $BD -> Ejecutar($contenedorParametro);
         
            $pagina1 =' <form action="configuracion.php" method="post">';
            echo $pagina1;

                    for($i = 0; $i < $cantidad_jugadores; $i++){
                    
                     $pagina2 = '<input type="text" placeholder="Jugador '. $i .'" name="nombre[]" value="">';
                     echo $pagina2; 
                    }   
                    $pagina3 =' 
                    <button type="submit" name="enviar" class="">Enviar</button>
                    </form>';
                    echo $pagina3;
        }else{
            $pagina4 = '  
            <script>alert("Hay un campo vacío. Asegurense de llenarlos todos.");
                    location.href = "pagina_principal.php";
            </script>';
               
            }
    }
    ?>
</body>
</html>