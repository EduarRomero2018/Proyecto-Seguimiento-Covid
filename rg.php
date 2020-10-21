<?php
ini_set('display_error', '1');
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// variables de errores y exito
$errores= '';
$exito= '';
$tipo_de_reporte = $_POST['tipo_reporte'];
$fecha_inicio_reporte = $_POST['fecha_inicio_reporte'];
$fecha_final_reporte = $_POST['fecha_final_reporte'];
// if(isset($_POST["export_data"])) {
//   $filename = "nombre_archivo".date('Ymd') . ".xls";
//   header("Content-Type: application/vnd.ms-excel");
//   header("Content-Disposition: attachment; filename=".$filename);
// }

if (empty($tipo_de_reporte) || empty($fecha_final_reporte) || empty($fecha_final_reporte) ){
    $errores .= 'Verifique el reporte a generar y que las fechas esten diligenciadas correctamente';
  }
  else {
    switch ($tipo_de_reporte) {
      // numero total pacientes mutual
      case 'NTPM':
        $consulta = $conexion->prepare(
        "SELECT P.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad' ,telefono, barrio,
        DATE(fecha_registro) AS fecha_registro
        FROM pacientes p
        WHERE P.aseguradora = 'MUTUAL SER'
        AND P.fecha_registro BETWEEN  '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'");
        $consulta->execute();
        $ntpm = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
      break;
       // Pacientes que no pertenecen a mutual:
       case 'NTPNM':
        $consulta = $conexion->prepare(
        "SELECT P.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad' ,telefono, barrio,
        DATE(fecha_registro) AS fecha_registro, aseguradora
        FROM pacientes p
        WHERE P.aseguradora != 'MUTUAL SER'
        AND P.fecha_registro BETWEEN  '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'");
        $consulta->execute();
        $ntpnm = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
      break;
      // numero total pacientes general
      case 'NTP':
        $consulta = $conexion->prepare(
        "SELECT P.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',
        DATE(fecha_registro) AS fecha_creacion
        FROM pacientes p
        WHERE P.fecha_registro BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND P.estado_paciente = 1");
        $consulta->execute();
        $ntp = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
      break;
      // numero total muestras procesadas mutual
      case 'NTMP':
        $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',
        DATE(P.fecha_registro) AS fecha_creacion,
        DATE(PTM.fecha_realizacion) AS fecha_confirmacion,
        (PTM.programacion_atencion) AS lugar_de_la_toma
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora = 'MUTUAL SER'
        AND PTM.fecha_realizacion BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND PTM.fecha_realizacion IS NOT NULL");
        $consulta->execute();
        $ntmp = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
      break;
      // cantidad de pacientes pendientes por asignar
      case 'CPPA':
        $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',
        DATE(P.fecha_registro) AS fecha_creacion,
        DATE(PTM.fecha_programacion) AS fecha_programacion, PTM.fecha_realizacion
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora = 'MUTUAL SER'
        AND P.fecha_registro  BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND PTM.fecha_realizacion IS NULL");
        $consulta->execute();
        $cppa = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
        header('Content-type:application/xls');
        header('Content-Disposition: attachment; filename=nombre.xls');
        require_once 'views/rg_view.php';
      }
      break;

      case 'CPP':
          $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento, edad,
          numero_documento,
          CONCAT(telefono, '-', telefono2) AS 'telefonos', barrio
          FROM pacientes P
          RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
          WHERE resultado = 'Positivo' AND estado_paciente = 'VIVO'");
          $consulta->execute();
          $cpp = $consulta->fetchAll(PDO::FETCH_OBJ);
        // print_r($res);
        break;

        case 'CPN':
          $consulta = $conexion->prepare(
            "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento, edad,
            numero_documento,
            CONCAT(telefono, '-', telefono2) AS 'telefonos', barrio,
            DATE(PTM.fecha_programacion) AS fecha_programacion,
            PTM.fecha_entrega_lab,
            PTM.fecha_resultado,
            PTM.resultado
            FROM pacientes P
            LEFT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
            LEFT JOIN segunda_toma_muestra_control_2 STM on STM.pacientes_id = P.id
            WHERE PTM.resultado = 'Negativo'
            AND estado_paciente = 'VIVO'
            AND aseguradora = 'MUTUAL SER'");
          $consulta->execute();
          $cpn = $consulta->fetchAll(PDO::FETCH_OBJ);
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

            case '':
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
    }
    }

    require_once 'views/rg_view.php';
// }