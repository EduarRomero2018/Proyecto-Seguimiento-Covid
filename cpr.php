<!-- CANTIDAD DE PACIENTES RECUPERADOS -->
<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
    $consulta = $conexion->prepare(
        "SELECT CONCAT(P.primer_nombre, ' ', P.primer_apellido, ' ', P.segundo_apellido) AS 'Nombre_Completo',
        P.tipo_documento,
        P.numero_documento,
        SP.paciente_recuperado
        FROM prog_toma_muestra PTM
        INNER JOIN pacientes P ON P.id = PTM.pacientes_id
        INNER JOIN seguimiento_paciente SP ON P.id = SP.id_pacientes
        LEFT JOIN usuarios UR ON P.id_usuario_notificacion = UR.id
        WHERE P.estado_paciente = 'VIVO'
        AND SP.paciente_recuperado = 'SI'
        AND P.aseguradora = 'MUTUAL SER'
        GROUP BY SP.id_pacientes");
        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_OBJ);
        require 'views/cpr_view.php';
