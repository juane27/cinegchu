<?php
include "shared/header.php";
include "model/clsHistorial.php";
$v=new clsHistorial();
$id = ($_SESSION['id']);
?>
<style>
    <?php include "css/CRUD.css"; ?>
</style>



<main>

<h1 align=center>Historial de compras de <?php echo $_SESSION['user']?></h1>

<main class="my-5">
    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Revisa tus compras realizadas en CineGchu:</h2>
            </div>
            <div class="p-2 bd-highlight mb-5">
                </div>
        </div>

        <div class="table-responsive ">
            <table class="table text-center table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">N° de compra</th>
                        <th scope="col">Pelicula</th>
                        <th scope="col">Fecha de compra</th>
                        <th scope="col">Hora de función</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Precio</th>
                        <th scope="col">N° de Butacas</th>
                        <th scope="col">Total</th>



                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php echo $v->crearFilasHistorial($id) ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include "shared/footer.php" ?>