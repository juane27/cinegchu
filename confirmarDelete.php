<?php
include "shared/header.php";
include "model/clsMovie.php";
$id=$_GET["id"];
$v=new clsMovie();
$res=$v->consultarId($id);

if($_POST){
  echo "pos";
  $v->id=$_POST["id"];
  $v->eliminar();
  header("Location:banners.php");
}
?>

<main>
  <h1>Esta Seguro que quire eliminar este Registro:</h1>
  <h2>Los datos no se podrán recuperar</h2>

  <table class="w-40 m-auto mt-5" class="table">
    <tbody>
      <tr>
        <th scope="row">Id: </th>
        <td><?php echo $res->id?></td>
      </tr>
      <tr>
        <th scope="row">Titulo: </th>
        <td><?php echo $res->title?></td>
      </tr>
        <tr>
            <th scope="row">Sinopsis: </th>
            <td><?php echo $res->descript?></td>
        </tr>
        <tr>
            <th scope="row">Actores: </th>
            <td><?php echo $res->actores?></td>
        </tr>
        <tr>
            <th scope="row">Director: </th>
            <td><?php echo $res->director?></td>
        </tr>
        <tr>
            <th scope="row">Clasificación: </th>
            <td><?php echo $res->clasificacion?></td>
        </tr>
        <tr>
            <th scope="row">Duración: </th>
            <td><?php echo $res->duracion?></td>
        </tr>
        <tr>
            <th scope="row">Genero: </th>
            <td><?php echo $res->genero?></td>
        </tr>
        <tr>
            <th scope="row">Idioma: </th>
            <td><?php echo $res->idioma?></td>
        </tr>
        <tr>
            <th scope="row">Trailer: </th>
            <td><?php echo $res->trailer?></td>
        </tr>
        <tr>
            <th scope="row">Estreno: </th>
            <td><?php echo $res->movie_premiere?></td>
        </tr>
        <tr>
            <th scope="row">Precio: </th>
            <td><?php echo $res->price?></td>
        </tr>
        <tr>
            <th scope="row">Carpeta: </th>
            <td><?php echo $res->folder?></td>
        </tr>
        <tr>
            <th scope="row">Poster: </th>
            <td><?php echo $res->src?></td>
        </tr>
        <tr>
            <th scope="row">Poster Cover: </th>
            <td><?php echo $res->src_cover?></td>
        </tr>
        <tr>
            <th scope="row">Fecha de creación: </th>
            <td><?php echo $res->created_at?></td>
        </tr>

    </tbody>

  </table>
  <form method="POST" action="" class="w-40 m-auto mt-5">
    <input name="id" type="hidden" value="<?php echo $res->id?>">
    <input class="btn btn-danger" type="submit" value="Sí">
    <button class="btn btn-warning" type="submit">Regresar</button>
  </form>
</main>

<?php include "shared/footer.php" ?>