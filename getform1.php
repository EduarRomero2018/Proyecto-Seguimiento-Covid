<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// variables de Atención personal
$tipo_paciente = $_POST['tipo_paciente'];$primer_nombre = $_POST['primer_nombre'];$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];$segundo_apellido = $_POST['segundo_apellido'];$tipo_documento = $_POST['tipo_documento'];
$numero_identificacion = $_POST['numero_identificacion'];$edad = $_POST['edad'];$unidad_medida = $_POST['unidad_medida'];$sexo = $_POST['sexo'];
$barrio= $_POST['barrio'];$correo= $_POST['correo'];$telefono= $_POST['telefono'];$aseguradora= $_POST['aseguradora'];
$id_usuario= $_POST['id_usuario'];$fecha_recepcion_programacion= $_POST['fecha_recepcion_programacion_'].' '.date('h:i:s');
$municipio = $_REQUEST['municipio'];

// variables de errores y exito
$errores= '';
$exito= '';

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
  $errores .= 'Esta dirección de correo No es Validad';
}
//comprobamos que los campos no esten vacios
if (empty($tipo_paciente) || empty ($primer_nombre) || empty($primer_apellido) || empty($segundo_apellido)
|| empty($tipo_documento) || empty($numero_identificacion) || empty($edad) || empty($unidad_medida) || empty($sexo) || empty($barrio) || empty($telefono) || empty($aseguradora)){
//si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
 $errores .= 'Todos los Campos deben estar diligenciados y con el Formato Adecuado';
}
else {
  $consulta =
  $conexion->prepare(
  "INSERT INTO pacientes
  (tipo_paciente, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, edad, unidad_medida, sexo, barrio, municipio, correo, telefono, aseguradora, fecha_prog_recep, id_usuario)
  VALUES
  (:tipo_paciente, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :tipo_documento, :numero_documento, :edad, :unidad_medida, :sexo, :barrio, :municipio, :correo, :telefono, :aseguradora, :fecha_prog_recep, :id_usuario)");

  $consulta->execute(array(
   ':tipo_paciente'                       => $tipo_paciente,
   ':primer_nombre'                       => $primer_nombre,
   ':segundo_nombre'                      => $segundo_nombre,
   ':primer_apellido'                     => $primer_apellido,
   ':segundo_apellido'                    => $segundo_apellido,
   ':tipo_documento'                      => $tipo_documento,
   ':numero_documento'                    => $numero_identificacion,
   ':edad'                                => $edad,
   ':unidad_medida'                       => $unidad_medida,
   ':sexo'                                => $sexo,
   ':barrio'                              => $barrio,
   ':municipio'                           => $municipio,
   ':correo'                              => $correo,
   ':telefono'                            => $telefono,
   ':aseguradora'                         => $aseguradora,
   ':id_usuario'                          => $id_usuario,
   ':fecha_prog_recep'                    => $fecha_recepcion_programacion
 ));
 $exito = 'Datos Guardados Exitosamente';
  //header('Location:index.php');//despues de guardar el usuario en al bd lo redirreccionamos al login para que inicie sessión
}


}
 // require '/sesion/views/form1_view.php'; //llamamos la vista
  require 'views/form1_view.php';
?>

