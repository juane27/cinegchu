<?php include "shared/header.php" ?>
<?php include "model/clsMovie.php"?>
<?php 
$m = new clsMovie();
$mov = $m->get_mov();
//Obtner id de pelicula
$id = $_GET['id'];



$src = ($mov[$id]->src);
$src_cover = ($mov[$id]->src_cover);


?>


<main class="container mt-5">

    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <a href="banners.php" class="btn btn-warning">Regresar</a>
            </div>

            <div class="me-auto p-2 bd-highlight ">
                <h2>Información de estrenos</h2>
            </div>

        </div>
        <div class="form-floating mb-3">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo ($mov[$id]->title)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="descript">Descripción</label>
            <input type="text" class="form-control" name="descript" id="descript" placeholder="descript" value="<?php echo ($mov[$id]->descript)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="actores">Actores</label>
            <input type="text" class="form-control" name="actores" id="actores" placeholder="actores" value="<?php echo ($mov[$id]->actores)?>">
        </div> 
        <div class="form-floating mb-3">
            <label for="director">Director</label>
            <input type="text" class="form-control" name="director" id="director" placeholder="director" value="<?php echo ($mov[$id]->director)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="duracion">Duración</label>
            <input type="text" class="form-control" name="duracion" id="duracion" placeholder="duracion" value="<?php echo ($mov[$id]->duracion)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="genero">Genero</label>
            <input type="text" class="form-control" name="genero" id="genero" placeholder="genero" value="<?php echo ($mov[$id]->genero)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="idioma">Idioma</label>
            <input type="text" class="form-control" name="idioma" id="idioma" placeholder="idioma" value="<?php echo ($mov[$id]->idioma)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="clasificacion">Clasificación</label>
            <input type="text" class="form-control" name="clasificacion" id="clasificacion" placeholder="clasificacion" value="<?php echo ($mov[$id]->clasificacion)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="movie_premiere">Fecha de estreno</label>
            <input type="date" class="form-control" name="movie_premiere" id="movie_premiere" placeholder="movie_premiere" value="<?php echo ($mov[$id]->movie_premiere)?>">
        </div>

        <div class="form-floating mb-3">
            <label for="trailer">Trailer</label>
            <input type="text" class="form-control" name="trailer" id="trailer" placeholder="trailer" value=<?php echo ($mov[$id]->trailer)?>>
        </div>
        <div class="form-floating mb-3">
            <label for="price">Precio</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="price" value="<?php echo ($mov[$id]->price)?>">
        </div>
        
        <div class="form-floating mb-3">
            <label for="src">Poster vertical</label>
            <input type="file" class="form-control" name="src" id="src" placeholder="src" value="<?php echo ($mov[$id]->src)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="src">Poster Horizontal</label>
            <input type="file" class="form-control" name="src_cover" id="src_cover" placeholder="" value="<?php echo ($mov[$id]->src_cover)?>">
        </div>





        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="registrarse.php">Guardar</button>
            <button type="submit" class="btn btn-warning" href="registrarse.php">Cancelar</button>
        </div>
    </form>

    <?php
    if ($_POST) {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $date = strval($date);
        



        
        $v = clsMovie::constructorParametro(
            $title = $_POST["title"],
            $descript = $_POST["descript"],
            $actores = $_POST["actores"],
            $director = $_POST["director"],
            $duracion = $_POST["duracion"],
            $genero = $_POST["genero"],
            $idioma = $_POST["idioma"],
            $clasificacion = $_POST["clasificacion"],
            $trailer = $_POST["trailer"],
            $movie_premiere = $_POST['movie_premiere'],
            $price = $_POST["price"],
            $folder = "img/peliculas/",
            $src = $src,
            $src_cover = $src_cover,
            $created_at = $date  



        );
        
        $v->modificar($id);

    }

    ?>


</main>

<?php include "shared/footer.php" ?>