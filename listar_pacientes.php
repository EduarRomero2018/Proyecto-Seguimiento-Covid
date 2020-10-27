<?php
session_start();
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';


//sexo, direccion, correo,fecha_entrega_lab

if (!isset($_REQUEST['consulta'])) {

    if($_SESSION['sede'] == 'Cartagena')
    {
        $filtro_municipio = "AND municipio IN('CARTAGENA (13001)', 'TURBANA (13838)', 'TURBACO (13836)', 'ARJONA (13052)', 'CARMEN DE BOLIVAR (13244)','BAYUNCA (130007)')";
    }
    else
    {
        $filtro_municipio = "AND municipio IN('BARRANQUILLA (080001)', 'GALAPA (08296)','MALAMBO (08433)', 'PUERTO COLOMBIA (08573)','SOLEDAD (08758)')";
    }

    $condicion = "";
    // print_r($_SESSION);
    switch ($_SESSION['role']) {
        case 'Coordinador covid':
            $condicion = "WHERE pacientes.estado_paciente = 1 AND ptm.resultado != 2 AND aseguradora = 'MUTUAL SER'";
            break;

        case 'Auxiliar de programacion':
            $id_session = $_SESSION['id'];
            $condicion = "WHERE pacientes.estado_paciente = 1 AND ptm.resultado != 2 AND aseguradora = 'MUTUAL SER'";
            break;
       case 'Auxiliar de seguimiento':
            $id_session = $_SESSION['id'];
            $condicion = "WHERE pacientes.id_usuario_seguimiento = $id_session
            AND pacientes.estado_paciente = 1
            AND aseguradora = 'MUTUAL SER'
            AND ptm.fecha_programacion IS NOT null";
            break;
        case 'Digitador':
            $id_session = $_SESSION['id'];
            $condicion = "WHERE pacientes.estado_paciente = 1 AND ptm.resultado != 2 AND aseguradora = 'MUTUAL SER'";
            break;
        case 'Medico':
             $id_session = $_SESSION['id'];
            $condicion = "WHERE pacientes.estado_paciente = 1 AND ptm.resultado = 1 AND aseguradora = 'MUTUAL SER'";
            break;
    }

    $usuario_id = $_SESSION['id'];
    $consulta = "SELECT pacientes.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', 
    CONCAT(edad, ' ', unidad_medida) AS 'Edad', aseguradora, 
    CONCAT(tipo_documento, ' - ', numero_documento) AS 'Identificacion', telefono, barrio, estado_paciente, 
    DATE(fecha_programacion) AS fecha_programacion, DATE(fecha_realizacion) AS fecha_realizacion, 
    motivo, fecha_resultado, municipio, resultado, ptm.notificado, programacion_atencion, 
    UP.nombre_apellido AS usuario_programacion, 
    US.nombre_apellido AS usuario_seguimiento, 
    UM.nombre_apellido AS usuario_medico 
    FROM pacientes  
    LEFT JOIN usuarios UP ON pacientes.id_usuario_programacion = UP.id 
    LEFT JOIN usuarios US ON pacientes.id_usuario_seguimiento = US.id 
    LEFT JOIN usuarios UM ON pacientes.id_usuario_notificacion = UM.id 
    LEFT JOIN prog_toma_muestra ptm ON pacientes.id = ptm.pacientes_id
    $condicion $filtro_municipio";
    echo $consulta;

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