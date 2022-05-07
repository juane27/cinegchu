<?php include "shared/header.php" ?>
<?php
include "model/clsPerfil.php";
$p = new clsPerfil();
$id = ($_SESSION['id']);

$usr = $p->get_user($id);


?>

<main class="container mt-5">

    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <a href="perfil.php" class="btn btn-warning">Regresar</a>
            </div>

            <div class="me-auto p-2 bd-highlight ">
                <h2>Editar mi perfil</h2>
            </div>

        </div>
        <div class="form-floating mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value=<?php echo ($usr[$id]->nombre)?> >
            <label for="apellido1">Primer apellido:</label>
            <input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="" value=<?php echo ($usr[$id]->apellido1)?> >
            <label for="apellido2">Segundo apellido:</label>
            <input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="" value=<?php echo ($usr[$id]->apellido2)?> >
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="" value=<?php echo ($usr[$id]->email)?> >
            <label for="fecha_nac">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="" value=<?php echo ($usr[$id]->fecha_nac)?> >
            <label for="telefono">Telefono:</label>
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" value=<?php echo ($usr[$id]->telefono)?> >
            <label for="pic">Foto de perfil:</label>
            <div class=user-pic-show> <img src="<?php echo SERVERURL; echo "img/profile/"; echo ($_SESSION['pic'])?>" alt=""></div>
            
            <input type="file" class="btn btn-warning" name="pic" id="pic" placeholder="" value=<?php echo ($usr[$id]->pic)?>

            

        </div>


        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="registrarse.php">Guardar</button>
            <a class="btn btn-warning" href="perfil.php">Cancelar</a>
        </div>
    </form>

    <?php
    if ($_POST) {
        $id=$_SESSION["id"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $email = $_POST["email"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $pic=$_FILES["pic"]["name"];
        $_SESSION['pic'] = $pic;
        $pass = $_SESSION['pass'];
                

        $p = clsPerfil::constructorParametro(
            $_POST["nombre"],
            $_POST["apellido1"],
            $_POST["apellido2"],
            $_POST["email"],
            $_POST["fecha_nac"],
            $_POST["telefono"],
            $pic,
            $pass
            

        );
        $p->modificar($id);


 
    }

    ?>


</main>

<?php include "shared/footer.php" ?>