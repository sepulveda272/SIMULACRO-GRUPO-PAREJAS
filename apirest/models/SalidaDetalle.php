<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


class SalidasDetalles extends Conectar{
    public function get_salida_Detalle(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM salidaDetalle");
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }
    public function get_salida_Detalle_id($idSalidaDetalle){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM salidaDetalle WHERE idSalidaDetalle = ?");
            $stm -> bindValue(1,$idSalidaDetalle);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    public function get_salida_id($idSalida){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM salida WHERE idSalida = ?");
            $stm -> bindValue(1,$idSalida);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    public function get_producto_id($idProducto){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM productos WHERE idProducto = ?");
            $stm -> bindValue(1,$idProducto);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    

    public function get_cliente_id($idCliente){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM clientes WHERE idCliente = ?");
            $stm -> bindValue(1,$idCliente);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    public function get_empleado_id($idEmpleado){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM empleados WHERE idEmpleado = ?");
            $stm -> bindValue(1,$idEmpleado);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    public function insert_salida_Detalle($idSalidaDetalle,$idSalida,$idProducto,$idCliente,$idEmpleado,$cantidadSalida,$cantidadPropia,$cantidadSubalquilada,$valorUnidad,$fechaStandBye,$estado,$valorTotal){
        $idSalidaDetalle = $_POST["idSalidaDetalle"];
        $idSalida = $_POST["idSalida"];
        $idProducto = $_POST["idProducto"];
        $idCliente = $_POST["idCliente"];
        $idEmpleado = $_POST["idEmpleado"];
        $cantidadSalida = $_POST["cantidadSalida"];
        $cantidadPropia = $_POST["cantidadPropia"];
        $cantidadSubalquilada = $_POST["cantidadSubalquilada"];
        $valorUnidad = $_POST["valorUnidad"];
        $fechaStandBye = $_POST["fechaStandBye"];
        $estado = $_POST["estado"];
        $valorTotal = $_POST["valorTotal"];
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO salidaDetalle(idSalidaDetalle,idSalida,idProducto,idCliente,idEmpleado,cantidadSalida,cantidadPropia,cantidadSubalquilada,valorUnidad,fechaStandBye,estado,valorTotal) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idSalidaDetalle);
        $stm->bindValue(2,$idSalida);
        $stm->bindValue(3,$idProducto);
        $stm->bindValue(4,$idCliente);
        $stm->bindValue(5,$idEmpleado);
        $stm->bindValue(6,$cantidadSalida);
        $stm->bindValue(7,$cantidadPropia);
        $stm->bindValue(8,$cantidadSubalquilada);
        $stm->bindValue(9,$valorUnidad);
        $stm->bindValue(10,$fechaStandBye);
        $stm->bindValue(11,$estado);
        $stm->bindValue(12,$valorTotal);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_salida_Detalle($idSalidaDetalle){
        $idSalidaDetalle = $_POST["idSalidaDetalle"];
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar ->prepare("DELETE FROM salidaDetalle WHERE idSalidaDetalle= ?");
        $stm -> bindValue(1,$idSalidaDetalle);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>