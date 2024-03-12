<?php
    class Jugador {
        
        public static function insertarJugador($jugador){
            $contenedor = "insert into jugador (nombre_jugador) values ('$jugador')";
            return $contenedor;
        }

        public static function insertarNumero($numero,$nombre,$generado){
            $contenedor = "update jugador set numero_elegido = '$numero', numero_generado = '$generado' where nombre_jugador = '$nombre'";
            return $contenedor;
        }

        public static function getJugador(){
            $contenedor = "select * from jugador";
            return $contenedor;
        }

        public static function getAdivino(){
            $contenedor = "select nombre_jugador,puntos_jugador from jugador where numero_elegido = numero_generado";
            return $contenedor;
        }

        public static function getNoAdivino(){
            $contenedor = "select nombre_jugador,puntos_jugador from jugador where numero_elegido != numero_generado";
            return $contenedor;
        }

        public static function sumarPuntos($jugador,$puntos){
            $contenedor = "update jugador set puntos_jugador = '$puntos' where nombre_jugador = '$jugador'";
            return $contenedor;
        }

        public static function listadoPuntos(){
            $contenedor = "select nombre_jugador, puntos_jugador FROM jugador ORDER BY puntos_jugador DESC ";
            return $contenedor;
        }
        
        public static function getGanador(){
            $contenedor = "select nombre_jugador,puntos_jugador from jugador WHERE puntos_jugador = (SELECT MAX(puntos_jugador) FROM jugador)";
            return $contenedor;
        }

    }
?>