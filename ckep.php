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
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento, P.edad, P.numero_documento, SP.fecha_entrega_kits
                FROM seguimiento_paciente SP
                RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
                WHERE entrega_kits = 'Si'$filtro");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/ckep_view.php';
