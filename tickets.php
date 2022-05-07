<?php 
include "shared/header.php";
include "model/enviar_tickets.php";
include "model/clsHistorial.php";



//datos de pelicula y compra.
if (isset($_POST['comprar'])){
  $horarios = ($_POST['horarios'] );
  $horarios = explode(" ", $horarios);
  $precio = ($horarios[4]);

  $precio = str_replace('$', '', $precio);
  $fecha  = ($horarios[1]);
  $hora   = ($horarios[2]);
  $title = ($horarios[0]);
  $sala = ($horarios[3]);
  
  
  $name = $_SESSION['nombre'];
  $email = $_SESSION['email'];
  $apellido = $_SESSION['apellido1'];
  
}
else if (isset($_POST['pago'])) {
  $name = $_POST['name'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $count1 = $_POST['count1'];
  $total1 = $_POST['total1'];
  $title = $_POST['title'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $sala = $_POST['sala'];
  $precio = $_POST['precio'];


}








?>

<main>
<link rel="stylesheet" href="style-tickets.css" />
<div class="movie-container">


    <p>Usted esta compando asientos para la función de <b><?php echo $title?></b> a las <b><?php echo $hora?> hs</b> del día <b><?php echo $fecha ?></b> en la <b> <?php echo $sala?></b></p>
    <input type=hidden id="movie" value="<?php echo $precio ?>"></input>
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Seleccionado</small>
      </li>
      <li>
        <div class="seat occupied"></div>
        <small>Ocupado</small>
      </li>
    </ul>

    <div class="container">
      <div class="screen"></div>

      <div class="row">        
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat" ></div>
        <div class="seat" ></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
      </div> 
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
    </div>



  
    
      
    <p class="text">
      Has elegido <span class="asientos-span" id="count">0</span> asientos por el precio de $<span
        id="total"
        >0</span
      >
    </p>
    <br>
    <p style="color:red";>Tienes 5 minutos para realizar la compra de tickets, de lo contrario seras redirigido a la pagina principal</p>

    <form method="post" id="pago" onsubmit="myFunction()">
    <input type="hidden" name="pago" value="si"></input>
    <input type="hidden" name="count1" id="count1" value=""></input>
    <input type="hidden" name="total1" id="total1" value=""></input>
    <input type="hidden" name="title" id="title" value="<?php echo $title?>"></input>
    <input type="hidden" name="fecha" id="fecha" value="<?php echo $fecha?>"></input>
    <input type="hidden" name="hora" id="hora" value="<?php echo $hora?>"></input>
    <input type="hidden" name="sala" id="sala" value="<?php echo $sala?>"></input>
    <input type="hidden" name="precio" id="precio" value="<?php echo $precio?>"></input>
    <input type="hidden" name="name" id="name" value="<?php echo $name?>"></input>
    <input type="hidden" name="apellido" id="apellido" value="<?php echo $apellido?>"></input>
    <input type="hidden" name="email" id="email" value="<?php echo $email?>"></input>
    <input type="submit" value="Comprar" class="btn-success" name='pago'>

    </form>



<?php 

    if (isset($_POST['pago'])) {
        $count1 = $_POST['count1'];
        $total1 = $_POST['total1'];
        $title = $_POST['title'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $sala = $_POST['sala'];
        $precio = $_POST['precio'];
        $id = ($_SESSION['id']);
        $pelicula = $title;
        $butacas = $count1;
        $total = $total1;

        



        $t = clsEnviar_tickets::constructorParametros(
            $name,
            $email,
            $apellido,
            $count1,
            $total1,
            $title,
            $fecha,
            $hora,
            $sala,
            $precio
        );
        
        $t->enviar_tickets();
        $sala = str_replace("Sala:", "", $sala);
        $his = clsHistorial::constructorParametro(
            $pelicula,
            $fecha,
            $hora,
            $sala,
            $precio,
            $butacas,
            $total,
            $id
        );
        $his->insertar_historial($id);

    }

?>

    <script src="script.js"></script>

    <script>
    // Esta función es llamada una vez el usuario presione submit
    function myFunction(){

        // Obtener valores del objero con clase asientos-span
        asientos = $('.asientos-span').html();

        
        $("#asientos").val(asientos);

        
        $("#pago").submit();
}
</script>


<script>
setTimeout("location.href = '/index.php';",300000);
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</main>

<?php include "shared/footer.php" ?>