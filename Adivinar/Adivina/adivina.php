<?php
     require_once("C:\laragon\www\Adivinar\BD\conexion.php");
     require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");
     require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");

     $BD = new BD();

     $pagina1 = ' 
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
                 <a href="/Adivina/pagina_puntos.php"><button class="btn btn-outline-info">Tabla de Puntos</button></a>
           </div>
        </nav>';
     echo $pagina1;             

     if(isset($_POST["enviar"])){
        if(!empty($_POST["numero"] && $_POST["nombre"] && $_POST["rondaActual"] && $_POST["numeroRandom"])){

            $puntosAdivino = 2;
            $puntosNoAdivino = -1;

            $numero = $_POST["numero"];
            $nombre = $_POST["nombre"];
            $numeroRandom = $_POST["numeroRandom"];

            $rondaActual = $_POST["rondaActual"];
            $rondaJuego = intval($rondaActual);
            $insertarRonda = Parametros::cambiarRonda($rondaJuego);
            $ejecutar = $BD -> Ejecutar($insertarRonda);

            for($i = 0; $i < count($numero); $i++){
               $contenedorEleccion = Jugador::insertarNumero($numero[$i],$nombre[$i],$numeroRandom);
               $ejecutarEleccion = $BD -> Ejecutar($contenedorEleccion);
            }

            $getAdivino = Jugador::getAdivino();
            $ejecutarAdivino = $BD -> Ejecutar($getAdivino);

            $getNoAdivino = Jugador::getNoAdivino();
            $ejecutarNoAdivino = $BD -> Ejecutar($getNoAdivino);

         $pagina2=' 
            <h1>El numero era  '.$numeroRandom.' </h1>
            <a href="/Adivina/pagina_adivina.php?"><button>Volver al juego</button></a>';
         echo $pagina2; 

         $pagina3='
                  <div class="m-5" style="display: flex; justify-content: center;align-items: center;">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr class="table table-primary">
                           <th>Jugador</th>
                           <th>Puntos en esta ronda</th>
                        </tr>
                     </thead>';    
         echo  $pagina3;  

               foreach($ejecutarAdivino as $adivino){
                        if($adivino !== null){
                                 $nombreJugador = $adivino["nombre_jugador"];
                                 $puntosEnRonda = $adivino["puntos_jugador"] + $puntosAdivino;
               
                                 $contenedorSuma = Jugador::sumarPuntos($nombreJugador,$puntosEnRonda);
                                 $ejecutarSuma = $BD -> Ejecutar($contenedorSuma);
               
                                    if($ejecutarSuma){    
                                       $pagina4 ='
                                          <tbody>
                                             <tr class="table table-success">
                                                <td>  '.$nombreJugador.' </td>
                                                <td> '.$puntosAdivino.' </td>
                                             </tr>
                                          </tbody>';
                                       echo $pagina4;
                                    }          
                           }
               }

               foreach($ejecutarNoAdivino as $noAdivino){
                        if($noAdivino !== null){
               
                                 $nombreJugador = $noAdivino["nombre_jugador"];
                                 $puntosEnRonda = $noAdivino["puntos_jugador"] + $puntosNoAdivino;
               
                                 $contenedorSuma = Jugador::sumarPuntos($nombreJugador,$puntosEnRonda);
                                 $ejecutarSuma = $BD -> Ejecutar($contenedorSuma);

                                    if($ejecutar){
                                       $pagina5 ='
                                          <tbody>
                                             <tr class="table table-danger">
                                                <td> '.$nombreJugador.' </td>
                                                <td> '.$puntosNoAdivino.' </td>
                                             </tr>
                                          </tbody>';
                                       echo $pagina5;
                                    }
                        }
               }

         $pagina6 ='  
         </table>    
         </div>';
         echo $pagina6;       
      }else{
         $pagina7 ='
          <script>
            alert("Todos tienen que ingresar un numero");
            location.href = "pagina_adivina.php";
          </script>';
          echo $pagina7;
       }
   }else{
      $pagina8 ='
      <script>
        alert("Algo pasó");
        location.href = "pagina_adivina.php";
      </script>';
      echo $pagina8;
   }   
   
       $pagina9='
       </body>
       </html>';
       echo $pagina9;
?>