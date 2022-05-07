<?php include "shared/header.php" ?>
<?php include "model/clsHorarios.php"?>
<?php 
$m = new clsHorarios();
$hor = $m->get_hora();

//Obtner id de pelicula
$id = $_GET['id'];


?>


<main class="container mt-5">

    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <a href="horarios.php" class="btn btn-warning">Regresar</a>
            </div>

            <div class="me-auto p-2 bd-highlight ">
                <h2>Editar horario</h2>
            </div>

        </div>
        <div class="form-floating mb-3">
            <label for="title">Pelicula</label>
            <input type="text" class="form-control" name="pelicula" id="pelicula" placeholder="pelicula" value="<?php echo ($hor[$id]->pelicula)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="descript">Fecha</label>
            <input type="text" class="form-control" name="fecha" id="fecha" placeholder="fecha" value="<?php echo ($hor[$id]->fecha)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="descript">Hora</label>
            <input type="text" class="form-control" name="hora" id="hora" placeholder="hora" value="<?php echo ($hor[$id]->hora)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="actores">Sala</label>
            <input type="text" class="form-control" name="sala" id="sala" placeholder="sala" value="<?php echo ($hor[$id]->sala)?>">
        </div>
        <div class="form-floating mb-3">
            <label for="director">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="precio" value="<?php echo ($hor[$id]->precio)?>">
        </div>

 
        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="EditarHorario.php">Guardar</button>
            <button type="submit" class="btn btn-warning" href="horarios.php">Cancelar</button>
        </div>
    </form>

    <?php
    if ($_POST) {
   
        $id = $_GET['id'];
        $v = clsHorarios::constructorParametro(
            $id,
            $pelicula = $_POST["pelicula"],
            $fecha = $_POST["fecha"],
            $hora = $_POST["hora"],
            $sala = $_POST["sala"],
            $precio = $_POST["precio"]

        );
        
        $v->modificar($id);

    }

    ?>


</main>

<?php include "shared/footer.php" ?>