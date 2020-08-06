<?php

require_once 'conexion.php';


if (isset($_REQUEST['guardar']) || isset($_REQUEST['listar'])) {

    $documento = $_REQUEST['documento'];

    $errores = '';
    $exito = '';


    $stm = $conexion->prepare("SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', id
     FROM pacientes WHERE numero_documento = ?");
    $stm->execute(array($documento));

    $res = $stm->fetch();

    if ($stm->errorInfo()[2] != null) {
        print_r($stm->errorInfo());
    }


    if ($stm->rowCount() > 0) {

        $paciente_id = $res['id'];
        $Nombre_Completo = $res['Nombre_Completo'];

        if(isset($_REQUEST['listar'])){
            $stm = $conexion->prepare("SELECT * ,soporte_resultado.fecha_registro AS Fecha_registro
            FROM soporte_resultado
            WHERE pacientes_id = ?
            AND soporte_resultado != ''");
            $stm->execute(array($paciente_id));

            if ($stm->errorInfo()[2] != null) {
                print_r($stm->errorInfo());
            }

            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
            } else {
                $errores = 'No se encontraron soportes de resultados asociados a este paciente';
            }
        }else {

            $nombre = $_FILES['soporte']['name'];
            $formato = $_FILES['soporte']['type'];
            $tmp = $_FILES['soporte']['tmp_name'];
            $ruta = 'soporte_resultado/' . $documento;
            $archivo = $documento . '-' . $nombre;
            $url = $ruta . '/' . $archivo;

            //$error = '';

            if ($formato != 'application/pdf') {
                $errores.= 'El formato ' . $formato . ' no esta permitido';
                //echo ($error);
            } else {

                $stm = $conexion->prepare("SELECT *
                FROM prog_toma_muestra
                WHERE pacientes_id = ? AND resultado !='Pendiente'");
                $stm->execute(array($paciente_id));

                if ($stm->errorInfo()[2] != null) {
                    print_r($stm->errorInfo());
                }

                if ($stm->rowCount() > 0) {

                    $stm = $conexion->prepare("INSERT INTO soporte_resultado VALUES (NULL, ?,?,NOW())");
                    $stm->execute(array($url, $paciente_id));

                    if ($stm->errorInfo()[2] != null) {
                        print_r($stm->errorInfo());
                    }

                    if ($stm->rowCount() > 0) {

                        if (file_exists($ruta)) {
                            move_uploaded_file($_FILES['soporte']['tmp_name'], $ruta . '/' . $archivo);
                        } else {
                            mkdir($ruta);
                            move_uploaded_file($_FILES['soporte']['tmp_name'], $ruta . '/' . $archivo);
                        }

                        $exito = 'Archivo Guardado';

                     } else {

                       $stm = $conexion->prepare("SELECT *
                       FROM soporte_resultado
                       WHERE pacientes_id = ?");
                       $stm->execute(array($paciente_id));

                       $resultado = $stm->fetch();
                       $contador = $stm->rowCount();

                       $errores = 'El Paciente ya cuenta con ' . $contador . ' reporte, Favor Verifique';
                }

                } else {

                    $errores = 'El paciente aun no cuenta con resultados, Favor Verifique';
                }
            }
        }

    } else {
        $errores =  'Paciente no encontrado';
    }


}
require 'views/soporte_resultado_view.php';
