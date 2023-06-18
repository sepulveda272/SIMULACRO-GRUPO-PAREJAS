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



  $salidas = '[
    {
      "idSalida":  1,
      "idCliente": 1,
      "idEmpleado": 2,
      "fechaSalida": "17/06/2023",
      "horaSalida": "6:00pm",
      "subtotalPeso": 100000,
      "placaTransporte": "kkt625",
      "observaciones": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi ipsum quod illo in! Expedita sed"
    }
  ]';

$datosSalida = json_decode($salidas, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosSalida as $salida) {
    
    mysqli_query($conexion,"INSERT INTO salida (idSalida,idCliente,idEmpleado,fechaSalida,horaSalida,subtotalPeso,placaTransporte,observaciones) 
    VALUES ('".$salida['idSalida']."','".$salida['idCliente']."','".$salida['idEmpleado']."','".$salida['fechaSalida']."','".$salida['horaSalida']."','".$salida['subtotalPeso']."','".$salida['placaTransporte']."','".$salida['observaciones']."')");	
        
}	


mysqli_close($conexion);

?>