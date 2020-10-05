<!-- PACIENTES QUE NO SON DE MUTUAL -->
<?php
session_start();
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';
if (!isset($_REQUEST['consulta'])) {
    $usuario_id = $_SESSION['id'];
    $consulta = "SELECT  CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'edad', CONCAT(tipo_documento, '-', numero_documento) AS 'documento', 
    aseguradora, estado_paciente,
    stm.fecha_programacion,
    stm.fecha_realizacion, aseguradora, P.municipio,
    U.nombre_apellido AS 'Usuario_de_Programacion'
    FROM pacientes p
    INNER JOIN segunda_toma_muestra_control_2 stm ON stm.pacientes_id = P.id
    LEFT JOIN usuarios U ON P.id_usuario_programacion = U.id
    WHERE aseguradora != 'MUTUAL SER'
	AND estado_paciente = 1";

    $query = $conexion->prepare($consulta);
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_OBJ);
    // print_r($res);

    $consulta = "SELECT * FROM pacientes";
    $query = $conexion->prepare($consulta);
    $query->execute();

    $cantidad = $query -> rowCount();


    if ($query->errorInfo()[2] != null) {
        $error = $query->errorInfo();
    }
    if ($query->rowCount() < 0) {
        echo ('No hay pacientes registrados');
    }

    include 'views/lpnm_stm_view.php';
}
