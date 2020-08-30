<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// variables de errores y exito
$errores= '';
$exito= '';
$tipo_de_reporte = $_POST['tipo_reporte'];
$fecha_inicio_reporte = $_POST['fecha_inicio_reporte'];
$fecha_final_reporte = $_POST['fecha_final_reporte'];

if (empty($tipo_de_reporte)){
    $errores .= 'Debe Seleccionar por lo menos un Reporte';
  }
if (empty($fecha_inicio_reporte) || empty($fecha_final_reporte) || empty($fecha_final_reporte)){
    $errores = 'Las fechas son Obligatorias';
  }
//   else {
    switch ($tipo_de_reporte) {

      case 'CPP':
        $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
          numero_documento,
          CONCAT(telefono, '-', telefono2) AS 'telefonos', barrio
          FROM pacientes P
          RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
          WHERE resultado = 'Positivo' AND estado_paciente = 'VIVO'");
        $consulta->execute();
        $res = $consulta->fetchAll(PDO::FETCH_OBJ);
        // print_r($res);
        break;

        case 'CPN':
          $consulta = $conexion->prepare(
            "SELECT roles FROM usuarios
            WHERE identificacion = '1047433073'");
          $consulta->execute();
          $res = $consulta->fetchAll(PDO::FETCH_OBJ);
          // print_r($res);
          break;

          case 'CPS':
            $consulta = $conexion->prepare(
              "SELECT COUNT(*) FROM usuarios");
            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);
            // print_r($res);
            break;

            case 'CPA':
              $consulta = $conexion->prepare(
                "SELECT COUNT(*) FROM pacientes");
              $consulta->execute();
              $res = $consulta->fetchAll(PDO::FETCH_OBJ);
              // print_r($res);
              break;

            case 'CPF':
              $consulta = $conexion->prepare(
                "SELECT COUNT(*) FROM prog_toma_muestra");
              $consulta->execute();
              $res = $consulta->fetchAll(PDO::FETCH_OBJ);
              // print_r($res);
              break;

            case 'CMP':
              $consulta = $conexion->prepare(
                "SELECT COUNT(*) FROM seguimiento_paciente");
              $consulta->execute();
              $res = $consulta->fetchAll(PDO::FETCH_OBJ);
              // print_r($res);
              break;

      default:
        # code...
        break;
    }
//   }
// }
// else {


}

    require_once 'views/rg_view.php';
// }