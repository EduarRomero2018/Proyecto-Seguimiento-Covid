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
    ptm.fecha_programacion,
    ptm.fecha_realizacion, aseguradora, P.municipio,
    U.nombre_apellido AS 'Usuario_de_Programacion'
      FROM pacientes p
      LEFT JOIN usuarios U ON P.id_usuario_programacion = U.id
      LEFT JOIN prog_toma_muestra ptm ON ptm.pacientes_id = P.id
      WHERE aseguradora != 'MUTUAL SER'
			AND estado_paciente = 'VIVO'";

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

    include 'views/lpnm_view.php';
}
