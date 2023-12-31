<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/EntradaDetalle.php");

$entradaDetalle = new EntradasDetalles();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $entradaDetalle->get_entrada_Detalle();
        echo json_encode($datos);
    break;

    

    case "GetId":
        $datos = $entradaDetalle->get_entrada_Detalle_id($body["idEntradaDetalle"]);
        echo json_encode($datos);
    break;

    case "GetIdEntrada":
        $datos = $entradaDetalle->get_entrada_id($body["idEntrada"]);
        echo json_encode($datos);
    break;

    case "GetIdProducto":
        $datos = $entradaDetalle->get_producto_id($body["idProducto"]);
        echo json_encode($datos);
    break;

    case "GetIdCliente":
        $datos = $entradaDetalle->get_cliente_id($body["idCliente"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $entradaDetalle-> insert_entrada_Detalle($body['idEntradaDetalle'],$body['idEntrada'],$body['idProducto'],$body['idCliente'],$body['entradaCantidad'],$body['entradaCantidadPropia'],$body['entradaCantidadSubalquilada'],$body['estado']);
        echo json_encode("insertado correctamente");
        header("Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entradaDetalle");

        break;
        case 'delete':
            $datos = $entradaDetalle ->delete_entrada_Detalle($body['idEntradaDetalle']);
            header('Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entradaDetalle');
            break;
}

?>