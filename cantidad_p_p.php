<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    if(isset($_REQUEST['tabla']))
    {
        $tabla = 'segunda_toma_muestra_control_2';
    }
    else
    {
        $tabla = 'prog_toma_muestra';
    }

    $consulta = $conexion->prepare(
        "SELECT
        CONCAT(primer_nombre, ' ', primer_apellido, ' ', segundo_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, '-', numero_documento) AS 'numero_documento',
        CONCAT(telefono, '-', telefono2) AS 'telefonos',barrio,
        DATE(fecha_programacion) AS fecha_programacion,
        DATE (PTM.fecha_realizacion) AS fecha_realizacion, fecha_resultado,
        PTM.notificado,
        UP.nombre_apellido AS 'Usuario_Programacion',
        US.nombre_apellido AS 'Usuario_Seguimiento',
        UR.nombre_apellido AS 'Usuario_Medico'
        FROM pacientes P
        LEFT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        LEFT JOIN seguimiento_paciente SP ON P.id = SP.id_pacientes
        LEFT JOIN usuarios UP ON P.id_usuario_programacion = UP.id
        LEFT JOIN usuarios US ON P.id_usuario_seguimiento = US.id
        LEFT JOIN usuarios UR ON P.id_usuario_notificacion = UR.id
        WHERE resultado = 'Positivo'
        AND estado_paciente = 'VIVO'
        AND aseguradora = 'MUTUAL SER'
        AND PTM.notificado = 'NO'
        AND SP.actual = 'si'
        AND SP.paciente_recuperado = 2");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cantidad_p_p_view.php';
