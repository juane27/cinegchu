<?php
require "conexion.php";
class clsUser extends clsConexion
{

    //atributos
    public $user;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $email;
    public $fecha_nac;
    public $telefono;
    public $pic;
    public $pass;



    //constructores
    public function __construct()
    {
       
    }

    public static function constructorParametro(
        $user,
        $nombre,
        $apellido1,
        $apellido2,
        $email,
        $fecha_nac,
        $telefono,
        $pic,
        $pass,
        $rol
    ) {
        $u = new clsUser();
        $u->user = $user;
        $u->nombre = $nombre;
        $u->apellido1 = $apellido1;
        $u->apellido2 = $apellido2;
        $u->email = $email;
        $u->fecha_nac = $fecha_nac;
        $u->telefono = $telefono;
        $u->pic = $pic;
        $u->pass = $pass;
        $u->rol = $rol;


        return $u;
    }


    // obtener peliculas
    public function get_user()
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT `user`, `user`, `nombre`, `apellido1`, `apellido2`, `email`, `fecha_nac`, `telefono`, `pic`, `pass`, `rol`  FROM `usuarios`");
        

        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsUser');
        $dbh = null;
        return $res;
        }

    }

}
?>
