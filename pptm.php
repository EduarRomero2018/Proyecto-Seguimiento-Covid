<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad, numero_documento
                FROM pacientes P
                WHERE P.id NOT IN
                (SELECT pacientes_id FROM prog_toma_muestra)");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            
            require 'views/pptm_view.php';
