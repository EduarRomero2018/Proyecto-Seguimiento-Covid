<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// variables de Atención personal
$tipo_paciente = $_POST['tipo_paciente'];
//echo $tipo_paciente;
$primer_nombre = $_POST['primer_nombre'];
//echo $primer_nombre;
$segundo_nombre = $_POST['segundo_nombre'];
//echo $segundo_nombre;
$primer_apellido = $_POST['primer_apellido'];
//echo "<br>";
$segundo_apellido = $_POST['segundo_apellido'];
//echo "<br>";
$tipo_documento = $_POST['tipo_documento'];
//echo $tipo_documento;
$numero_identificacion = $_POST['numero_identificacion'];
//echo $numero_identificacion;
$edad = $_POST['edad'];
//echo $edad;
$unidad_medida = $_POST['unidad_medida'];
//echo "<br>";
$sexo = $_POST['sexo'];
//echo $sexo;
$barrio= $_POST['barrio'];
//echo $barrio."<br>";
$correo= $_POST['correo'];
//echo $correo."<br>";
$telefono= $_POST['telefono'];
//echo $telefono ."<br>";
$aseguradora= $_POST['aseguradora'];

$id_usuario= $_POST['id_usuario'];

$fecha_recepcion_programacion= $_POST['fecha_recepcion_programacion'];

//echo $fecha_recepcion_programacion;

print_r($_REQUEST);

//variables globales que recogen al final el estado del condicional
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
  (tipo_paciente, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, edad, unidad_medida, sexo, barrio, correo, telefono, aseguradora, fecha_prog_recep, id_usuario)
  VALUES
  (:tipo_paciente, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :tipo_documento, :numero_documento, :edad, :unidad_medida, :sexo, :barrio, :correo, :telefono, :aseguradora, :fecha_prog_recep, :id_usuario)");

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

