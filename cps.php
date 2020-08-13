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
            "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento,
            P.edad, P.numero_documento, SP.fecha_sintomas, SP.fiebre_cuantificada, SP.tos,
            SP.dificultad_respiratoria, SP.odinofagia, SP.fatiga_adinamia, SP.cumple_criterios,
            SP.comorbilidad, P.id_usuario_seguimiento, U.nombre_apellido AS 'Nombre_Usuario'
            FROM seguimiento_paciente SP
            RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
            RIGHT JOIN usuarios U ON P.id_usuario_seguimiento = U.id
            WHERE asintomatico = 'No' AND actual = 'si'$filtro;
            -- GROUP BY id_pacientes");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cps_view.php';