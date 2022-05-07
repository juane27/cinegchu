<?php
require "conexion.php";

class clsLogin extends clsConexion
{
        //atributos
        public $user;
        public $pass;
        



        //constructores
        public function __construct()
        {
        }

        public static function constructorParametrosx(
        $user,
        $pass
           
        
        ){

            $l = new clsLogin();
            $l->user = $user;
            $l->pass = $pass;

            return $l;
        }
        

    //metodos

    public function loguear()
    {

        $dbh = $this->conectar();
        if ($dbh != null) {
            $user = $this->user;
            $pass = $this->pass;

            
            try {
                //1-preparar la consulta
                $consulta = $dbh->prepare("SELECT * FROM usuarios WHERE `user`='$user' AND `pass`='$pass'");
                //2-ejecutar la consulta.

                $consulta->execute();

                $estado = true;

                //3-Verificar si existe el registro y configurar session.
                if ($consulta->rowCount() == 1){

                    $row=$consulta->fetch(PDO::FETCH_ASSOC);
                                        
                    echo "Bienvenido ".$row['rol'];
                    
                    $rol=$row['rol'];
                    $id=$row['id'];
                    $user=$row['user'];
                    $pic=$row['pic'];
                    $nombre=$row['nombre'];
                    $email=$row['email'];
                    $pass= $row['pass'];
                    $apellido1=$row['apellido1'];
                    $apellido2=$row['apellido2'];
                    $_SESSION["login"]=true;
                    $_SESSION["rol"]=$rol;
                    $_SESSION["id"]=$id;
                    $_SESSION["user"]=$user;
                    $_SESSION["pass"]=$pass;
                    $_SESSION["pic"]=$pic;
                    $_SESSION["nombre"]=$nombre;
                    $_SESSION["email"]=$email;
                    $_SESSION["apellido1"]=$apellido1;
                    $_SESSION["apellido2"]=$apellido2;
                    header("Location: index.php");
                } 
                else { echo "<div class='p-3 mb-2 bg-success text-danger text-center'>Usuario o contraseña incorrectos. Intenta nuevamente.</div>";
            }
        }
             


            
         catch (PDOException $e) {
            $estado = false;
            echo "<div class='p-3 mb-2 bg-success text-danger text-center'>Usuario o contraseña incorrectos. Intenta nuevamente.</div>";

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











