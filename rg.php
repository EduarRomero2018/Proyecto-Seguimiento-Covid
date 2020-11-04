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
$export_report = $_POST['export_report'];

if (empty($tipo_de_reporte) || empty($fecha_final_reporte) || empty($fecha_final_reporte)){
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
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=numero_total_pacientes_mutual.xls');
          require_once 'views/rg_view.php';
        }
      break;
       // Pacientes que no pertenecen a mutual:
       case 'NTPNM':
        $consulta = $conexion->prepare(
        "SELECT P.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad' ,telefono, barrio,
        DATE(PTM.fecha_registro) AS fecha_registro, aseguradora, PTM.programacion_atencion, municipio
        FROM pacientes p
        LEFT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora != 'MUTUAL SER'
        AND P.fecha_registro BETWEEN  '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'");
        $consulta->execute();
        $ntpnm = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=pacientes_no_mutual.xls');
          require_once 'views/rg_view.php';
        }
      break;
      // numero total pacientes general
      case 'NTP':
        $consulta = $conexion->prepare(
        "SELECT P.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',
        DATE(fecha_registro) AS fecha_creacion, aseguradora
        FROM pacientes p
        WHERE P.fecha_registro BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND P.estado_paciente = 1");
        $consulta->execute();
        $ntp = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=numero_total_pacientes.xls');
          require_once 'views/rg_view.php';
        }
      break;
      // numero total muestras procesadas mutual
      case 'NTMP':
        $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',municipio
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
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=numero_total_muestras_procesadas.xls');
          require_once 'views/rg_view.php';
        }
      break;
       //Pacientes confirmado con toma de muestra sin asignacion a seguimiento
       case 'CPSA':
        $consulta = $conexion->prepare(
        "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',municipio,
        DATE(P.fecha_registro) AS fecha_creacion,
        DATE(PTM.fecha_programacion) AS fecha_programacion,
        DATE(PTM.fecha_realizacion) AS fecha_confirmacion,
        (PTM.programacion_atencion) AS lugar_de_la_toma, P.id_usuario_seguimiento
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora = 'MUTUAL SER'
        AND PTM.fecha_realizacion BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND P.id_usuario_seguimiento IS NULL
        AND PTM.fecha_realizacion IS NOT NULL");
        $consulta->execute();
        $cpsa = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=Pacientes_sin_Asignacion.xls');
          require_once 'views/rg_view.php';
        }
      break;
      //Pacientes positivo sin asignacion a profesional (Medicos)
      case 'CPSM':
        $consulta = $conexion->prepare(
        "		SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
				municipio,
        DATE(PTM.fecha_programacion) AS fecha_programacion,
        DATE(PTM.fecha_realizacion) AS fecha_confirmacion,
        (PTM.programacion_atencion) AS lugar_de_la_toma, PTM.resultado
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora = 'MUTUAL SER'
        AND PTM.fecha_realizacion BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND PTM.resultado = 1
        AND P.id_usuario_notificacion IS NULL");
        $consulta->execute();
        $cpsm = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=Pacientes_sin_Asignacion.xls');
          require_once 'views/rg_view.php';
        }
      break;
      // cantidad de pacientes pendientes por asignar
      case 'CPPA':
        $consulta = $conexion->prepare(
          "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        CONCAT(tipo_documento, ' - ', numero_documento) AS 'identificacion',
        CONCAT(edad, ' ', unidad_medida) AS 'edad',
        DATE(P.fecha_registro) AS fecha_creacion,
        DATE(PTM.fecha_programacion) AS fecha_programacion
        FROM pacientes P
        RIGHT JOIN prog_toma_muestra PTM ON P.id = PTM.pacientes_id
        WHERE P.aseguradora = 'MUTUAL SER'
        AND P.fecha_registro  BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND PTM.fecha_programacion IS NOT NULL
        AND PTM.fecha_realizacion IS NULL");
        $consulta->execute();
        $cppa = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=cant_p_p_asignar.xls');
          require_once 'views/rg_view.php';
        }
      break;
      // cantidad de seguimientos por pacientes
      case 'CSP':
        $consulta = $conexion->prepare(
        "SELECT  SP.id_pacientes, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        P.numero_documento,
        COUNT(*) as 'Numero_de_Seguimientos'
        FROM seguimiento_paciente SP
        RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
        WHERE SP.fecha_hora BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        GROUP BY SP.id_pacientes
        ORDER BY Numero_de_Seguimientos DESC");
        $consulta->execute();
        $csp = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=segui_x_paciente.xls');
          require_once 'views/rg_view.php';
        }
      break;
       // cantidad de pacientes asignados a Anais Zabaleta
       case 'AZ':
        $consulta = $conexion->prepare(
        "SELECT  SP.id_pacientes,
				CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo',
        P.numero_documento,
        COUNT(*) as 'Numero_de_Seguimientos', P.id_usuario_seguimiento
        FROM seguimiento_paciente SP
        RIGHT JOIN pacientes P ON SP.id_pacientes = P.id
				RIGHT JOIN usuarios U ON P.id_usuario_seguimiento = U.id
        WHERE SP.id_usuario_seguimiento BETWEEN '$fecha_inicio_reporte' AND '$fecha_final_reporte 23:00:00'
        AND P.aseguradora = 'MUTUAL SER'
				AND P.id_usuario_seguimiento = 19
        GROUP BY SP.id_pacientes");
        $consulta->execute();
        $az = $consulta->fetchAll(PDO::FETCH_OBJ);
        $count = $consulta -> rowCount();
        if(isset($_REQUEST['export_report'])){
          header('Content-type:application/xls');
          header('Content-Disposition: attachment; filename=Seguimiento_Anais Zabaleta.xls');
          require_once 'views/rg_view.php';
        }
      break;
       // cantidad de pacientes pendientes positivos
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