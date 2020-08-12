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
            
            require 'views/ppr_view.php';
