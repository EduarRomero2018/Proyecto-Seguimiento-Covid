<!-- CANTIDAD DE PACIENTES POR NOTIFICAR -->
<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
    $consulta = $conexion->prepare(
        "SELECT  CONCAT(p.primer_nombre, ' ', p.primer_apellido, ' ', p.segundo_apellido) AS 'Nombre_Completo',
        p.tipo_documento,
        p.numero_documento,
        p.municipio,
        PTM.resultado,
        PTM.fecha_resultado,
        PTM.notificado,
        UR.nombre_apellido AS 'Usuario_Medico'
        FROM prog_toma_muestra PTM
        INNER JOIN pacientes P ON P.id = PTM.pacientes_id
        LEFT JOIN usuarios UR ON P.id_usuario_notificacion = UR.id
        WHERE P.estado_paciente = 'VIVO' AND notificado = 'NO' AND resultado = 'positivo' AND aseguradora = 'MUTUAL SER'");
    $consulta->execute();
    $res = $consulta->fetchAll(PDO::FETCH_OBJ);

    require 'views/cppn_view.php';
