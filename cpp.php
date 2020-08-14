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
$usuario_id = $_SESSION['id'];
$consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
                numero_documento,DATE(fecha_programacion) AS fecha_programacion, UM.nombre_apellido
                FROM prog_toma_muestra PTM
                RIGHT JOIN pacientes P ON PTM.pacientes_id = P.id
                LEFT JOIN usuarios UM ON P.id_usuario = UM.id
                WHERE fecha_programacion IS NOT NULL AND estado_paciente = 'VIVO'
                AND fecha_realizacion IS NULL $filtro");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cpp_view.php';


