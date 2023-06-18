<?php
header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Empleados.php");

$empleado = new Empleados();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']){
    
    case "GetAll":
        $datos = $empleado->get_empleado();
        echo json_encode($datos);
    break;


    case "GetId":
        $datos = $empleado->get_empleado_id($body["idEmpleado"]);
        echo json_encode($datos);
    break;

    case "insert":

        $datos = $empleado-> insert_empleado($body['idEmpleado'],$body['nombreEmpleado'],$body['celularEmpleado'],$body['direccionEmpleado']);
        echo json_encode("insertado correctamente");

    break;
}

?>