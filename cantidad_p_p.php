<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
                numero_documento,DATE(fecha_programacion) AS fecha_programacion, PTM.fecha_entrega_lab ,fecha_resultado
                FROM pacientes P
                RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
                 WHERE resultado = 'Positivo'");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            // print_r($res);
            $Nombre_Completo = $res['Nombre_Completo'];
            $tipo_documento = $res['tipo_documento'];
            $edad = $res['edad'];
            $identificacion = $res['numero_documento'];
            $fecha_programacion = $res['fecha_programacion'];
            $fecha_entrega_lab = $res['fecha_entrega_lab'];
            $fecha_resultado = $res['fecha_resultado'];

            require 'views/cantidad_p_p_view.php';
