<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

class Empleados extends Conectar{
    public function get_empleado(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM empleados");
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

    public function insert_empleado($idEmpleado,$nombreEmpleado,$celularEmpleado,$direccionEmpleado){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO empleados(idEmpleado,nombreEmpleado,celularEmpleado,direccionEmpleado) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$idEmpleado);
        $stm->bindValue(2,$nombreEmpleado);
        $stm->bindValue(3,$celularEmpleado);
        $stm->bindValue(4,$direccionEmpleado);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>