<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    $consulta = $conexion->prepare(
        "SELECT p.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,telefono,telefono2,
        numero_documento,DATE(PTM.fecha_programacion) AS fecha_programacion, PTM.fecha_entrega_lab, PTM.fecha_resultado, PTM.notificado,
        STM.notificado AS notificado_2, STM.fecha_programacion AS fecha_programacion_2
        FROM pacientes P
        LEFT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        LEFT JOIN segunda_toma_muestra_control_2 STM on STM.pacientes_id = P.id
        WHERE PTM.resultado = 'Negativo' AND estado_paciente = 'VIVO' AND aseguradora = 'MUTUAL SER'");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cpn_view.php';
