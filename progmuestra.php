<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //print_r ($_POST);

// variables de Atención personal
$documento = $_POST['documento'];
//echo $documento;

//variables globales que recogen al final el estado del condicional
$errores= '';
$exito= '';

//comprobamos que los campos no esten vacios
if (empty($documento) OR (!is_numeric($documento))){
 $errores = 'El campo no debe estar vacio y debe ser solo numerico';//si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
}
else{
  //VALIDAMOS QUE LA IDENTIFICACION NO EXISTA EN LA BD
  $consulta = $conexion->prepare("SELECT CONCAT(primer_nombre,' ',primer_apellido) AS 'Nombre_Completo', P.id, P.tipo_documento,
  P.numero_documento, P.edad, P.tipo_paciente, P.aseguradora, P.fecha_registro, U.nombre_apellido AS 'usuario_Creacion'
  FROM pacientes P
  LEFT JOIN usuarios U ON P.id_usuario_programacion  = U.id
  WHERE numero_documento = :numero_documento LIMIT 1");
  $consulta->execute(array(':numero_documento' => $documento));
  $resultado = $consulta->fetch();
  if (empty($resultado)){
  $errores= 'Paciente no Encontrado'; //enviamos el mensaje de error
  }else{
    $tipo_documento=$resultado['tipo_documento'];
    $numero_documento=$resultado['numero_documento'];
    $edad=$resultado['edad'];
    $Nombre_Completo=$resultado['Nombre_Completo'];
    $tipo_paciente=$resultado['tipo_paciente'];
    $aseguradora=$resultado['aseguradora'];
    $fecha_registro=$resultado['fecha_registro'];
    $usuario_Creacion=$resultado['usuario_Creacion'];
    $id=$resultado['id'];
  }

  $consulta = $conexion->prepare("SELECT notificado FROM prog_toma_muestra WHERE pacientes_id = ? ORDER BY id DESC LIMIT 1");
  $consulta->execute(array($id));
  $notificado = $consulta->fetch();

  if($notificado['notificado'] == 'NO'){
    $disabled = "disabled";
  }else{
    $disabled = "";
  }

  $consulta = $conexion->prepare("SELECT pacientes_id FROM prog_toma_muestra WHERE pacientes_id = $id");
  $consulta->execute();

  $n_programacion = $consulta->rowCount();
  //mandamos un msg si no encontro nada
}
}

require 'views/progmuestra_view.php';

?>













