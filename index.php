<?php 
include "shared/header.php";
include "model/carrousel.php";
$images = get_imgs();
?>


<main>
    

<div class="container">
  <h1  class="text-center">ESTRENOS</h1>
<div class="row margin-top: 5em;">
<div class="col-md-5 justify-content-center text-center">
<?php if(count($images)>0):?>
<!-- aqui insertaremos el slider -->
<div id="carousel1" class="carousel slide" data-ride="carousel">
  <!-- Indicadores -->
  <ol class="carousel-indicators">
<?php $cnt=0; foreach($images as $img):?>
    <li data-target="#carousel1" data-slide-to="0" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
<?php $cnt++; endforeach; ?>
  </ol>

  <!-- Contenedor de las imagenes -->
  <div class="carousel-inner" role="listbox">
<?php $cnt=0; foreach($images as $img):?>
    <div class="item <?php if($cnt==0){ echo 'active'; }?>">
      <img src="<?php echo SERVERURL;echo '/img/peliculas/'.$img->src; ?>" alt="Imagen 1">
      <div class="carousel-caption"><?php echo $img->title;
      echo "<br>";
      echo  "Estreno: ". $img->movie_premiere?></div>
    </div>
<?php $cnt++; endforeach; ?>
  </div>

  <!-- Controles -->
  <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>

</div>

<?php else:?>
  <h4 class="alert alert-warning">No hay imagenes.</h4>
<?php endif; ?>
</div>
</div>
</div>
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>










    
</main>

<?php include "shared/footer.php" ?>

