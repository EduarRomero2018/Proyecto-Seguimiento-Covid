<?php

require_once 'conexion.php';

$stm = $conexion->prepare("SELECT id, nombre_apellido, roles FROM usuarios WHERE nombre_apellido != 'sistemas'");
$stm->execute();

$usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

$stm = $conexion->prepare("SELECT * FROM pacientes WHERE id_usuario IS NULL");
$stm->execute();

$cantidad_pacientes = $stm->rowCount();

if(isset($_REQUEST['asignar'])){
    $id_usuario = $_REQUEST['id_usuario'];
    $cantidad = $_REQUEST['cantidad_pacientes'];

    $stm = $conexion->prepare("SELECT id FROM pacientes WHERE id_usuario IS NULL LIMIT $cantidad");
    $stm->execute();

    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $paciente){
        $stm = $conexion->prepare("UPDATE pacientes SET id_usuario = ? WHERE id = $paciente->id");
        $stm->execute(array($id_usuario));

        if($stm->errorInfo()[2] != NULL){
            exit(print_r($stm->errorInfo()));
        }
    }
}

require 'views/asignacion_pacientes_view.php';


/* 
Auxiliares de enfermeria => notifican a los negativo
Medico => notifican a los positivos*/
