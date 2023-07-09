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



  $entradaDetalles = '[
    {
      "idEntradaDetalle": 1,
      "idEntrada":  1,
      "idProducto":  1,
      "idCliente": 1,
      "entradaCantidad": "10 martillos",
      "entradaCantidadPropia": "6 martillos",
      "entradaCantidadSubalquilada": "4 martillos",
      "estado": "Mal estado"
    }
  ]';

$datosEntradaDetalle = json_decode($entradaDetalles, true);


$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosEntradaDetalle as $entradaDetalle) {
    
    mysqli_query($conexion,"INSERT INTO entradaDetalle (idEntradaDetalle,idEntrada,idProducto,idCliente,entradaCantidad,entradaCantidadPropia,entradaCantidadSubalquilada,estado) 
    VALUES ('".$entradaDetalle['idEntradaDetalle']."','".$entradaDetalle['idEntrada']."','".$entradaDetalle['idProducto']."','".$entradaDetalle['idCliente']."','".$entradaDetalle['entradaCantidad']."','".$entradaDetalle['entradaCantidadPropia']."','".$entradaDetalle['entradaCantidadSubalquilada']."','".$entradaDetalle['estado']."')");	
        
}	


mysqli_close($conexion);

?>