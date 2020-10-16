<?php
session_start();
include 'conexion.php';  // Funciona.

$date = '2020-10-14';
$stm = $conexion->prepare(
    "SELECT * FROM pacientes 
    INNER JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
    WHERE DATE(fecha_realizacion) = '$date'"
);
$stm->execute();
$pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

require_once 'views/consolidados_view.php';