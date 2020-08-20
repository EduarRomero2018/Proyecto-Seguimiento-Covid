<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
            "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento,
            P.edad, P.numero_documento, SP.fecha_sintomas, SP.fiebre_cuantificada, SP.tos,
            SP.dificultad_respiratoria, SP.odinofagia, SP.fatiga_adinamia, SP.cumple_criterios,
            SP.comorbilidad, P.id_usuario_seguimiento, U.nombre_apellido AS 'Nombre_Usuario'
            FROM seguimiento_paciente SP
            RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
            RIGHT JOIN usuarios U ON P.id_usuario_seguimiento = U.id
            WHERE asintomatico = 'No' AND actual = 'si' AND estado_paciente = 'VIVO';
            -- GROUP BY id_pacientes");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cps_view.php';