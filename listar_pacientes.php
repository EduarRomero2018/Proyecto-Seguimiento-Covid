<?php
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';

$ini = isset($_REQUEST['p']) ? $_REQUEST['p'] : 0;
$fin =10;
$ini = $ini != 0 ? ($ini - 1) * $fin : 0;

//sexo, direccion, correo,fecha_entrega_lab

if (!isset($_REQUEST['consulta'])) {
    $consulta = "SELECT  CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'Edad',
    CONCAT(tipo_documento, ' - ', numero_documento) AS 'Identificacion', telefono, fecha_resultado, resultado
    FROM pacientes
    LEFT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id LIMIT $ini, $fin";

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

/* BUSCADOR*/
if (isset($_POST['consulta'])) {
    $ini = isset($_REQUEST['p']) ? $_REQUEST['p'] : 0;
    $fin =10;
    $ini = $ini != 0 ? ($ini - 1) * $fin : 0;

    $buscar = $_POST['consulta'];
    $consultaa = "SELECT  CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'Edad',
    CONCAT(tipo_documento, ' ', numero_documento) AS 'Identificacion', telefono, fecha_resultado, resultado
    FROM pacientes
    LEFT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE CONCAT(primer_nombre, ' ', primer_apellido) LIKE '$buscar%' OR numero_documento LIKE '$buscar%' OR resultado LIKE '$buscar%'";

    $query = $conexion->prepare($consultaa);
    $query->execute();
    $cantidad = $query -> rowCount();
    $res = $query->fetchAll(PDO::FETCH_OBJ);


    if (empty($res)) {
        echo (json_encode('empty'));
    } else {
        echo (json_encode($res));
    }
}
