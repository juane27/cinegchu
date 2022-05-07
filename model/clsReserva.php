<?php
require "conexion.php";
class clsReserva extends clsConexion
{

    //atributos
    public $asiento;
    public $estado;
    public $fecha;
    public $hora;




    //constructores
    public function __construct()
    {
       
    }

    public static function constructorParametro(
        $asiento,
        $estado,
        $fecha,
        $hora

    ) {
        $a = new clsReserva();
        $a->asiento = $asiento;
        $a->estado = $estado;
        $a->fecha = $fecha;
        $a->hora = $hora;


        return $a;
    }


    // obtener peliculas
    public function get_asi($fecha, $hora, $pelicula)
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT `asiento`,`asiento`,`estado` FROM `reserva` WHERE `fecha`='$fecha' AND `hora`='$hora' AND `pelicula`='$pelicula'");
        

        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsReserva');
        $dbh = null;
        return $res;
        }

    }

}
?>