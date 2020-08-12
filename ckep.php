<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento, P.edad, P.numero_documento, SP.fecha_entrega_kits
                FROM seguimiento_paciente SP
                RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
                WHERE entrega_kits = 'Si'");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            // print_r($res);
            $Nombre_Completo = $res['Nombre_Completo'];
            $tipo_documento = $res['tipo_documento'];
            $edad = $res['edad'];
            $identificacion = $res['numero_documento'];
            $fecha_entrega_kits = $res['fecha_entrega_kits'];

            require 'views/ckep_view.php';
