<?php
require "conexion.php";
$target = "upload/"; 
class clsRegistro extends clsConexion
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

    public static function constructorParametros(
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
        $r = new clsRegistro();
        $r->user = $user;
        $r->nombre = $nombre;
        $r->apellido1 = $apellido1;
        $r->apellido2 = $apellido2;
        $r->email = $email;
        $r->fecha_nac = $fecha_nac;
        $r->telefono = $telefono;
        $r->pic = $pic;
        $r->pass = $pass;
        $r->rol = $rol;
        //var_dump($r);
        return $r;
    }

    //metodos

    public function insertar()
    {

        $dbh = $this->conectar();
        if ($dbh != null) {
            try {
                //1-preparar la consulta
                $consulta1 = $dbh->prepare("SELECT * FROM usuarios WHERE `user`='$this->user'");
                $consulta1->execute();
                if ($consulta1->rowCount() == 1){
                    echo "El usuario ya existe. Intenta elegiendo otro nombre de usuario.";
                }
                else{
                
                $consulta = $dbh->prepare("INSERT INTO usuarios(user, nombre, apellido1, apellido2, email, fecha_nac, telefono, pic, pass, rol) VALUES(:user, :nombre, :apellido1, :apellido2, :email, :fecha_nac, :telefono, :pic, :pass, :rol)");  

                //2-bind a los parametros
                $consulta->bindParam(":user", $this->user);
                $consulta->bindParam(":nombre", $this->nombre);
                $consulta->bindParam(":apellido1", $this->apellido1);
                $consulta->bindParam(":apellido2", $this->apellido2);
                $consulta->bindParam(":email", $this->email);
                $consulta->bindParam(":fecha_nac", $this->fecha_nac);
                $consulta->bindParam(":telefono", $this->telefono);
                $consulta->bindParam(":pic", $this->pic);
                $consulta->bindParam(":pass", $this->pass);
                $consulta->bindParam(":rol", $this->rol);
                $target = 'img/profile/';
                $target = $target . basename( $_FILES['pic']['name']);

                move_uploaded_file($_FILES['pic']['tmp_name'], $target);

                

                //3-ejecutar la consulta

                $consulta->execute();
                 

                }

                $estado = true;
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                echo "<strong>¡Enhorabuena!</strong> Te has registrado correctamente.";
                echo "<button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";
                
            } catch (PDOException $e) {
                $estado = false;
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                echo "<strong>Error.</strong> Alguno de los datos es incorrecto. Porfavor, verifica.";
                echo "<button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";

                //muestra el error
                
            } finally {
                //cerrar la conexion a la bd
                $dbh = null;
                return $estado;
                
            }
        }
    }
}
?>

