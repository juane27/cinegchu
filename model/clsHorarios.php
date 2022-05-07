<?php
require "conexion1.php";
class clsHorarios extends clsConexion1
{

    //atributos
    public $id;
    public $pelicula;
    public $fecha;
    public $hora;
    public $sala;
    public $precio;



    //constructores
    public function __construct()
    {
       
    }

    public static function constructorParametro(
        $id,
        $pelicula,
        $fecha,
        $hora,
        $sala,
        $precio



    ) {
        $h = new clsHorarios();
        $h->id = $id;
        $h->pelicula = $pelicula;
        $h->fecha = $fecha;
        $h->hora = $hora;
        $h->sala = $sala;
        $h->precio = $precio;




        return $h;
    }


    // obtener todas los horarios
    public function get_horarios()
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT * FROM `horarios`");
        
        $consulta->setFetchMode(PDO::FETCH_ASSOC); 
        $consulta->execute();
        $filas = "";
        foreach ($consulta as $key => $v) {
            $filas .= "<tr>
                            <td scope='col'>$v[id]</td>
                            <td scope='col'>$v[pelicula]</td>
                            <td scope='col'>$v[fecha]</td>
                            <td scope='col'>$v[hora]</td>
                            <td scope='col'>$v[sala]</td>
                            <td scope='col'>$v[precio]</td>


                            <td scope='col'>
                                <a href='EditarHorario.php?id=$v[id]' class='btn btn-warning'>Editar</a>
                                <a href='DeleteHorario.php?id=$v[id]' class='btn btn-danger'>Eliminar</a>
                            </td>
                        </tr>";
        }

        $dbh1 = null;
        return $filas;
        }

    }

    // obtener horario de pelicula
    public function get_hor($movie)
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT `id`,`id`, `pelicula`, `fecha`, `hora`, `sala`, `precio` FROM `horarios` WHERE `pelicula` = '$movie'");
        

        $consulta->execute();
        $resh = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsHorarios');
        $dbh1 = null;
        return $resh;
        }

    }

    public function get_hora()
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT `id`,`id`, `pelicula`, `fecha`, `hora`, `sala`, `precio` FROM `horarios`");
        

        $consulta->execute();
        $resh = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsHorarios');
        $dbh1 = null;
        return $resh;
        }

    }


    public function insertar()
    {

        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh1->prepare("INSERT INTO `horarios` (`id`, `pelicula`, `fecha`, `hora`, `sala`, `precio`) VALUES ('$this->id', '$this->pelicula', '$this->fecha', '$this->hora', '$this->sala', '$this->precio')");

                     

                var_dump($consulta);
                //3-ejecutar la consulta
                $consulta->execute();

                var_dump($consulta);
                

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
     

    //Consultar id
    public function consultarId($id){
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            $consulta = $dbh1->prepare("SELECT id, pelicula, fecha, hora, sala, precio FROM horarios WHERE id = $id");

            
            $consulta->execute();
            $res=$consulta->fetchAll(PDO::FETCH_OBJ);
            $dbh1=null;
            return $res[0];
        }
    }

    public function eliminar()
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh1->prepare("DELETE FROM horarios 
                                            WHERE id=:id 
                                    ");
                //2-bind a los parametros
                $consulta->bindParam(":id", $this->id);

                //3-ejecutar la consulta
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



    



    //Modificar horarios
    public function modificar($id)
    {
        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh1->prepare("UPDATE `horarios` 
                                            SET `pelicula`='$this->pelicula', `fecha`='$this->fecha', `hora`='$this->hora', `sala`='$this->sala', `precio`='$this->precio'                                                                                     
                                            WHERE `id` = $id");                                            
                                            
                                                   
                //2-ejecutar la consulta
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
