<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

class Productos extends Conectar{
    public function get_producto(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM productos");
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

    public function insert_producto($idProducto,$nombreProducto,$precioProducto){
        $idProducto = $_POST["idProducto"];
        $nombreProducto = $_POST["nombreProducto"];
        $precioProducto = $_POST["precioProducto"];
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO productos(idProducto,nombreProducto,precioProducto) VALUES(?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idProducto);
        $stm->bindValue(2,$nombreProducto);
        $stm->bindValue(3,$precioProducto);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
    public function delete_producto($idProducto){
        $idProducto = $_POST["idProducto"];
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar ->prepare("DELETE FROM productos WHERE idProducto= ?");
        $stm -> bindValue(1,$idProducto);
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>