<?php
require "conexion.php";


function con(){
    return new mysqli("localhost","root","root","cinegchu");
}



$con = con();

$query = "SELECT `nombre`, `lat`, `lon` FROM `locales`";

$result = $con->query($query);



 while ($row = mysqli_fetch_array($result)) {

    $latitudes[] = $row['lat'];
    $longitudes[] = $row['lon'];

    $coordinates[] = '\''. $row['nombre'].'\','.$row['lat'].','.$row['lon'];

}

?>