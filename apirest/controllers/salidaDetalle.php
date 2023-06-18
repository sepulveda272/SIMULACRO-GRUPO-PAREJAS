<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/SalidaDetalle.php");

$salidaDetalle = new SalidasDetalles();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $salidaDetalle->get_salida_Detalle();
        echo json_encode($datos);
    break;

    

    case "GetId":
        $datos = $salidaDetalle->get_salida_Detalle_id($body["idSalidaDetalle"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $salida-> insert_salida_Detalle($body['idSalidaDetalle'],$body['idSalida'],$body['idProducto'],$body['idCliente'],$body['idEmpleado'],$body['cantidadSalida'],$body['cantidadPropia'],$body['cantidadSubalquilada'],$body['valorUnidad'],$body['fechaStandBye'],$body['estado'],$body['valorTotal']);
        echo json_encode("insertado correctamente");

    break;
}

?>