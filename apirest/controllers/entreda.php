<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Entrada.php");

$entrada = new Entradas();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $entrada->get_entrada();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $entrada->get_entrada_id($body["idEntrada"]);
        echo json_encode($datos);
    break;

    case "GetIdSalida":
        $datos = $entrada->get_salida_id($body["idSalida"]);
        echo json_encode($datos);
    break;

    case "GetIdCliente":
        $datos = $entrada->get_cliente_id($body["idCliente"]);
        echo json_encode($datos);
    break;

    case "GetIdEmpleado":
        $datos = $entrada->get_empleado_id($body["idEmpleado"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $entrada-> insert_entrada($body['idEntrada'],$body['idSalida'],$body['idCliente'],$body['idEmpleado'],$body['fechaEntrada'],$body['horaEntrada'],$body['observaciones']);
        echo json_encode("insertado correctamente");
        header("Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entrada");

        break;
        case 'delete':
            $datos = $entrada ->delete_entrada($body['idEntrada']);
            header('Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/entrada');
            break;
}


?>