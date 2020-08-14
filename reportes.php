<?php
include 'conexion.php';
$id = $_SESSION['id'];
switch ($_SESSION['role']) {
  case 'Coordinador covid':
      $filtro = "";
      break;

  case 'Auxiliar de programacion':
      $id_session = $_SESSION['id'];
      $filtro = "AND id_usuario = $id_session";
      break;
  case 'Auxiliar de seguimiento':
      $id_session = $_SESSION['id'];
      $filtro = "AND id_usuario_seguimiento = $id_session";
      break;
  case 'Digitador':
      $id_session = $_SESSION['id'];
      $filtro = "AND id_usuario_resultado = $id_session";
      break;
  case 'Medico':
      $id_session = $_SESSION['id'];
      $join = "LEFT JOIN prog_toma_muestra ON prog_toma_muestra.pacientes_id = pacientes.id";
      $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
      break;
}

//Cantidad de Pacientes Positivos://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT *
FROM prog_toma_muestra PTM
INNER JOIN pacientes P ON P.id = PTM.pacientes_id
WHERE resultado = 'Positivo' AND P.estado_paciente = 'VIVO'");
$consulta->execute();
if($consulta->rowCount() > 0){
  $positivos = $consulta->rowCount();
}else{
  // echo 'No se encontraron Pacientes Positivos';
  $positivos = 0;
}

// Pacientes que estan Pendientes Por Resultados://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Numero_Pacientes
FROM prog_toma_muestra
LEFT JOIN pacientes ON pacientes.id = prog_toma_muestra.pacientes_id
WHERE resultado = 'Pendiente' AND estado_paciente = 'VIVO' $filtro");
$consulta->execute();
$res = $consulta ->fetch();
$numero_conteo = $res['Numero_Pacientes'];
//var_dump ($consulta->errorInfo())  ;

//Pacientes que aun no se le ha programado la Toma de Muestra//CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
$join
WHERE pacientes.id NOT IN
(SELECT pacientes_id FROM prog_toma_muestra) AND estado_paciente = 'VIVO' $filtro");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes = $res['Cantidad_Pacientes'];
//print_r ($consulta->errorInfo())  ;

//Cantidad de Pacientes pendientes por toma de muestra://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_p_p_pendiente_por_toma
FROM prog_toma_muestra
RIGHT JOIN pacientes ON pacientes.id = prog_toma_muestra.pacientes_id
WHERE fecha_programacion IS NOT NULL
AND fecha_realizacion IS NULL AND estado_paciente = 'VIVO' $filtro");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_p_p_pendiente_por_toma= $res['Cantidad_p_p_pendiente_por_toma'];
//print_r ($consulta->errorInfo())  ;

//Cantidad de Pacientes Asintomaticos://CONSULTA LISTA
$consulta = $conexion->prepare(
  "SELECT id_pacientes AS numero_de_asintomaticos
  FROM seguimiento_paciente SP
  LEFT JOIN pacientes P ON SP.id_pacientes
  WHERE asintomatico = 'Si' AND actual = 'si' AND estado_paciente = 'VIVO'
  GROUP BY id_pacientes"
  );
  $consulta->execute();
  $asintomaticos = $consulta->rowCount();
  // print_r($asintomaticos);

  /* Cantidad de pacientes Sintomaticos*///CONSULTA LISTA
  $consulta = $conexion->prepare(
    "SELECT id_pacientes AS numero_de_sintomaticos
    FROM seguimiento_paciente SP
   LEFT JOIN pacientes P ON SP.id_pacientes
   WHERE asintomatico = 'No' AND actual = 'si' AND estado_paciente = 'VIVO'
    GROUP BY id_pacientes"
  );
  $consulta->execute();
  $sintomaticos = $consulta->rowCount();

/* Cantidad de kits entregados*///CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_kits
FROM seguimiento_paciente
RIGHT JOIN pacientes P ON seguimiento_paciente.id_pacientes = P.id
WHERE entrega_kits = 'Si' AND estado_paciente = 'VIVO'");
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
