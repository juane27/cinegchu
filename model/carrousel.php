<?php
require "conexion.php";

    function con(){
        return new mysqli("localhost","root","root","cinemax");
    }



?>
<?php

function get_imgs(){
        $images = array();
        $con = con();
        $query=$con->query("SELECT * FROM peliculas order by created_at desc");
        while($r=$query->fetch_object()){
            $images[] = $r;
        }
        return $images;
    }


function get_img($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from peliculas where id=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del($id){
	$con = con();
	$con->query("delete from image where id=$id");
}

?>