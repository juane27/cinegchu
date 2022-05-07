<?php
include "shared/header.php";
include "model/clsHorarios.php";
$id=$_GET["id"];
$v=new clsHorarios();
$res=$v->consultarId($id);

if($_POST){
  echo "pos";
  $v->id=$_POST["id"];
  $v->eliminar();
  header("Location:horarios.php");
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
            <th scope="row">Pelicula: </th>
            <td><?php echo $res->pelicula?></td>
        </tr>
        <tr>
            <th scope="row">Fecha: </th>
            <td><?php echo $res->fecha?></td>
        </tr>
        <tr>
            <th scope="row">Hora: </th>
            <td><?php echo $res->hora?></td>
        </tr>
        <tr>
            <th scope="row">Sala: </th>
            <td><?php echo $res->sala?></td>
        </tr>
        <tr>
            <th scope="row">Precio: </th>
            <td><?php echo $res->precio?></td>
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