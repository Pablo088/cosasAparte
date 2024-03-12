<?php
    class Parametros {
        public static function insertarParametro($cantidad,$rondaEnJuego,$rondas,$numerosAdivinar){
            $contenedor = "insert into parametros (cantidad_jugadores,ronda_en_juego,rondas,numeros_adivinar) values('$cantidad','$rondaEnJuego','$rondas','$numerosAdivinar')";
            return $contenedor;
        }
        public static function getParametro(){
            $contenedor = "select * from parametros";
            return $contenedor;
        }
        public static function cambiarRonda($ronda){
            $contenedor = "update parametros set ronda_en_juego = '$ronda'";
            return $contenedor;
        }
        public static function eliminarParametro(){
            $contenedor = "delete from parametros";
            return $contenedor;
        }
        public static function eliminarPuntos(){
            $contenedor = "delete from jugador";
            return $contenedor;
        }
    }
?>