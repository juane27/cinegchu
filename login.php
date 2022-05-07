<?php
include 'shared/header.php';

?>

<main>
<h1 class="text-center mt-5">Iniciar Sesión</h1>


<div class="card-login">
<form class="w-40 mt-50" action="" method="POST">
    <div class="mb-3">
        <label class="form-label" for="">Usuario</label>
        <input class="form-control" type="text" name="user">
    </div>
    <div class="mb-3">
        <label class="form-label" for="">Clave</label>
        <input class="form-control" type="password" name="pass">
    </div>
    <div class="mb-3 d-grid gap-2">
        <input class="btn btn-success" type="submit" value="Iniciar Sesión">
    </div>
    <div class="mb-3 d-grid gap-3">
        <a class="btn btn-warning" href="register.php">Registrarse</a>
    </div>
</form>
</div>
<?php

if ($_POST) {
    require "model/clsLogin.php";
    $user=$_POST["user"];

    $pass=md5($_POST["pass"]);




    $l = clsLogin::constructorParametrosx(
        $_POST["user"],
        $pass,
    );

    $l->loguear();


}

?>


</main>

<?php
include 'shared/footer.php';
?>