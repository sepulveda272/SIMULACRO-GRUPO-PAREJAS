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


  $clientes = '[
    {
      "idCliente":  1,
      "nombreCliente": "camilo",
      "celularCliente": 1234567,
      "obraCliente": "Calle 13"
    },
    {
      "idCliente":  2,
      "nombreCliente": "joel",
      "celularCliente": 7894561,
      "obraCliente": "Calle 16"
    }
  ]';



$datosclientes = json_decode($clientes, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis_grupo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosclientes as $cliente) {
    
    mysqli_query($conexion,"INSERT INTO clientes (idCliente,nombreCliente,celularCliente,obraCliente) 
    VALUES ('".$cliente['idCliente']."','".$cliente['nombreCliente']."','".$cliente['celularCliente']."','".$cliente['obraCliente']."')");	
        
}	


mysqli_close($conexion);

?>