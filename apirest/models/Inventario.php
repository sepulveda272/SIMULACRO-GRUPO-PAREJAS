<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


class Inventarios extends Conectar{
    public function get_inventario(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM inventario");
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exeception $e) {
            return $e -> getMessage();
        }
    }
    public function get_inventario_id($idInventario){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM inventario WHERE idInventario = ?");
            $stm -> bindValue(1,$idInventario);
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

    public function insert_inventario($idInventario,$idProducto,$CantidadInicial,$CantidadIngresos,$CantidadSalidas,$CantidadFinal,$FechaInventario,$TipoOperacion){
        $idInventario = $_POST["idInventario"];
        $idProducto = $_POST["idProducto"];
        $CantidadInicial = $_POST["CantidadInicial"];
        $CantidadIngresos = $_POST["CantidadIngresos"];
        $CantidadSalidas = $_POST["CantidadSalidas"];
        $CantidadFinal = $_POST["CantidadFinal"];
        $FechaInventario = $_POST["FechaInventario"];
        $TipoOperacion = $_POST["TipoOperacion"];
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO inventario(idInventario,idProducto,CantidadInicial,CantidadIngresos,CantidadSalidas,CantidadFinal,FechaInventario,TipoOperacion) VALUES(?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idInventario);
        $stm->bindValue(2,$idProducto);
        $stm->bindValue(3,$CantidadInicial);
        $stm->bindValue(4,$CantidadIngresos);
        $stm->bindValue(5,$CantidadSalidas);
        $stm->bindValue(6,$CantidadFinal);
        $stm->bindValue(7,$FechaInventario);
        $stm->bindValue(8,$TipoOperacion);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_inventario($idInventario){
        $idInventario = $_POST["idInventario"];
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar ->prepare("DELETE FROM inventario WHERE idInventario= ?");
        $stm -> bindValue(1,$idInventario);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>