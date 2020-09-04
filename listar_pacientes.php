<?php
session_start();
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';


//sexo, direccion, correo,fecha_entrega_lab

if (!isset($_REQUEST['consulta'])) {
    $usuario_id = $_SESSION['id'];
    $consulta = "SELECT pacientes.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'Edad',
    CONCAT(tipo_documento, ' - ', numero_documento) AS 'Identificacion', telefono,
    DATE(pacientes.fecha_registro) AS fecha_registro,
    DATE(fecha_programacion) AS fecha_programacion, fecha_resultado, resultado, U.nombre_apellido
    FROM pacientes
    LEFT JOIN usuarios U ON pacientes.id_usuario = U.id
    LEFT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE id_usuario = $usuario_id AND estado_paciente = 'VIVO'";

    $query = $conexion->prepare($consulta);

    $query->execute();

    $res = $query->fetchAll(PDO::FETCH_OBJ);
    //print_r($res);

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

    include 'views/listar_pacientes_view.php';
}
