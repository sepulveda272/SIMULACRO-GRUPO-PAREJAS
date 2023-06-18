<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


class Salidas extends Conectar{
    public function get_salida(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM salida");
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

    public function insert_salida($idSalida,$idCliente,$idEmpleado,$fechaSalida,$horaSalida,$subtotalPeso,$placaTransporte,$observaciones){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO salida(idSalida,idCliente,idEmpleado,fechaSalida,horaSalida,subtotalPeso,placaTransporte,observaciones) VALUES(?,?,?,?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idSalida);
        $stm->bindValue(2,$idCliente);
        $stm->bindValue(3,$idEmpleado);
        $stm->bindValue(4,$fechaSalida);
        $stm->bindValue(5,$horaSalida);
        $stm->bindValue(6,$subtotalPeso);
        $stm->bindValue(7,$placaTransporte);
        $stm->bindValue(8,$observaciones);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>