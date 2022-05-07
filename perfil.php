<?php
include 'shared/header.php';
include 'model/clsPerfil.php';

$p=new clsPerfil();
?>



<main>

<h1 align=center>Mi perfil</h1>

<main class="my-5">
    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Mis datos:</h2>
            </div>
            <div class="p-2 bd-highlight mb-5">
                <a href="perfil_edit.php" class="btn btn-success "> Editar</a>
            </div>
        </div>

        <div class="table-responsive ">
            <table class="table text-center table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido 1°</th>
                        <th scope="col">Apellido 2°</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Modificar</th>


                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php $id = ($_SESSION['id']);
                    echo $p->crearCrudperfil($id) ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include 'shared/footer.php';
?>