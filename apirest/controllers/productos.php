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

        $datos = $Producto-> insert_Producto($body['idProducto'],$body['nombreProducto'],$body['precioProducto']);
        echo json_encode("insertado correctamente");

    break;
}

?>