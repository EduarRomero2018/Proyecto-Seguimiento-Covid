<!-- CANTIDAD DE PACIENTES RECUPERADOS -->
<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
    $consulta = $conexion->prepare(
        "SELECT CONCAT(P.primer_nombre, ' ', P.primer_apellido, ' ', P.segundo_apellido) AS 'Nombre_Completo',
        P.tipo_documento,
        P.numero_documento,
        UR.nombre_apellido,
        SP.paciente_recuperado
        FROM prog_toma_muestra PTM
        INNER JOIN pacientes P ON P.id = PTM.pacientes_id
        INNER JOIN seguimiento_paciente SP ON P.id = SP.id_pacientes
        LEFT JOIN usuarios UR ON UR.id = SP.id_usuario
        WHERE P.estado_paciente = 'VIVO'
        AND P.aseguradora = 'MUTUAL SER'
        AND SP.paciente_recuperado = 'SI'
        AND actual = 1");
        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_OBJ);
        require 'views/cpr_view.php';
