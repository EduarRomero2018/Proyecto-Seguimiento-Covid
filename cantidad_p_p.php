<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';

    $consulta = $conexion->prepare(
        "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
        numero_documento,DATE(fecha_programacion) AS fecha_programacion, PTM.fecha_entrega_lab ,fecha_resultado
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE resultado = 'Positivo'");

    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);
    
    require 'views/cantidad_p_p_view.php';
