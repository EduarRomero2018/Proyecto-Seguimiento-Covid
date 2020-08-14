<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
// switch ($_SESSION['role']) {
//     case 'Coordinador covid':
//         $filtro = "";
//         break;

//     case 'Auxiliar de programacion':
//         $id_session = $_SESSION['id'];
//         $filtro = "AND id_usuario = $id_session";
//         break;
//     case 'Auxiliar de seguimiento':
//         $id_session = $_SESSION['id'];
//         $filtro = "AND id_usuario_seguimiento = $id_session";
//         break;
//     case 'Digitador':
//         $id_session = $_SESSION['id'];
//         $filtro = "AND id_usuario_resultado = $id_session";
//         break;
//     case 'Medico':
//         $id_session = $_SESSION['id'];
//         $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
//         break;
// }
            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento, P.edad, P.numero_documento
                FROM seguimiento_paciente SP
                LEFT JOIN pacientes P ON SP.id_pacientes = P.id
                WHERE asintomatico = 'Si' AND actual = 'si' AND estado_paciente = 'VIVO' /*$filtro*/
                GROUP BY id_pacientes");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cpa_view.php';
