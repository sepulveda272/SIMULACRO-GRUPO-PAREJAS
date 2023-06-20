<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


class EntradasDetalles extends Conectar{
    public function get_entrada_Detalle(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM entradaDetalle");
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }
    public function get_entrada_Detalle_id($idEntradaDetalle){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM entradaDetalle WHERE idEntradaDetalle = ?");
            $stm -> bindValue(1,$idEntradaDetalle);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }

    public function get_entrada_id($idEntrada){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM entrada WHERE idEntrada = ?");
            $stm -> bindValue(1,$idEntrada);
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

    public function insert_entrada_Detalle($idEntradaDetalle,$idEntrada,$idProducto,$idCliente,$entradaCantidad,$entradaCantidadPropia,$entradaCantidadSubalquilada,$estado){
        $idEntradaDetalle = $_POST["idEntradaDetalle"];
        $idEntrada = $_POST["idEntrada"];
        $idProducto = $_POST["idProducto"];
        $idCliente = $_POST["idCliente"];
        $entradaCantidad = $_POST["entradaCantidad"];
        $entradaCantidadPropia = $_POST["entradaCantidadPropia"];
        $entradaCantidadSubalquilada = $_POST["entradaCantidadSubalquilada"];
        $estado = $_POST["estado"];
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO entradaDetalle(idEntradaDetalle,idEntrada,idProducto,idCliente,entradaCantidad,entradaCantidadPropia,entradaCantidadSubalquilada,estado) VALUES(?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idEntradaDetalle);
        $stm->bindValue(2,$idEntrada);
        $stm->bindValue(3,$idProducto);
        $stm->bindValue(4,$idCliente);
        $stm->bindValue(5,$entradaCantidad);
        $stm->bindValue(6,$entradaCantidadPropia);
        $stm->bindValue(7,$entradaCantidadSubalquilada);
        $stm->bindValue(8,$estado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
    public function delete_entrada_Detalle($idEntradaDetalle){
        $idEntradaDetalle = $_POST["idEntradaDetalle"];
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar ->prepare("DELETE FROM entradaDetalle WHERE idEntradaDetalle= ?");
        $stm -> bindValue(1,$idEntradaDetalle);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>