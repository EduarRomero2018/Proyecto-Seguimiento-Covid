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
      $filtro = "";
      break;
  case 'Medico':
      $id_session = $_SESSION['id'];
      $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
      break;
}

//TOTAL DE PACIENTES
$consulta = $conexion->prepare
("SELECT COUNT(*) AS cantidad_pacientes
FROM pacientes
WHERE estado_paciente = 'VIVO'");
$consulta->execute();
$res = $consulta ->fetch();
$cantidad_pacientes = $res['cantidad_pacientes'];
// var_dump($cantidad_pacientes);

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

// Pacientes que estan pendientes Por resultados de toma de muestra ://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Numero_Pacientes
FROM prog_toma_muestra PTM
LEFT JOIN pacientes ON pacientes.id = PTM.pacientes_id
WHERE PTM.fecha_realizacion IS NOT NULL
AND aseguradora = 'MUTUAL SER'
AND resultado = 'Pendiente'
AND estado_paciente = 'VIVO' $filtro");
$consulta->execute();
$res = $consulta ->fetch();
$numero_conteo = $res['Numero_Pacientes'];
// var_dump ($consulta->errorInfo());

//Pacientes que aun no se le ha programado la Toma de Muestra//CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_Pacientes
FROM pacientes
WHERE id NOT IN
(SELECT pacientes_id FROM prog_toma_muestra) $filtro");
$consulta->execute();
$res = $consulta ->fetch();
$Cantidad_Pacientes = $res['Cantidad_Pacientes'];
//print_r ($consulta->errorInfo())  ;

//Cantidad de Pacientes pendientes por toma de muestra://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS Cantidad_p_p_pendiente_por_toma
FROM prog_toma_muestra
RIGHT JOIN pacientes ON pacientes.id = prog_toma_muestra.pacientes_id
WHERE fecha_programacion IS NOT NULL
AND fecha_realizacion IS NULL AND estado_paciente = 'VIVO' AND aseguradora = 'MUTUAL SER' $filtro");
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
$consulta = $conexion->prepare
("SELECT COUNT(*) AS Cantidad_kits
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

//Cantidad de Pacientes Negativos://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT *
FROM prog_toma_muestra PTM
INNER JOIN pacientes P ON P.id = PTM.pacientes_id
WHERE resultado = 'Negativo' AND P.estado_paciente = 'VIVO'");
$consulta->execute();
if($consulta->rowCount() > 0){
  $negativos = $consulta->rowCount();
}else{
  // echo 'No se encontraron Pacientes Positivos';
  $negativos = 0;
}
//Cantidad de pacientes con visitas no exitosas ://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS cant_visita_exitosa
FROM prog_toma_muestra ptm
RIGHT JOIN pacientes P ON ptm.pacientes_id = P.id
WHERE visita_exitosa = 'NO' AND estado_paciente = 'VIVO'");
$consulta->execute();
$res = $consulta ->fetch();
$cant_visita_exitosa = $res['cant_visita_exitosa'];

//Cantidad de pacientes pendientes por notificar://CONSULTA LISTA
$consulta = $conexion->prepare("SELECT COUNT(*) AS 'Pendientes_notificar'
FROM prog_toma_muestra PTM
INNER JOIN pacientes P ON P.id = PTM.pacientes_id
LEFT JOIN usuarios UR ON P.id_usuario_notificacion = UR.id
WHERE P.estado_paciente = 'VIVO' AND notificado = 'NO' AND resultado = 'positivo'");
$consulta->execute();
$res = $consulta ->fetch();
$Pendientes_notificar = $res['Pendientes_notificar'];

//Cantidad de pacientes recuperados://CONSULTA LISTA
  $consulta = $conexion->prepare("SELECT COUNT(*) AS 'Total_Pacientes'
  FROM prog_toma_muestra PTM
  INNER JOIN pacientes P ON P.id = PTM.pacientes_id
  INNER JOIN seguimiento_paciente SP ON P.id = SP.id_pacientes
  WHERE P.estado_paciente = 'VIVO'
  AND P.aseguradora = 'MUTUAL SER'
  AND SP.paciente_recuperado = 'SI'
  GROUP BY SP.id_pacientes");
  $consulta->execute();

  if($consulta->rowCount() > 0){
    $pacientes_recuperados = $consulta->rowCount();
  }else{
    // echo 'No se encontraron Pacientes Positivos';
    $pacientes_recuperados = 0;
  }





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
