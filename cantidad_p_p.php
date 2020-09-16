<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    $consulta = $conexion->prepare(
        "SELECT CONCAT(primer_nombre, ' ', primer_apellido, ' ', segundo_apellido) AS 'Nombre_Completo', tipo_documento,edad,
        numero_documento,
        CONCAT(telefono, '-', telefono2) AS 'telefonos',barrio,
        DATE(fecha_programacion) AS fecha_programacion,
        PTM.fecha_entrega_lab ,fecha_resultado,
        PTM.notificado,
        UP.nombre_apellido AS 'Usuario_Programacion',
        US.nombre_apellido AS 'Usuario_Seguimiento',
        UR.nombre_apellido AS 'Usuario_Medico'
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        LEFT JOIN usuarios UP ON P.id_usuario_programacion = UP.id
        LEFT JOIN usuarios US ON P.id_usuario_seguimiento = US.id
        LEFT JOIN usuarios UR ON P.id_usuario_notificacion = UR.id
        WHERE resultado = 'Positivo' AND estado_paciente = 'VIVO'");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cantidad_p_p_view.php';
