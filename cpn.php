<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    $consulta = $conexion->prepare(
        "SELECT p.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,telefono,telefono2,
        numero_documento,DATE(fecha_programacion) AS fecha_programacion, PTM.fecha_entrega_lab ,fecha_resultado, PTM.notificado
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE resultado = 'Negativo' AND estado_paciente = 'VIVO' AND aseguradora = 'MUTUAL SER'");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cpn_view.php';
