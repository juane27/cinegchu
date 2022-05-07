<?php include "shared/header.php" ?>

<main class="container mt-5">

    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <a href="banners.php" class="btn btn-warning">Regresar</a>
            </div>

            <div class="me-auto p-2 bd-highlight ">
                <h2>Agregar pelicula</h2>
            </div>

        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="id" id="id" placeholder="id">
            <label for="id">Id</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="title" id="title" placeholder="title">
            <label for="title">Titulo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="descript" id="descript" placeholder="descript">
            <label for="descript">Sinopsis</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="actores" id="actores" placeholder="actores">
            <label for="actores">Actores</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="director" id="director" placeholder="director">
            <label for="director">Director</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="duracion" id="duracion" placeholder="duracion">
            <label for="duracion">Duracion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="genero" id="genero" placeholder="genero">
            <label for="genero">Genero</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="idioma" id="idioma" placeholder="idioma">
            <label for="idioma">Idioma</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="trailer" id="trailer" placeholder="trailer">
            <label for="trailer">Trailer</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="movie_premiere" id="movie_premiere" placeholder="movie_premiere">
            <label for="movie_premiere">Estreno</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="price" id="price" placeholder="price">
            <label for="price">Precio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="folder" id="folder" placeholder="folder">
            <label for="folder">Folder</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="src" id="src" placeholder="src">
            <label for="src">src</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="src_cover" id="src_cover" placeholder="src_cover">
            <label for="src_cover">Src_cover</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="created_at" id="created_at" placeholder="created_at">
            <label for="created_at">Fecha de carga</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="nuevaPelicula.php">Guardar</button>
            <button type="submit" class="btn btn-warning" href="banners.php">Cancelar</button>
        </div>
    </form>

    <?php
    if ($_POST) {
        require "model/clsMovie.php";
        $id=$_POST["id"];
        $v = clsMovie::constructorParametro(
            $_POST["id"],
            $_POST["title"],
            $_POST["descript"],
            $_POST["actores"],
            $_POST["director"],
            $_POST["duracion"],
            $_POST["genero"],
            $_POST["idioma"],
            $_POST["trailer"],
            $_POST["movie_premiere"],
            $_POST["price"],
            $_POST["folder"],
            $_POST["src"],
            $_POST["src_cover"],
            $_POST["created_at"],



        );
        $v->insertar();


 
    }

    ?>


</main>

<?php include "shared/footer.php" ?>