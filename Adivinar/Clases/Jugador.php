<?php
    class Jugador {
        
        public static function insertarJugador($jugador){
            $contenedor = "insert into jugador (nombre_jugador) values ('$jugador')";
            return $contenedor;
        }

        public static function insertarNumero($numero,$nombre){
            $contenedor = "update jugador set numero_elegido = '$numero' where nombre_jugador = '$nombre'";
            return $contenedor;
        }

        public static function getJugador(){
            $contenedor = "select * from jugador";
            return $contenedor;
        }

        public static function sumarPuntos($jugador,$puntos){
            $contenedor = "update jugador set puntos_jugador = '$puntos' where nombre_jugador = '$jugador'";
            return $contenedor;
        }

        public static function getPuntos($jugador){
            $contenedor = "select puntos_jugador from jugador where nombre_jugador = '$jugador'";
            return $contenedor;
        }

        public static function listadoPuntos(){
            $contenedor = "select nombre_jugador,puntos_jugador from jugador";
            return $contenedor;
        }
        
        public static function getGanador(){
            $contenedor = "select max(puntos_jugador) from jugador";
            return $contenedor;
        }

    }
?>