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

    public function insert_salida_Detalle($idSalidaDetalle,$idSalida,$idProducto,$idCliente,$idEmpleado,$cantidadSalida,$cantidadPropia,$cantidadSubalquilada,$valorUnidad,$fechaStandBye,$estado,$valorTotal){
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
}

?>