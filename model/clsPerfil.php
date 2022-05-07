<?php
require "conexion1.php";
class clsPerfil extends clsConexion1
{

    //atributos
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
        $nombre,
        $apellido1,
        $apellido2,
        $email,
        $fecha_nac,
        $telefono,
        $pic,
        $pass




    ) {
        $p = new clsPerfil();
        $p->nombre = $nombre;
        $p->apellido1 = $apellido1;
        $p->apellido2 = $apellido2;
        $p->email = $email;
        $p->fecha_nac = $fecha_nac;
        $p->telefono = $telefono;
        $p->pic = $pic;
        $p->pass = ($pass);

        return $p;

    }

    public function get_user($id)
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT * FROM usuarios WHERE `id` = $id");
        

        $consulta->execute();
        $usr = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsPerfil');
        $dbh1 = null;
        return $usr;
        }

    }





    public function crearCRUDperfil($id)
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT * FROM usuarios WHERE `id` = $id");                                      
                                        
            
            $consulta->setFetchMode(PDO::FETCH_ASSOC); 
            $consulta->execute();
            $filas = "";

            foreach ($consulta as $key => $p) {
                $filas .= "<tr>
                                <td scope='col'>$p[nombre]</td>
                                <td scope='col'>$p[apellido1]</td>
                                <td scope='col'>$p[apellido2]</td>
                                <td scope='col'>$p[email]</td>
                                <td scope='col'>$p[fecha_nac]</td>
                                <td scope='col'>$p[telefono]</td>
                                <td scope='col'>$p[pic]</td>
                                <td scope='col'>$p[pass]</td>
                                
                                <td scope='col'>
                                    <a href='perfil_edit.php?id=$p[id]' class='btn btn-warning'>Editar</a>
                            
                                </td>
                            </tr>";
            }
            $dbh1=null;
            return $filas;
        }
    }
    public function modificar($id)
    {   

        $dbh1 = $this->conectar();
        
        if ($dbh1 != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh1->prepare("UPDATE usuarios 
                                            SET `nombre`='$this->nombre', `apellido1`='$this->apellido1', `apellido2`='$this->apellido2', `email`='$this->email', `fecha_nac`='$this->fecha_nac', `telefono`='$this->telefono', `pic`='$this->pic'
                                            
                                                                                                                                                                        
                                            WHERE `id` = $id"); 
                
                                                   
              
                //2-ejecutar la consulta
                $target = 'img/profile/';
                $target = $target . basename( $_FILES['pic']['name']);

                move_uploaded_file($_FILES['pic']['tmp_name'], $target);
                $consulta->execute();
                
                $estado = true;
            } catch (PDOException $e) {
                $estado = false;
                $e->getMessage();
            } finally {
                //cerrar la conexion a la bd
                $dbh1 = null;
                return $estado;
            }
        }
    }
}

?>