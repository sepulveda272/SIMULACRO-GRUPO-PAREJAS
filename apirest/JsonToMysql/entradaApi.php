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



  $entradas = '[
    {
      "idEntrada":  1,
      "idSalida": 1,
      "idCliente": 2,
      "idEmpleado": 1,
      "fechaEntrada": "26/06/2023",
      "horaEntrada": "6:00pm",
      "observaciones": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi ipsum quod illo in! Expedita sed"
    }
  ]';

$datosEntrada = json_decode($entradas, true);


$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosEntrada as $entrada) {
    
    mysqli_query($conexion,"INSERT INTO entrada (idEntrada,idSalida,idCliente,idEmpleado,fechaEntrada,horaEntrada,observaciones) 
    VALUES ('".$entrada['idEntrada']."','".$entrada['idSalida']."','".$entrada['idCliente']."','".$entrada['idEmpleado']."','".$entrada['fechaEntrada']."','".$entrada['horaEntrada']."','".$entrada['observaciones']."')");	
        
}	


mysqli_close($conexion);

?>