<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// variables de errores y exito
$errores= '';
$exito= '';
$tipo_de_reporte = $_POST['tipo_reporte'];
$fecha_inicio_reporte = $_POST['fecha_inicio_reporte'];
$fecha_final_reporte = $_POST['fecha_final_reporte'];
if (empty($tipo_de_reporte)){
    $errores .= 'Debe Seleccionar por lo menos un Reporte';
  }
if (empty($fecha_inicio_reporte) || empty($fecha_final_reporte) || empty($fecha_final_reporte)){
    $errores .= 'Las fechas son Obligatorias';
  }
}
else {


}

    require_once 'views/rg_view.php';
// }