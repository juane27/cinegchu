<?php
require "conexion.php";
class clsMovie extends clsConexion
{

    //atributos
    public $title;
    public $descript;
    public $actores;
    public $director;
    public $clasificacion;
    public $duracion;
    public $genero;
    public $idioma;
    public $trailer;
    public $movie_premiere;
    public $price;
    public $folder;
    public $src;
    public $src_cover;
    public $created_at;


    //constructores
    public function __construct()
    {
       
    }

    public static function constructorParametro(
        $title,
        $descript,
        $actores,
        $director,
        $clasificacion,
        $duracion,
        $genero,
        $idioma,
        $trailer,
        $movie_premiere,
        $price,
        $folder,
        $src,
        $src_cover,
        $created_at
    ) {
        $m = new clsMovie();
        $m->title = $title;
        $m->descript = $descript;
        $m->actores = $actores;
        $m->director = $director;
        $m->clasificacion = $clasificacion;
        $m->duracion = $duracion;
        $m->genero = $genero;
        $m->idioma = $idioma;
        $m->trailer = $trailer;
        $m->movie_premiere = $movie_premiere;
        $m->price = $price;
        $m->folder = $folder;
        $m->src = $src;
        $m->src_cover = $src_cover;
        $m->created_at = $created_at;

        return $m;
    }


    // obtener peliculas
    public function get_mov()
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT `id`,`id`,`title`,`descript`, `actores`, `director`,`clasificacion`,`duracion`,`genero`,`idioma`,`trailer`, `movie_premiere`,`price`,`folder`,`src`,`src_cover`,`created_at` FROM `peliculas`");
        

        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'clsMovie');
        $dbh = null;
        return $res;
        }

    }
    public function insertar()
    {

        $dbh = $this->conectar();
        if ($dbh != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh->prepare("INSERT INTO peliculas( id, title, descript, actores, director, clasificacion, duracion, genero, idioma, trailer, movie_premiere, price, folder, src, src_cover, created_at) VALUES (:id, :title, :descript, :actores, :director, :clasificacion, :duracion, :genero, :idioma, :trailer, :movie_premiere, :price, :folder, :src, :src_cover, :created_at)"); 
                     
                //2-bind a los parametros
                $consulta->bindParam(":id", $this->id);
                $consulta->bindParam(":title", $this->title);
                $consulta->bindParam(":descript", $this->descript);
                $consulta->bindParam(":actores", $this->actores);
                $consulta->bindParam(":director", $this->director);
                $consulta->bindParam(":clasificacion", $this->clasificacion);
                $consulta->bindParam(":duracion", $this->duracion);
                $consulta->bindParam(":genero", $this->genero);
                $consulta->bindParam(":idioma", $this->idioma);
                $consulta->bindParam(":trailer", $this->trailer);
                $consulta->bindParam(":movie_premiere", $this->movie_premiere);
                $consulta->bindParam(":price", $this->price);
                $consulta->bindParam(":folder", $this->folder);
                $consulta->bindParam(":src", $this->src);
                $consulta->bindParam(":src_cover", $this->src_cover);
                $consulta->bindParam(":created_at", $this->created_at);


                //3-ejecutar la consulta
                $consulta->execute();

                $estado = true;
            } catch (PDOException $e) {
                $estado = false;
                $e->getMessage();
            } finally {
                //cerrar la conexion a la bd
                $dbh = null;
                return $estado;
            }
        }
    }
    public function modificar($id)
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh->prepare("UPDATE `peliculas` 
                                            SET `title`='$this->title', `descript`='$this->descript', `actores`='$this->actores', `director`='$this->director', `clasificacion`='$this->clasificacion', `duracion`='$this->duracion', `genero`='$this->genero', `idioma`='$this->idioma', `trailer`='$this->trailer', `movie_premiere`='$this->movie_premiere', `price`='$this->price', `folder`='$this->folder', `src`='$this->src', `src_cover`='$this->src_cover', `created_at`='$this->created_at'
                                                                                      
                                            WHERE `id` = $id");                                            
                                            
                                                   
                //2-ejecutar la consulta
                
                $consulta->execute();
                $estado = true;
                

            } catch (PDOException $e) {
                $estado = false;
                $e->getMessage();
            } finally {
                //cerrar la conexion a la bd
                $dbh = null;
                return $estado;
            }
        }
    }
    public function eliminar()
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            try {
                //1-preparar la consulta
                $consulta = $dbh->prepare("DELETE FROM peliculas 
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
                $dbh = null;
                return $estado;
            }
        }
    }
    public function crearFilasCrud()
    {
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT id, title, descript, actores, director, clasificacion, duracion, genero, idioma, trailer, movie_premiere, price, folder, src, src_cover, created_at
                                        FROM peliculas
                                        order by id");
            
            $consulta->setFetchMode(PDO::FETCH_ASSOC); 
            $consulta->execute();
            $filas = "";

            foreach ($consulta as $key => $v) {
                $filas .= "<tr>
                                <td scope='col'>$v[id]</td>
                                <td scope='col'>$v[title]</td>
                                <td scope='col'>$v[descript]</td>
                                <td scope='col'>$v[actores]</td>
                                <td scope='col'>$v[director]</td>
                                <td scope='col'>$v[clasificacion]</td>
                                <td scope='col'>$v[duracion]</td>
                                <td scope='col'>$v[genero]</td>
                                <td scope='col'>$v[idioma]</td>
                                <td scope='col'>$v[trailer]</td>
                                <td scope='col'>$v[movie_premiere]</td>
                                <td scope='col'>$v[price]</td>
                                <td scope='col'>$v[folder]</td>
                                <td scope='col'>$v[src]</td>
                                <td scope='col'>$v[src_cover]</td>
                                <td scope='col'>$v[created_at]</td>
                                <td scope='col'>
                                    <a href='editarPelicula.php?id=$v[id]' class='btn btn-warning'>Editar</a>
                                    <a href='confirmarDelete.php?id=$v[id]' class='btn btn-danger'>Eliminar</a>
                                </td>
                            </tr>";
            }
            $dbh=null;
            return $filas;
        }
    }

    public function consultarId($id){
        $dbh = $this->conectar();
        if ($dbh != null) {
            $consulta = $dbh->prepare("SELECT id, title, descript, actores, director, clasificacion, duracion, genero, idioma, trailer, movie_premiere, price, folder, src, src_cover, created_at
                                        FROM peliculas
                                        where id=$id");
            
            $consulta->execute();
            $res=$consulta->fetchAll(PDO::FETCH_OBJ);
            $dbh=null;
            return $res[0];
        }
    }

}

?>
