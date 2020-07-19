

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
  $consulta = $conexion->prepare("SELECT p.id, CONCAT(P. primer_nombre, ' ', P. primer_apellido) AS 'Nombre_Completo', P.tipo_documento,
  P.numero_documento, P.edad, P.barrio AS 'Direccion_Residencia', P.telefono, P.aseguradora, P.fecha_registro AS 'fecha_creacion_paciente',
  STM.fecha_programacion AS 'fecha_primera_toma_muestra', PTM.resultado AS 'resultado_toma', PTM.notificado
  FROM `pacientes` P
  LEFT JOIN segunda_toma_muestra_control STM ON P.id = STM.pacientes_id
  LEFT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
  WHERE numero_documento = :numero_documento LIMIT 1");
  $consulta->execute(array(':numero_documento' => $documento));
          $resultado = $consulta->fetch();
          //print_r($resultado);
          $Nombre_Completo=$resultado['Nombre_Completo'];
          $tipo_documento=$resultado['tipo_documento'];
          $numero_documento=$resultado['numero_documento'];
          $edad=$resultado['edad'];
          $Direccion_Residencia=$resultado['Direccion_Residencia'];
          $telefono=$resultado['telefono'];
          $aseguradora=$resultado['aseguradora'];
          $fecha_creacion_paciente=$resultado['fecha_creacion_paciente'];
          $fecha_primera_toma_muestra=$resultado['fecha_primera_toma_muestra'];
          $resultado_toma=$resultado['resultado_toma'];
          $notificado=$resultado['notificado'];
          $id=$resultado['id'];
          //mandamos un msg si no encontro nada
          if (empty($resultado)){
           $errores= 'Paciente no Encontrado'; //enviamos el mensaje de error
          }
}
}

require 'views/toma_muestra_control_view.php';

?>













