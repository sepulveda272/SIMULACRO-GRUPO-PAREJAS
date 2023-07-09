<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Inventario.php");

$inventario = new Inventarios();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $inventario->get_inventario();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $inventario->get_inventario_id($body["idInventario"]);
        echo json_encode($datos);
    break;

    case "GetIdProducto":
        $datos = $inventario->get_producto_id($body["idProducto"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $inventario-> insert_inventario($body['idInventario'],$body['idProducto'],$body['CantidadInicial'],$body['CantidadIngresos'],$body['CantidadSalidas'],$body['CantidadFinal'],$body['FechaInventario'],$body['TipoOperacion']);
        echo json_encode("insertado correctamente");
        header("Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/inventario");

        break;
        case 'delete':
            $datos = $inventario ->delete_inventario($body['idInventario']);
            header('Location: http://localhost/SIMULACRO-GRUPO-PAREJAS/alquilartemis/inventario');
            break;
}


?>