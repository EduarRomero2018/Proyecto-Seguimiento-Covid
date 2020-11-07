<?php 
session_start();
require_once 'conexion.php';

$stm = $conexion->prepare("SELECT COUNT(*) AS total_pacientes FROM pacientes");
$stm->execute();

$n_pacientes = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes;

$stm = $conexion->prepare("SELECT COUNT(*) AS total_pacientes_positivos FROM prog_toma_muestra WHERE resultado = 1");
$stm->execute();

$n_pacientes_positivos = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes_positivos;

$porcentaje_positivos =  ($n_pacientes_positivos / $n_pacientes) * 100;
$porcentaje_negativo = 100 - $porcentaje_positivos;

require_once 'views/info_graf_view.php';