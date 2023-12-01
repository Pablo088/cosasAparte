<?php
    class Jugador {

        public $nombreJugador;

        public function __construct($nombreJugador){
            $this->nombreJugador = $nombreJugador;
        }
        
        public static function insertarJugador($jugador){
            $contenedor = "insert into jugadores (nombre_jugador) values ('$jugador')";
            return $contenedor;
        }

        public static function insertarPuntos($jugador,$puntos){
            $contenedor = "INSERT INTO puntos (nombre_jugador,puntos_jugador) values ('$jugador','$puntos')";
            return $contenedor;
        }

        public static function listadoPuntos(){
            $contenedor = "select nombre_jugador,SUM(puntos_jugador) from puntos group by (nombre_jugador)";
            return $contenedor;
        }
    }
?>