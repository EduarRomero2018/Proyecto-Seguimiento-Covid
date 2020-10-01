<?php
session_start();

require_once 'conexion.php';

/** asignacion de pacientes a usuarios */
// print_r($_REQUEST);

if (isset($_REQUEST['proceso'])) {

    $proceso = $_REQUEST['proceso'];
    $asignacion = $_REQUEST['tipo_asignacion'];
    $cantidad_pacientes = $_REQUEST['cantidad_pacientes'];
    $id_usuario = $_REQUEST['id_usuario'];
    $fecha_realizacion = $_REQUEST['fecha_realizacion'];
    $municipio = $_REQUEST['municipio'];

    switch ($proceso) {
        
        case 'seguimiento':

            if ($asignacion == 1) {
                $tabla = 'prog_toma_muestra';
                $campo_seguimiento = 'id_usuario_seguimiento';
            } else {
                $tabla = 'segunda_toma_muestra_control_2';
                $campo_seguimiento = 'id_usuario_seguimiento_2';
            }
            

            $pacientes = "SELECT pacientes.id
            FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 'VIVO' AND municipio = ? AND aseguradora = 'MUTUAL SER' AND $campo_seguimiento IS NULL AND DATE(fecha_realizacion) = ? LIMIT $cantidad_pacientes";


            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($municipio,$fecha_realizacion));

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET $campo_seguimiento = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $paciente->id
                ));

            }

            $pacientes = "SELECT * FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 'VIVO' AND municipio = ? AND aseguradora = 'MUTUAL SER' AND $campo_seguimiento IS NULL AND DATE(fecha_realizacion) = ?";

            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($municipio,$fecha_realizacion));

            die(json_encode(array('ok',$stm->rowCount())));

        break;

        case 'medico':

            if ($asignacion == 1) {
                $tabla = 'prog_toma_muestra';
                $campo_medico = 'id_usuario_notificacion';
            } else {
                $tabla = 'segunda_toma_muestra_control_2';
                $campo_medico = 'id_usuario_notificacion_2';
            }

            $pacientes = "SELECT pacientes.id FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 1 AND municipio = ? AND aseguradora = 'MUTUAL SER' AND $campo_medico IS NULL AND resultado = 1 AND DATE(fecha_realizacion) = ? LIMIT $cantidad_pacientes";

            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($municipio,$fecha_realizacion));

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET $campo_medico = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $paciente->id
                ));
            }

            $pacientes = "SELECT * FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 1 AND $campo_medico IS NULL AND resultado = 1 AND DATE(fecha_realizacion) = ?";
            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($fecha_realizacion));

            die(json_encode(array('ok',$stm->rowCount())));

        break;
    }
}

/** datos para la asignacion de pacientes */

if(isset($_REQUEST['asignacion']))
{
    $proceso = $_REQUEST['asignacion'];
    $asignacion = $_REQUEST['tipo_asignacion'];
    $fecha_realizacion = $_REQUEST['fecha_realizacion'];
    $municipio = $_REQUEST['municipio'];

    switch ($proceso) {

        case 'seguimiento':

            if ($asignacion == 1) {
                $tabla = 'prog_toma_muestra';
                $campo_seguimiento = 'id_usuario_seguimiento';
            } else {
                $tabla = 'segunda_toma_muestra_control_2';
                $campo_seguimiento = 'id_usuario_seguimiento_2';
            }

            $usuarios = "SELECT * FROM usuarios WHERE roles = 'Auxiliar de seguimiento'";
            $pacientes = "SELECT COUNT(*) as cantidad_pacientes FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 1
            AND municipio = ?
			AND aseguradora = 'MUTUAL SER'
            AND $campo_seguimiento IS NULL
            AND DATE(fecha_realizacion) = ?";

            $stm = $conexion->prepare($usuarios);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found_usuarios',null,null)));
            }

            $result_usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($municipio,$fecha_realizacion));

            if($stm->rowCount() == 0){
                die(json_encode(array('!found',null,null)));
            }

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            die(json_encode(array('ok',$result_pacientes,$result_usuarios)));

        break;

        case 'medico':

            if ($asignacion == 1) {
                $tabla = 'prog_toma_muestra';
                $campo_medico = 'id_usuario_notificacion';
            } else {
                $tabla = 'segunda_toma_muestra_control_2';
                $campo_medico = 'id_usuario_notificacion_2';
            }

            $usuarios = "SELECT * FROM usuarios WHERE roles = 'Medico'";
            $pacientes = "SELECT COUNT(*) as cantidad_pacientes FROM pacientes
            INNER JOIN $tabla ON pacientes.id = pacientes_id
            WHERE estado_paciente = 1 AND municipio = ? AND aseguradora = 'MUTUAL SER' AND $campo_medico IS NULL AND resultado = 1 AND DATE(fecha_realizacion) = ?";

            $stm = $conexion->prepare($usuarios);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found_usuarios',null,null)));
            }

            $result_usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            $stm = $conexion->prepare($pacientes);
            $stm->execute(array($municipio,$fecha_realizacion));

            if($stm->rowCount() == 0){
                die(json_encode(array('!found',null,null)));
            }

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            die(json_encode(array('ok',$result_pacientes,$result_usuarios)));

        break;
    }
}
else
{
    require_once 'views/asignacion2_view.php';
}


/*
Auxiliares de enfermeria => notifican a los negativo
Medico => notifican a los positivos*/
