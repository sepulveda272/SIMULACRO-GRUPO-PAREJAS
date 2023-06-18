<?php
header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Clientes.php");

$cliente = new Clientes();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $cliente->get_cliente();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $cliente->get_cliente_id($body["idCliente"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $cliente-> insert_cliente($body['idCliente'],$body['nombreCliente'],$body['celularCliente'],$body['obraCliente']);
        echo json_encode("insertado correctamente");

    break;
}

?>