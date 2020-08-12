<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento, P.edad, P.numero_documento
                FROM seguimiento_paciente SP
                RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
                WHERE asintomatico = 'Si' AND actual = 'si'
                GROUP BY id_pacientes");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cpa_view.php';
