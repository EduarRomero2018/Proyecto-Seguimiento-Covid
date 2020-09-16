<?php
session_start();
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$tipo_paciente = $_POST['tipo_paciente'];$primer_nombre = $_POST['primer_nombre'];$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];$segundo_apellido = $_POST['segundo_apellido'];$tipo_documento = $_POST['tipo_documento'];
$numero_identificacion = $_POST['numero_identificacion'];$edad = $_POST['edad'];$unidad_medida = $_POST['unidad_medida'];$sexo = $_POST['sexo'];
$barrio= $_POST['barrio'];$correo= $_POST['correo'];$telefono= $_POST['telefono'];$aseguradora= $_POST['aseguradora']; $novedad_paciente = $_POST['novedad_paciente'];
$id_usuario= $_POST['id_usuario'];

if(isset($_POST['fecha_recepcion_programacion'] ) != ''){
  $fecha_recepcion_programacion=  $_POST['fecha_recepcion_programacion_'].' '.date('h:i:s');
}else{
  $fecha_recepcion_programacion = null;
}
$municipio = $_REQUEST['municipio'];
$regimen = $_REQUEST['regimen'];
$telefono2 = $_REQUEST['telefono2'];

// variables de errores y exito
$errores= '';
$exito= '';

if ($correo != '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
  $errores .= 'Esta dirección de correo No es Validad';
}

$consulta = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = ?");
$consulta->execute(array($numero_identificacion));

if($consulta->rowCount() == 0){
  //comprobamos que los campos no esten vacios
  if (empty($tipo_paciente) || empty ($primer_nombre) || empty($primer_apellido)|| empty($tipo_documento) || empty($numero_identificacion) || empty($edad) || empty($unidad_medida) || empty($sexo) || empty($barrio) || empty($telefono) || empty($aseguradora)){
  //si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
   $errores .= 'Todos los Campos deben estar diligenciados y con el Formato Adecuado';
  }
  else {
    $consulta =
    $conexion->prepare(
    "INSERT INTO pacientes
    (tipo_paciente, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, edad, unidad_medida, sexo, barrio, municipio, correo, telefono, telefono2, aseguradora, novedad_paciente, regimen, fecha_prog_recep, id_usuario, id_usuario_programacion)
    VALUES
    (:tipo_paciente, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :tipo_documento, :numero_documento, :edad, :unidad_medida, :sexo, :barrio, :municipio, :correo, :telefono, :telefono, :aseguradora, :novedad_paciente, :regimen, :fecha_prog_recep, :id_usuario, :id_usuario_programacion)");

    $consulta->execute(array(
     ':tipo_paciente'                       => ucwords($tipo_paciente),
     ':primer_nombre'                       => ucwords($primer_nombre),
     ':segundo_nombre'                      => ucwords($segundo_nombre),
     ':primer_apellido'                     => ucwords($primer_apellido),
     ':segundo_apellido'                    => ucwords($segundo_apellido),
     ':tipo_documento'                      => $tipo_documento,
     ':numero_documento'                    => $numero_identificacion,
     ':edad'                                => ucwords($edad),
     ':unidad_medida'                       => ucwords($unidad_medida),
     ':sexo'                                => ucwords($sexo),
     ':barrio'                              => ucwords($barrio),
     ':municipio'                           => ucwords($municipio),
     ':correo'                              => $correo,
     ':telefono'                            => $telefono,
     ':telefono2'                           => $telefono2,
     ':aseguradora'                         => ucwords($aseguradora),
     ':novedad_paciente'                    => ucwords($novedad_paciente),
     ':regimen'                             => $regimen,
     ':fecha_prog_recep'                    => $fecha_recepcion_programacion,
     ':id_usuario'                          => $id_usuario,
     ':id_usuario_programacion'             => $id_usuario
   ));


   $exito = 'Datos Guardados Exitosamente';
    //header('Location:index.php');//despues de guardar el usuario en al bd lo redirreccionamos al login para que inicie sessión
  }
}else{
  $errores = "Este paciente ya esta registrado";
}


}
 // require '/sesion/views/form1_view.php'; //llamamos la vista
  require 'views/form1_view.php';
?>

