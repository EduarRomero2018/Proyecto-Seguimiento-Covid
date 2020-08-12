<?php
include 'conexion.php';
$id = $_SESSION['id'];
// pacientes pendientes por resultados
$consulta = $conexion->prepare("SELECT COUNT(*) AS Numero_Pacientes
FROM prog_toma_muestra
WHERE resultado = 'Pendiente'");
$consulta->execute();
$res = $consulta ->fetch();
$numero_conteo = $res['Numero_Pacientes'];
   //var_dump ($consulta->errorInfo())  ;

  // pacientes que no se le han realizado toma de muestra
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
WHERE id NOT IN
(SELECT pacientes_id FROM prog_toma_muestra)");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes = $res['Cantidad_Pacientes'];
//print_r ($consulta->errorInfo())  ;

// cantidad de pacientes positivos
$consulta = $conexion->prepare("SELECT * FROM prog_toma_muestra WHERE resultado = 'Positivo'");
$consulta->execute();

if($consulta->rowCount() > 0){
  $positivos = $consulta->rowCount();
}else{
  // echo 'No se encontraron Pacientes Positivos';
  $positivos = 0;
}

/* Cantidad de Pacientes Sintomaticos */
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
WHERE id IN
(SELECT pacientes_id FROM prog_toma_muestra)");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes_programados = $res['Cantidad_Pacientes'];

/* Cantidad de kits entregados*/
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_kits
FROM seguimiento_paciente
WHERE entrega_kits = 'Si'");
$consulta->execute();
$res = $consulta ->fetch();
$cantidad_kits = $res['Cantidad_kits'];
// var_dump($cantidad_kits);

/* Cantidad de pacientes fallecidos*/
$consulta = $conexion->prepare("SELECT COUNT(*) AS pacientes_fallecidos
FROM pacientes
WHERE estado_paciente = 'MUERTO'");
$consulta->execute();
$res = $consulta ->fetch();
$pacientes_fallecidos = $res['pacientes_fallecidos'];
// print_r($cantidad_kits);


  // cantidad de pacientes programados pero que estan pendientes por resultados
  $consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_p_p_pendiente_por_toma
  FROM prog_toma_muestra
  WHERE fecha_programacion IS NOT NULL
  AND fecha_realizacion IS NULL");
  $consulta->execute();
  $res = $consulta ->fetch();
  $Cantidad_p_p_pendiente_por_toma= $res['Cantidad_p_p_pendiente_por_toma'];
  //print_r ($consulta->errorInfo())  ;

  /* Cantidad de pacientes Asintomaticos*/
  $consulta = $conexion->prepare(
    "SELECT id_pacientes AS numero_de_asintomaticos
    FROM seguimiento_paciente
    WHERE asintomatico = 'Si' AND actual = 'si'
    GROUP BY id_pacientes"
  );
  $consulta->execute();
  $asintomaticos = $consulta->rowCount();
  // print_r($asintomaticos);

  /* Cantidad de pacientes Sintomaticos*/
  $consulta = $conexion->prepare(
    "SELECT id_pacientes AS numero_de_asintomaticos
    FROM seguimiento_paciente
    WHERE asintomatico = 'No' AND actual = 'si'
    GROUP BY id_pacientes"
  );
  $consulta->execute();
  $sintomaticos = $consulta->rowCount();

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
