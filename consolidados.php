<?php
session_start();
include 'conexion.php';  // Funciona.

$date = isset($_REQUEST['fecha_realizacion']) ? $_REQUEST['fecha_realizacion'] : date('Y-m-d');
$departamento = isset($_REQUEST['departamento']) ? $_REQUEST['departamento'] : 'bolivar';

if($departamento == 'bolivar')
{
    $filtro_municipio = "AND municipio IN('CARTAGENA (13001)', 'TURBANA (13838)', 'TURBACO (13836)', 'ARJONA (13052)', 'CARMEN DE BOLIVAR (13244)','BAYUNCA (130007)')";
}
else
{
    $filtro_municipio = "AND municipio IN('BARRANQUILLA (080001)', 'GALAPA (08296)','MALAMBO (08433)', 'PUERTO COLOMBIA (08573)','SOLEDAD (08758)')";
}

$stm = $conexion->prepare(
    "SELECT * FROM pacientes 
    INNER JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE DATE(fecha_realizacion) = '$date' $filtro_municipio"
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