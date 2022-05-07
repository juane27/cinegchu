<?php include "shared/header.php" ?>

<main class="container mt-5">

    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <a href="horarios.php" class="btn btn-warning">Regresar</a>
            </div>

            <div class="me-auto p-2 bd-highlight ">
                <h2>Agregar horario</h2>
            </div>

        </div>
        <div class="form-floating mb-3">
            <label for="id">Id</label>
            <input type="number" class="form-control" name="id" id="id" placeholder="id">
        </div>
        <div class="form-floating mb-3">
            <label for="pelicula">Pelicula</label>
            <input type="text" class="form-control" name="pelicula" id="pelicula" placeholder="pelicula">
        </div>
        <div class="form-floating mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="fecha">
        </div>
        <div class="form-floating mb-3">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" name="hora" id="hora" placeholder="hora">
        </div>
        <div class="form-floating mb-3">
            <label for="sala">Sala</label>
            <input type="text" class="form-control" name="sala" id="sala" placeholder="sala">
        </div>
        <div class="form-floating mb-3">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="precio">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="nuevoHorario.php">Guardar</button>
            <button type="submit" class="btn btn-warning" href="horarios.php">Cancelar</button>
        </div>
    </form>

    <?php
    if ($_POST) {
        require "model/clsHorarios.php";
        $id=$_POST["id"];
        $v = clsHorarios::constructorParametro(
            $_POST["id"],
            $_POST["pelicula"],
            $_POST["fecha"],
            $_POST["hora"],
            $_POST["sala"],
            $_POST["precio"]

        );
        var_dump($v);
        $v->insertar();


 
    }

    ?>


</main>

<?php include "shared/footer.php" ?>