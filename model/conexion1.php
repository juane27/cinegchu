<?php 
    class clsConexion1
    {
        protected function conectar()
        {
            $server = "localhost";
            $db = "cinemax";
            $usr = "root";
            $pass = "root";
    
            try {
                //1-definir la cadena de conexion
                $con_string = "mysql:host=$server;dbname=$db";
                //2-instanciar el objeto PDO
                $dbh1 = new PDO($con_string, $usr, $pass);
                //echo "Conexion exitosa";
                return $dbh1;
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos";
                //muestra el error
                echo $e->getMessage();
                return null;
            }
        }
    }



?>
