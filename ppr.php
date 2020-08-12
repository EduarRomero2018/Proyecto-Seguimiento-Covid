<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
                numero_documento,DATE(fecha_programacion) AS fecha_programacion, PTM.fecha_entrega_lab ,fecha_resultado
                FROM prog_toma_muestra PTM
                RIGHT JOIN pacientes P ON PTM.pacientes_id = P.id
                WHERE resultado = 'Pendiente'");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            // print_r($res);
            $Nombre_Completo = $res['Nombre_Completo'];
            $tipo_documento = $res['tipo_documento'];
            $edad = $res['edad'];
            $identificacion = $res['numero_documento'];
            $fecha_programacion = $res['fecha_programacion'];

            require 'views/ppr_view.php';
