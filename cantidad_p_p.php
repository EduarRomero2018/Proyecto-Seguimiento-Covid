<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    $consulta = $conexion->prepare(
        "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
        numero_documento,
        CONCAT(telefono, '-', telefono2) AS 'telefonos',
        DATE(fecha_programacion) AS fecha_programacion,
        PTM.fecha_entrega_lab ,fecha_resultado,
        PTM.notificado
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE resultado = 'Positivo' AND estado_paciente = 'VIVO'");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cantidad_p_p_view.php';
