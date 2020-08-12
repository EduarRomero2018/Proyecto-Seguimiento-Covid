<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
switch ($_SESSION['role']) {
    case 'Coordinador covid':
        $filtro = "";
        break;
    
    case 'Auxiliar de programacion':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario = $id_session";
        break;
    case 'Auxiliar de seguimiento':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_seguimiento = $id_session";
        break;
    case 'Digitador':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_resultado = $id_session";
        break;
    case 'Medico':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
        break;
}
            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad, numero_documento, id_usuario
                FROM pacientes P
                WHERE P.id NOT IN
                (SELECT pacientes_id FROM prog_toma_muestra) $filtro");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            
            require 'views/pptm_view.php';
