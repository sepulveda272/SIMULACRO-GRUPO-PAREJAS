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

    case "GetIdSalida":
        $datos = $salidaDetalle->get_salida_id($body["idSalida"]);
        echo json_encode($datos);
    break;

    case "GetIdProducto":
        $datos = $salidaDetalle->get_producto_id($body["idProducto"]);
        echo json_encode($datos);
    break;
    case "GetIdCliente":
        $datos = $salidaDetalle->get_cliente_id($body["idCliente"]);
        echo json_encode($datos);
    break;
    case "GetIdEmpleado":
        $datos = $salidaDetalle->get_empleado_id($body["idEmpleado"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $salidaDetalle-> insert_salida_Detalle($body['idSalidaDetalle'],$body['idSalida'],$body['idProducto'],$body['idCliente'],$body['idEmpleado'],$body['cantidadSalida'],$body['cantidadPropia'],$body['cantidadSubalquilada'],$body['valorUnidad'],$body['fechaStandBye'],$body['estado'],$body['valorTotal']);
        echo json_encode("insertado correctamente");
        header("Location: http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/alquilartemis/salidaDetalle");

        break;
        case 'delete':
            $datos = $salidaDetalle ->delete_salida_Detalle($body['idSalidaDetalle']);
            header('Location: http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/alquilartemis/salidaDetalle');
            break;
}

?>