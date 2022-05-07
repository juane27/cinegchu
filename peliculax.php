<?php
include "shared/header.php";
include "model/clsMovie.php";
include "model/clsHorarios.php";
$pelicula = explode("/", $_GET["pagina"]);
$pelicula = $pelicula[1];




$m = new clsMovie();
$res = $m->get_mov();

$movie = $res[$pelicula]->title;


$h = new clsHorarios();
$resh = $h->get_hor($movie);





?>
<style>
<?php include 'css/peliculax.css'; ?>
</style>

<main>


<div class="movie-card">
  
  <div class="container">
  <div class="card" style="width: 18rem;">
    
    <a href="<?php echo $res[$pelicula]->trailer?>"><img src="<?php echo SERVERURL; echo $res[$pelicula]->folder; echo $res[$pelicula]->src?> " alt="cover" class="cover"/></a>
    </div>
    <div style="background-image: url('<?php echo SERVERURL; echo $res[$pelicula]->folder; echo "covers/"; echo $res[$pelicula]->src_cover?>');" class="hero" >
            
      <div class="details">
      
        <div class="title1"><?php echo $res[$pelicula]->title?></div>

        <div class="title2"><?php echo 'Duración: '; echo $res[$pelicula]->duracion?></div>    
                
        <span class="likes"><?php echo "Actores: "; echo $res[$pelicula]->actores?></span>
        <span class="director"><?php echo "Director: "; echo $res[$pelicula]->director?></span>
        
      </div> <!-- fin details -->
      
    </div> <!-- fin hero -->
    
    <div class="description">
      
      <div class="column1">
        <span class="tag"><?php echo $res[$pelicula]->genero?></span>

      </div> <!-- fin column1 -->
      
      <div class="column2">

        
        <p><?php echo $res[$pelicula]->descript?></p>
      <br>
      <br>
      <span class="info"><?php echo "Actores: "; echo $res[$pelicula]->actores?></span>
      <br>
      <span class="info"><?php echo "Director: "; echo $res[$pelicula]->director?></span>
      <br>
      <span class="info"><?php echo "Clasificación: "; echo $res[$pelicula]->clasificacion?></span>
      <br>
      <span class="info"><?php echo "Idioma: "; echo $res[$pelicula]->idioma?></span>

      <h4 class="func">Funciones</h4>
        <form action="<?php echo SERVERURL?>tickets.php" method="post">
        <label for="horarios">Elige una función:</label>
        <select name="horarios" id="horarios" placeholder="Selecciona una función">
            <?php

                $lenght = count($resh);
                var_dump($lenght);

                
                for ($i = 0; $i < $lenght; $i++) {
                    echo "<option value='";
                    echo (array_values($resh)[$i]->pelicula) . " " . (array_values($resh)[$i]->fecha) . " " . (array_values($resh)[$i]->hora) . " Sala:" . (array_values($resh)[$i]->sala) . " $" .(array_values($resh)[$i]->precio);
                    echo "'>";
                    echo (array_values($resh)[$i]->pelicula) . " " . (array_values($resh)[$i]->fecha) . " " . (array_values($resh)[$i]->hora) . " Sala:" . (array_values($resh)[$i]->sala) . " $" .(array_values($resh)[$i]->precio);
                    echo "</option>";
                    
                }
            
                
              ?>
        </select>

        <div>
        <?php if (isset($_SESSION["login"])) {
          echo "<input type=submit class='btn btn-success' value='Comprar' name='comprar'>";
        } else {
          echo "<p class='msg-warn'>Debes loguearte para comprar el boleto. <a href='";
          echo  SERVERURL;
          echo "login.php'?> >Inicia sesión</a><p>";
        }
          ?>
        
        </div>
       
      </form>
        
      </div>
        
        
        
      </div> <!-- fin column1 -->
      <div class="column2">
        
      
    </div> <!-- fin description -->
    
   
  </div> <!-- fin container -->
</div> <!-- fin movie-card -->


<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\peliculas\<?php echo $res['Godzilla']->src?>" alt="Card image cap">
</div>

<h1><?php echo $res['Godzilla']->title?></h1>
<p><?php echo $res['Godzilla']->descript?> </p>
<p><?php echo $res['Godzilla']->actores?> </p>
<p><?php echo $res['Godzilla']->director?> </p>
<p><?php echo $res['Godzilla']->clasificacion?> </p>
<p><?php echo $res['Godzilla']->duracion?> </p>
<p><?php echo $res['Godzilla']->genero?> </p>
<p><?php echo $res['Godzilla']->idioma?> </p>
<p><?php echo $res['Godzilla']->trailer?> </p>
<p><?php echo $res['Godzilla']->estado?> </p> -->






<?php
include "shared/footer.php";
?>