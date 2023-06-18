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


  $empleados = '[
    {
      "idEmpleado":  1,
      "nombreEmpleado": "Juan",
      "celularEmpleado": 3184606,
      "direccionEmpleado": "Calle 20"
    },
    {
      "idEmpleado":  2,
      "nombreEmpleado": "Jose",
      "celularEmpleado": 3123909,
      "direccionEmpleado": "Calle 14"
    }
  ]';



$datosempleados = json_decode($empleados, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosempleados as $empleado) {
    
    mysqli_query($conexion,"INSERT INTO empleados (idEmpleado,nombreEmpleado,celularEmpleado,direccionEmpleado) 
    VALUES ('".$empleado['idEmpleado']."','".$empleado['nombreEmpleado']."','".$empleado['celularEmpleado']."','".$empleado['direccionEmpleado']."')");	
        
}	


mysqli_close($conexion);

?>