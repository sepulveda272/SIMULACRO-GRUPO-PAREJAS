<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


class Entradas extends Conectar{
    public function get_entrada(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM entrada");
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

    public function insert_entrada($idEntrada,$idSalida,$idCliente,$idEmpleado,$fechaEntrada,$horaEntrada,$placaTransporte,$observaciones){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO entrada(idEntrada,idSalida,idCliente,idEmpleado,fechaEntrada,horaEntrada,observaciones) VALUES(?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idEntrada);
        $stm->bindValue(2,$idSalida);
        $stm->bindValue(3,$idCliente);
        $stm->bindValue(4,$idEmpleado);
        $stm->bindValue(5,$fechaEntrada);
        $stm->bindValue(6,$horaEntrada);
        $stm->bindValue(7,$observaciones);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>