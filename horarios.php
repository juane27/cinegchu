<?php
include "shared/header.php";
include "model/clsHorarios.php";

$v=new clsHorarios();

?>

<main>

<h1 align=center>Administrar horarios</h1>

<main class="my-5">
    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Información de horarios</h2>
            </div>
            <div class="p-2 bd-highlight mb-5">
                <a href="nuevoHorario.php" class="btn btn-success "> Nuevo</a>
            </div>
        </div>

        <div class="table-responsive ">
            <table class="table text-center table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Pelicula</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Modificar</th>
                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php echo $v->get_horarios() ?>
                </tbody>
            </table>
        </div>
    </div>








</main>

<?php
include "shared/footer.php";
?>