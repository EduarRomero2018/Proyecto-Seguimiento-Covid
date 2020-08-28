<?php
session_start();
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';


//sexo, direccion, correo,fecha_entrega_lab

if (!isset($_REQUEST['consulta'])) {

    switch ($_SESSION['role']) {
        case 'Coordinador covid':
            $filtro = "";
            break;

        case 'Auxiliar de programacion':
            $id_session = $_SESSION['id'];
            $filtro = "";
            break;
        case 'Auxiliar de seguimiento':
            $id_session = $_SESSION['id'];
            $filtro = "AND id_usuario_seguimiento = $id_session";
            break;
        case 'Digitador':
            $id_session = $_SESSION['id'];
            $filtro = "AND prog_toma_muestra.resultado = 3";
            break;
        case 'Medico':
            $id_session = $_SESSION['id'];
            $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
            break;
    }

    $usuario_id = $_SESSION['id'];
    $consulta = "SELECT pacientes.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'Edad',
    CONCAT(tipo_documento, ' - ', numero_documento) AS 'Identificacion', telefono, barrio,
    DATE(fecha_programacion) AS fecha_programacion,
    DATE(fecha_realizacion) AS fecha_realizacion, motivo, fecha_resultado, municipio, resultado, programacion_atencion,
	UP.nombre_apellido AS usuario_programacion,
	US.nombre_apellido AS usuario_seguimiento,
	UR.nombre_apellido AS usuario_resultado,
	UM.nombre_apellido AS usuario_medico
	FROM pacientes
    LEFT JOIN usuarios U ON pacientes.id_usuario = U.id
    LEFT JOIN usuarios UP ON pacientes.id_usuario = UP.id
    LEFT JOIN usuarios US ON pacientes.id_usuario_seguimiento = US.id
    LEFT JOIN usuarios UR ON pacientes.id_usuario_resultado = UR.id
    LEFT JOIN usuarios UM ON pacientes.id_usuario_notificacion = UM.id
    LEFT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE estado_paciente = 'VIVO' $filtro";

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

    include 'views/listar_pacientes_view.php';
}