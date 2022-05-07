<?php 
include "shared/header.php";
include "model/clsMovie.php";
$m = new clsMovie();
$res = $m->get_mov();
?>


<main>

<div class="container">
<h1 class="text-center">CARTELERA</h1>

<div class="container">

<!-- 1° card -->
<div class="row">

<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['1']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['1']->title?></h5>
    <p class="card-text"><?php echo $res['1']->descript?> </p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['1']->genero?></li>
  </ul>
    <a href="<?php echo $res['1']->title?>/1" class="btn btn-primary cardw">Ver más</a>
</div>
</div>



<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['2']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['2']->title?></h5>
    <p class="card-text"><?php echo $res['2']->descript?> </p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['2']->genero?></li>
  </ul>
    <a href="<?php echo $res['2']->title?>/2" class="btn btn-primary cardw">Ver más</a>
</div>
</div>

<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['3']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['3']->title?></h5>
    <p class="card-text"><?php echo $res['3']->descript?></p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['3']->genero?></li>
  </ul>
    <a href="<?php echo $res['3']->title?>/3" class="btn btn-primary cardw">Ver más</a>
</div><!-- card -->
</div><!-- 1° col -->


</div><!-- end row -->

<!-- 2° card -->
<div class="row">

<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['4']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['4']->title?></h5>
    <p class="card-text"><?php echo $res['4']->descript?></p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['4']->genero?></li>
  </ul>
    <a href="<?php echo $res['4']->title?>/4" class="btn btn-primary cardw">Ver más</a>
</div><!-- card -->
</div><!-- end col -->

<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['5']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['5']->title?></h5>
    <p class="card-text"><?php echo $res['5']->descript?></p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['5']->genero?></li>
  </ul>
    <a href="<?php echo $res['5']->title?>/5" class="btn btn-primary cardw">Ver más</a>
</div><!-- card -->
</div><!-- end col -->

<div class="col-lg-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['6']->src?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $res['6']->title?></h5>
    <p class="card-text"><?php echo $res['6']->descript?> </p>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Genero: <?php echo $res['6']->genero?></li>
  </ul>
    <a href="<?php echo $res['6']->title?>/6" class="btn btn-primary cardw">Ver más</a>
</div><!-- card -->
</div><!-- end col -->






</div><!-- end row -->



</div><!-- container cards -->
</div><!-- container -->







</main>

<php 
if(isset($_GET["pagina"])){
   $pelicula = $_GET["pagina"];
   include 'peliculax.php";
}
?>

<?php include "shared/footer.php" ?>