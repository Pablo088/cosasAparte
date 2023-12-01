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
            <a href="../pagina_principal.php"><button class="btn btn-outline-info">Inicio</button></a>
            <a href="/Adivina/pagina_puntos.php"><button class="btn btn-outline-info">Tabla de Puntos</button></a>
        </div>
    </nav>
</body>
</html>
<?php
     require_once("C:\laragon\www\Adivinar\BD\conexion.php");
     require_once("C:\laragon\www\Adivinar\Clases\Jugador.php");
     require_once("C:\laragon\www\Adivinar\Clases\Parametros.php");

     $BD = new BD();
     $numeroRandom = rand(1,2);
     ?> 
     <h1>El numero era <?php echo $numeroRandom ?></h1>
     <a href="/Adivina/pagina_adivina.php"><button>Volver al juego</button></a>
     <?php

     if(isset($_POST["enviar"])){
        if(!empty($_POST["numero"]) && !empty($_POST["cantidad"]) && !empty($_POST["rondaActual"])){
            $cantidad = $_POST["cantidad"];
            $numeros = $_POST["numero"];
            $rondaActual = $_POST["rondaActual"];
            $rondaJuego = intval($rondaActual);

            $insertarRonda = Parametros::cambiarRonda($rondaJuego);
            $ejecutar = $BD -> Ejecutar($insertarRonda);

            $adivino = array();
            $noAdivino = array();
            $puntosAdivino = 3;
            $puntosNoAdivino = -1;

            for($i = 0; $i < count($numeros); $i++){
               if($numeros[$i] == $numeroRandom){
                  $adivino[] = $i;
                  $cantidadAcertado = count($adivino);
               } else if($numeros[$i] !== $numeroRandom){
                  $noAdivino[] = $i;
                  $cantidadNoAcertado = count($noAdivino);
               }
            }
      ?>
      <div class="m-5" style="display: flex; justify-content: center;align-items: center;">
         <table class="table table-bordered table-hover">
            <thead>
               <tr class="table table-primary">
                  <th>Jugador</th>
                  <th>Puntos en esta ronda</th>
               </tr>
            </thead>

         <?php 

            foreach($adivino as $acerto){
            if($acerto !== null){
               $contenedorPuntos = Jugador::insertarPuntos($acerto,$puntosAdivino);
               $ejecutar = $BD->Ejecutar($contenedorPuntos);
                  ?>
                     <tbody>
                        <tr class="table table-success">
                           <td><?php echo  $acerto ?></td>
                           <td><?php echo $puntosAdivino ?></td>
                        </tr>
                     </tbody>
                  <?php
            }                 
            }

            foreach($noAdivino as $noAcerto){
               if($noAcerto !== null){
                  $contenedorPuntos = Jugador::insertarPuntos($noAcerto,$puntosNoAdivino);
                  $ejecutar = $BD->Ejecutar($contenedorPuntos);

                     if($ejecutar){
                        ?>
                           <tbody>
                              <tr class="table table-danger">
                                 <td><?php echo  $noAcerto ?></td>
                                 <td><?php echo $puntosNoAdivino ?></td>
                              </tr>
                           </tbody>
                        <?php
                     }
               }    
                  
            }

         ?>   
         </table>         
         </div>
         <?php 
          }       
       }
    
?>