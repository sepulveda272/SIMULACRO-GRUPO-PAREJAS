<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Salida.php");

$salida = new Salidas();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $salida->get_salida();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $salida->get_salida_id($body["idSalida"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $salida-> insert_salida($body['idSalida'],$body['idCliente'],$body['idEmpleado'],$body['fechaSalida'],$body['horaSalida'],$body['subtotalPeso'],$body['placaTransporte'],$body['observaciones']);
        echo json_encode("insertado correctamente");

    break;
}


?>