<?php
session_start();
include 'conexion.php';  // Funciona.

$date = isset($_REQUEST['fecha_realizacion']) ? $_REQUEST['fecha_realizacion'] : date('Y-m-d');

$stm = $conexion->prepare(
    "SELECT * FROM pacientes 
    INNER JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE DATE(fecha_realizacion) = '$date'"
);

$stm->execute();
$pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

if(isset($_REQUEST['Exportar']))
{
    header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=AtencionPersonal.xls');
    require_once 'views/consolidados_view.php';
}
else
{
    require_once 'views/consolidados_view.php';
}