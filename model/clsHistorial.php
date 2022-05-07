<?php
require "conexion1.php";
class clsHistorial extends clsConexion1
{

    //atributos
    public $pelicula;
    public $fecha;
    public $hora;
    public $sala;
    public $precio;
    public $butacas;
    public $total;
    public $id;
    



    //constructores
    public function __construct()
    {
       
    }

    public static function constructorParametro(
        $pelicula,
        $fecha,
        $hora,
        $sala,
        $precio,
        $butacas,
        $total,
        $id
    



    ) {
        $his = new clsHistorial();
        $his->pelicula = $pelicula;
        $his->fecha = $fecha;
        $his->hora = $hora;
        $his->sala = $sala;
        $his->precio = $precio;
        $his->butacas = $butacas;
        $his->total = $total;
        $his->id = $id;





        return $his;
    }

    public function insertar_historial($id)
    {

        $dbh1 = $this->conectar();
        if ($dbh1 != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh1->prepare("INSERT INTO `historial` (`pelicula`, `fecha`, `hora`, `sala`, `precio`, `butacas`,`total`,`id`) VALUES ('$this->pelicula', '$this->fecha', '$this->hora', '$this->sala', '$this->precio', '$this->butacas', '$this->total', '$id')");

                                
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
    public function crearFilasHistorial($id)
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT `id_compra`, `pelicula`, `fecha`, `hora`, `sala`, `precio`, `butacas`, `total` FROM `historial` WHERE `id` = $id order by `id_compra` asc");
                      
            $consulta->setFetchMode(PDO::FETCH_ASSOC); 
            $consulta->execute();
            $filas = "";

            foreach ($consulta as $key => $v) {
                $filas .= "<tr>
                                <td scope='col'>$v[id_compra]</td>
                                <td scope='col'>$v[pelicula]</td>
                                <td scope='col'>$v[fecha]</td>
                                <td scope='col'>$v[hora]</td>
                                <td scope='col'>$v[sala]</td>
                                <td scope='col'>$$v[precio]</td>
                                <td scope='col'>$v[butacas]</td>
                                <td scope='col'>$$v[total]</td>

                            </tr>";
            }
            $dbh=null;
            return $filas;
        }
    }
}
?>