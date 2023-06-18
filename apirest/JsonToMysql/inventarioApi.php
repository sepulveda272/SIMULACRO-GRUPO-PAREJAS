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



  $inventarios = '[
    {
      "idInventario":  1,
      "idProducto": 1,
      "CantidadInicial": 10,
      "CantidadIngresos": 5,
      "CantidadSalidas": 10,
      "CantidadFinal": 5,
      "FechaInventario": "18/06/2023",
      "TipoOperacion": "Digital"
    }
  ]';

$datosInventario = json_decode($inventarios, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosInventario as $inventario) {
    
    mysqli_query($conexion,"INSERT INTO inventario (idInventario,idProducto,CantidadInicial,CantidadIngresos,CantidadSalidas,CantidadFinal,FechaInventario,TipoOperacion) 
    VALUES ('".$inventario['idInventario']."','".$inventario['idProducto']."','".$inventario['CantidadInicial']."','".$inventario['CantidadIngresos']."','".$inventario['CantidadSalidas']."','".$inventario['CantidadFinal']."','".$inventario['FechaInventario']."','".$inventario['TipoOperacion']."')");	
        
}	


mysqli_close($conexion);

?>