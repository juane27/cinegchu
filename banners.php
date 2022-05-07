<?php
include "shared/header.php";
include "model/clsMovie.php";
$v=new clsMovie();
?>
<style>
    <?php include "css/CRUD.css"; ?>
</style>



<main>

<h1 align=center>Administrar base de datos de peliculas</h1>

<main class="my-5">
    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Información de peliculas</h2>
            </div>
            <div class="p-2 bd-highlight mb-5">
                <a href="nuevaPelicula.php" class="btn btn-success "> Nuevo</a>
            </div>
        </div>

        <div class="table-responsive ">
            <table class="table text-center table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Actores</th>
                        <th scope="col">Director</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Duración</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Idioma</th>
                        <th scope="col">Trailer</th>
                        <th scope="col">Estreno</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Carpeta</th>
                        <th scope="col">Poster</th>
                        <th scope="col">Poster Cover</th>
                        <th scope="col">Fecha de carga</th>
                        <th scope="col">Modificar</th>

                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php echo $v->crearFilasCrud() ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include "shared/footer.php" ?>




