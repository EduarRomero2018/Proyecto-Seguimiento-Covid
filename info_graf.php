<?php 
session_start();
require_once 'conexion.php';

// pacientes positivo - negativos

$stm = $conexion->prepare("SELECT COUNT(*) AS total_pacientes FROM pacientes");
$stm->execute();

$n_pacientes = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes;

$stm = $conexion->prepare("SELECT COUNT(*) AS total_pacientes_positivos FROM prog_toma_muestra WHERE resultado = 1");
$stm->execute();

$n_pacientes_positivos = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes_positivos;

$porcentaje_positivos =  ($n_pacientes_positivos / $n_pacientes) * 100;
$porcentaje_negativo = 100 - $porcentaje_positivos;

// grafica pacientes programados - no programados

$stm = $conexion->prepare("SELECT COUNT(*) AS total_pacientes FROM pacientes");
$stm->execute();

$n_pacientes = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes;

$stm = $conexion->prepare("SELECT COUNT(id) AS total_pacientes_programados FROM pacientes WHERE id IN(SELECT pacientes_id FROM prog_toma_muestra)");
$stm->execute();

$n_pacientes_programados = $stm->fetchAll(PDO::FETCH_OBJ)[0]->total_pacientes_programados;

$porcentaje_programados =  ($n_pacientes_programados / $n_pacientes) * 100;
$porcentaje_nProgramados = 100 - $porcentaje_programados;


require_once 'views/info_graf_view.php';