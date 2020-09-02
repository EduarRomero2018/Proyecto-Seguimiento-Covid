<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

            $consulta = $conexion->prepare(
            "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', P.tipo_documento,
            P.edad, P.numero_documento,  U.nombre_apellido AS 'Nombre_Usuario'
            FROM prog_toma_muestra ptm
            RIGHT JOIN pacientes P ON ptm.pacientes_id = p.id
             RIGHT JOIN usuarios U ON P.id_usuario_programacion = U.id
            WHERE visita_exitosa = 'NO' AND estado_paciente = 'VIVO'");
            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/vne_view.php';