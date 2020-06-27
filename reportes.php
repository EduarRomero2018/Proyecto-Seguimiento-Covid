<?php
include 'conexion.php';
/* PACIENTES PENDIENTES POR RESULTADOS*/
$consulta = $conexion->prepare("SELECT COUNT(*) AS Numero_Pacientes
FROM prog_toma_muestra
WHERE resultado = 'Pendiente'");
$consulta->execute();
$res = $consulta ->fetch();
$numero_conteo = $res['Numero_Pacientes'];
   //var_dump ($consulta->errorInfo())  ;

  /* PACIENTES QUE NO SE LE HAN REALIZADO TOMA DE MUESTRA*/
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
WHERE id NOT IN
(SELECT pacientes_id FROM prog_toma_muestra)");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes = $res['Cantidad_Pacientes'];
//print_r ($consulta->errorInfo())  ;

/* CANTIDAD DE PACIENTES POSITIVOS*/
$consulta = $conexion->prepare("SELECT * FROM prog_toma_muestra WHERE resultado = 'Positivo'");
$consulta->execute();

if($consulta->rowCount() > 0){
  $positivos = $consulta->rowCount();
}else{
  echo 'No se encontraron Pacientes Positivos';
}

$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
WHERE id IN
(SELECT pacientes_id FROM prog_toma_muestra)");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes_programados = $res['Cantidad_Pacientes'];


/* --CONSULTA PARA SABER CUALES SON LOS PACIENTES QUE SE LE HAN REALIZADO TOMA DE MUESTRA--

SELECT CONCAT (p.primer_nombre, ' ', p.segundo_apellido) AS 'Nombre y Apellido', p.numero_documento, edad
FROM prog_toma_muestra
INNER JOIN pacientes p ON prog_toma_muestra.pacientes_id = p.id
WHERE resultado = 'positivo'
*/


/* -- CONSULTA PARA MOSRAR CUANTOS DIAS DE SEGUIMEINTOS LLEVA UN PACIENTE

SELECT COUNT(*)
FROM seguimiento_paciente
LEFT JOIN complemento_seg ON complemento_seg_id = complemento_seg.id_pacientes
LEFT JOIN pacientes ON complemento_seg_id = complemento_seg.id
WHERE complemento_seg_id = 6
*/

?>
