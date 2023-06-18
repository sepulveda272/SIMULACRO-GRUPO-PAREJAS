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



  $salidaDetalles = '[
    {
      "idSalidaDetalle": 1,
      "idSalida":  1,
      "idProducto":  1,
      "idCliente": 1,
      "idEmpleado": 2,
      "cantidadSalida": "10 martillos",
      "cantidadPropia": 10,
      "cantidadSubalquilada": 100000,
      "valorUnidad": 10000,
      "fechaStandBye": "17/06/2023",
      "estado": "BUENO",
      "valorTotal": 100000
    }
  ]';

$datosSalidaDetalle = json_decode($salidaDetalles, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosSalidaDetalle as $salidaDetalle) {
    
    mysqli_query($conexion,"INSERT INTO salidaDetalle (idSalidaDetalle,idSalida,idProducto,idCliente,idEmpleado,cantidadSalida,cantidadPropia,cantidadSubalquilada,valorUnidad,fechaStandBye,estado,valorTotal) 
    VALUES ('".$salidaDetalle['idSalidaDetalle']."','".$salidaDetalle['idSalida']."','".$salidaDetalle['idProducto']."','".$salidaDetalle['idCliente']."','".$salidaDetalle['idEmpleado']."','".$salidaDetalle['cantidadSalida']."','".$salidaDetalle['cantidadPropia']."','".$salidaDetalle['cantidadSubalquilada']."','".$salidaDetalle['valorUnidad']."','".$salidaDetalle['fechaStandBye']."','".$salidaDetalle['estado']."','".$salidaDetalle['valorTotal']."')");	
        
}	


mysqli_close($conexion);

?>