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
        $filtro = "";
        break;
    case 'Medico':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
        break;
}

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
                numero_documento,DATE(fecha_programacion) AS fecha_programacion, U.nombre_apellido
                FROM prog_toma_muestra PTM
                RIGHT JOIN pacientes P ON PTM.pacientes_id = P.id
                LEFT JOIN usuarios U ON p.id_usuario = U.id
                WHERE PTM.fecha_realizacion IS NOT NULL
                AND resultado = 'Pendiente'
                AND estado_paciente = 'VIVO' $filtro");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/ppr_view.php';
