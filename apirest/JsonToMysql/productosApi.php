<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
//json_decode  ->  Takes a JSON encoded string and converts it into a PHP value.
//json_encode  ->  Returns the JSON representation of a value

//PDO_MYSQL 
//is a driver that implements the PHP Data Objects (PDO) interface to enable 
//access from PHP to MySQL databases.


//MySQLi
//PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases


  $productos = '[
    {
      "idProducto":  1,
      "nombreProducto": "Martillo",
      "precioProducto": 10000
    }
  ]';



$datosproductos = json_decode($productos, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosproductos as $producto) {
    
    mysqli_query($conexion,"INSERT INTO productos (idProducto,nombreProducto,precioProducto) 
    VALUES ('".$producto['idProducto']."','".$producto['nombreProducto']."','".$producto['precioProducto']."')");	
        
}	


mysqli_close($conexion);

?>