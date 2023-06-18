<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

class Clientes extends Conectar{
    public function get_cliente(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM clientes");
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

    public function insert_cliente($idCliente,$nombreCliente,$celularCliente,$obraCliente){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO empleados(idCliente,nombreCliente,celularCliente,obraCliente) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idCliente);
        $stm->bindValue(2,$nombreCliente);
        $stm->bindValue(3,$celularCliente);
        $stm->bindValue(4,$obraCliente);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>