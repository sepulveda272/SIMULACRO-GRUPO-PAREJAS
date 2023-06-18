<?php
header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Productos.php");

$producto = new Productos();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $producto->get_producto();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $producto->get_producto_id($body["idProducto"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $producto-> insert_producto($body['idProducto'],$body['nombreProducto'],$body['precioProducto']);
        echo json_encode("insertado correctamente");
        header("Location: http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/alquilartemis/productos");

    break;
    case 'delete':
        $datos = $producto ->delete_producto($body['idProducto']);
        header('Location: http://localhost/SkylAb-114/SIMULACRO-GRUPO-PAREJAS/alquilartemis/productos');
        break;
}

?>