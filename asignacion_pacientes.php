<?php
session_start();

require_once 'conexion.php';

/** asignacion de pacientes a usuarios */

if (isset($_REQUEST['proceso'])) {

    $proceso = $_REQUEST['proceso'];
    $cantidad_pacientes = $_REQUEST['cantidad_pacientes'];
    $id_usuario = $_REQUEST['id_usuario'];
    switch ($proceso) {
        case 'programacion':

            $pacientes = "SELECT id FROM pacientes WHERE id_usuario_programacion IS NULL LIMIT $cantidad_pacientes";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET id_usuario = ?, id_usuario_programacion = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $id_usuario,
                    $paciente->id
                ));
            }

            $pacientes = "SELECT * FROM pacientes WHERE id_usuario_programacion IS NULL";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            die(json_encode(array('ok',$stm->rowCount())));

        break;

        case 'seguimiento':

            $pacientes = "SELECT id FROM pacientes WHERE id_usuario_seguimiento IS NULL LIMIT $cantidad_pacientes";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET id_usuario_seguimiento = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $paciente->id
                ));
            }

            $pacientes = "SELECT * FROM pacientes WHERE id_usuario_seguimiento IS NULL";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            die(json_encode(array('ok',$stm->rowCount())));

        break;

        case 'resultado':

            $pacientes = "SELECT id FROM pacientes WHERE id_usuario_resultado IS NULL LIMIT $cantidad_pacientes";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET id_usuario_resultado = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $paciente->id
                ));
            }

            $pacientes = "SELECT * FROM pacientes WHERE id_usuario_resultado IS NULL";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            die(json_encode(array('ok',$stm->rowCount())));

        break;

        case 'medico':

            $pacientes = "SELECT id FROM pacientes WHERE id_usuario_notificacion IS NULL LIMIT $cantidad_pacientes";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($result_pacientes as $paciente){
                $stm = $conexion->prepare("UPDATE pacientes SET id_usuario_notificacion = ? WHERE id = ?");
                $stm->execute(array(
                    $id_usuario,
                    $paciente->id
                ));
            }

            $pacientes = "SELECT * FROM pacientes WHERE id_usuario_notificacion IS NULL";

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            die(json_encode(array('ok',$stm->rowCount())));

        break;
    }
}

/** datos para la asignacion de pacientes */

if(isset($_REQUEST['asignacion']))
{
    $proceso = $_REQUEST['asignacion'];
    switch ($proceso) {
        case 'programacion':

            $usuarios = "SELECT * FROM usuarios WHERE roles = 'Auxiliar de programacion'";
            $pacientes = "SELECT COUNT(*) as cantidad_pacientes FROM pacientes WHERE id_usuario_programacion IS NULL";

            $stm = $conexion->prepare($usuarios);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found_usuarios',null,null)));
            }

            $result_usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found',null,null)));
            }

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            die(json_encode(array('ok',$result_pacientes,$result_usuarios)));

        break;

        case 'seguimiento':

            $usuarios = "SELECT * FROM usuarios WHERE roles = 'Auxiliar de seguimiento'";
            $pacientes = "SELECT COUNT(*) as cantidad_pacientes FROM pacientes WHERE id_usuario_seguimiento IS NULL";

            $stm = $conexion->prepare($usuarios);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found_usuarios',null,null)));
            }

            $result_usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found',null,null)));
            }

            $result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

            die(json_encode(array('ok',$result_pacientes,$result_usuarios)));

        break;

        case 'medico':

            $usuarios = "SELECT * FROM usuarios WHERE roles = 'Medico'";
            $pacientes = "SELECT COUNT(*) as cantidad_pacientes FROM pacientes WHERE id_usuario_notificacion IS NULL";

            $stm = $conexion->prepare($usuarios);
            $stm->execute();

            if($stm->rowCount() == 0){
                die(json_encode(array('!found_usuarios',null,null)));
            }

            $result_usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

            $stm = $conexion->prepare($pacientes);
            $stm->execute();

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
