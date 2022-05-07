<?php

class clsSalas extends clsConexion
{
    //atributos
    public $asiento;
    public $disponibilidad;

    //constructores
    public function __construct()
    {
        
    }

    public static function constructorParametrox(
        $asiento,
        $disponibilidad
    ) {
        $a = new clsSalas();
        $a->asiento = $asiento;
        $a->disponibilidad = $disponibilidad;


        return $a;
    }

    // obtener asientos de salas
    public function get_room()
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT `asiento`,`asiento`, `disponibilidad` FROM `sala`");
        
        
        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsSalas');
        $dbh = null;
        return $res;
        }

    }
}