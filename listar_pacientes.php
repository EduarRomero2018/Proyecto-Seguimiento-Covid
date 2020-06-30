<?php
include 'conexion.php';  // Funciona.
//variables globales que recogen al final el estado del condicional

//sexo, direccion, correo,fecha_entrega_lab

if (!isset($_REQUEST['consulta'])) {
    $consulta = "SELECT  CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
    CONCAT(edad, ' ', unidad_medida) AS 'Edad',
    CONCAT(tipo_documento, ' - ', numero_documento) AS 'Identificacion', telefono, fecha_resultado, resultado
    FROM pacientes
    LEFT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id";

    $query = $conexion->prepare($consulta);

    $query->execute();

    $res = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->errorInfo()[2] != null) {
        $error = $query->errorInfo();
    }

    include 'views/listar_pacientes_view.php';
}