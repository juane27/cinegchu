<?php
include 'shared/header.php'; ?>
<style>
<?php include 'css/register.css'; ?>
</style>


<main>

<main class="container mt-5">
    
    <form class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center bd-highlight mb-3">


        <div class="me-auto p-2 bd-highlight ">
            <h2>Registro de Usuario
        </div>
        
    </div>
        <div class="form-floating mb-3">
            <label for="user">Usuario</label>
            <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" required>
        </div>
        <div class="form-floating mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-floating mb-3">
            <label for="apellido1">Primer Apellido</label>
            <input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="Apellido" required>
        </div>
        <div class="form-floating mb-3">
            <label for="apellido2">Segundo apellido</label>
            <input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="Apellido" required>
        </div>
        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-floating mb-3">
            <label for="fecha_nac">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac"  required>
        </div>
        <div class="form-floating mb-3 telefono">
            <label for="telefono">Telefono:</label>
            <input type="number" class="form-control" name="telefono" id="telefono"  required>
        </div>
        <div class="form-floating mb-3">
        <label for="pic">Foto de perfil:</label>
        <input type="file" id="pic" name="pic">
        </div>
        <div class="form-floating mb-3">
            <label for="pass">Clave</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Clave" required>
        </div>
        <div class="form-floating mb-3">
            <label for="cclave">Confirmar Clave</label>
            <input type="password" class="form-control" id="clave" name="clave" placeholder="Confirmar clave" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success" href="index.php">Crear Usuario</button>
            <button type="submit" class="btn btn-danger" href="index.php">Cancelar</button>
            <a href="login.php" class="btn btn-primary"> Iniciar Sesión</a>
        
        </div>
    </form>

    <?php

    if ($_POST) {
        
        if ($_POST["pass"] === $_POST["clave"]) {
            require "model/clsRegistro.php";
            $user=$_POST["user"];
            $nombre=$_POST["nombre"];
            $apellido1=$_POST["apellido1"];
            $apellido2=$_POST["apellido2"];
            $email=$_POST["email"];
            $fecha_nac=$_POST["fecha_nac"];
            $telefono=$_POST["telefono"];
            if (($_FILES["pic"]["name"]) == "") {
                $pic="usuario_def.png";
            }
            else{
                $pic=$_FILES["pic"]["name"];
                
            }
            
            $pic= $pic ;
            $pass=$_POST["pass"];
            $rol= "user";
            $pass=md5($pass);
             $r = clsRegistro::constructorParametros(
                $_POST["user"],
                $_POST["nombre"],
                $_POST["apellido1"],
                $_POST["apellido2"],
                $_POST["email"],
                $_POST["fecha_nac"],
                $_POST["telefono"],
                $pic,              
                $pass,
                $rol,
                
    
            );
            $r->insertar();
            echo "<div class='alert alert-success alert-dismissible ' role='alert'>";
            echo "<strong>Usuario creado correctamente</strong> Ya puedes iniciar sesión";
            echo "<button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            
         }
         else {
            echo "<div class='alert alert-danger alert-dismissible ' role='alert'>";
            echo "<strong>Error.</strong> Las contraseñas no coinciden. Porfavor, verifica.";
            echo "<button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
         }

    }
    




    ?>


</main>

<?php
include 'shared/footer.php';
?>