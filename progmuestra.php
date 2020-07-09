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
  $consulta = $conexion->prepare('SELECT * FROM pacientes WHERE numero_documento = :numero_documento LIMIT 1');
  $consulta->execute(array(':numero_documento' => $documento));
  $resultado = $consulta->fetch();
          if (empty($resultado)){
          $errores= 'Paciente no Encontrado'; //enviamos el mensaje de error
          }else{
            $tipo_documento=$resultado['tipo_documento'];
            $numero_documento=$resultado['numero_documento'];
            $edad=$resultado['edad'];
            $primer_nombre=$resultado['primer_nombre'];
            $segundo_nombre=$resultado['primer_apellido'];
            $nombre_completo = $primer_nombre. ' '. $segundo_nombre;
            $tipo_paciente=$resultado['tipo_paciente'];
            $aseguradora=$resultado['aseguradora'];
            $fecha_registro=$resultado['fecha_registro'];
            $id=$resultado['id'];
          }
          //mandamos un msg si no encontro nada
}
}

require 'views/progmuestra_view.php';

?>













