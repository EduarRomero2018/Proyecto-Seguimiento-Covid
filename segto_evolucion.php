<?php session_start(); //vamos a trabajar con sessiones

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // variables de Atención personal
    $documento = $_POST['documento'];

    //variables globales que recogen al final el estado del condicional
    $errores = '';
    $exito = '';

    if (empty($documento) or (!is_numeric($documento))) {
        $errores = 'El campo no debe estar vacio y debe ser solo numerico'; //si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
    } else {

        $consulta = $conexion->prepare(
            "SELECT * FROM pacientes WHERE numero_documento = ?"
        );
        $consulta->execute(array($documento));
        $res = $consulta->fetch();

        if($consulta->rowCount() > 0){
            $consulta = $conexion->prepare(
                "SELECT * FROM seguimiento_paciente WHERE id_pacientes = ?"
            );
            $consulta->execute(array($res['id']));
        }


        if ($consulta->rowCount() > 0) {
            $hidden = '';
        }

        if (!empty($res)) {
            $consulta = $conexion->prepare(
                "SELECT pacientes.id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', tipo_documento,edad,
                numero_documento,fecha_entrega_lab ,fecha_resultado,resultado,pacientes_id,DATE(fecha_programacion) AS fecha_programacion
                FROM pacientes
                RIGHT JOIN prog_toma_muestra ON pacientes.id = prog_toma_muestra.pacientes_id
                WHERE numero_documento = ?"
            );
            $consulta->execute(array($documento));
            $res = $consulta->fetch();

            if (empty($res)) {
                $errores = 'El paciente no tiene programada la fecha de toma de muestra'; //enviamos el mensaje de error
            }else{
                $Nombre_Completo = $res['Nombre_Completo'];
                $tipo_documento = $res['tipo_documento'];
                $identificacion = $res['numero_documento'];
                $edad = $res['edad'];
                // $usuario_creacion = $res['usuario_creacion'];
                $fecha_entrega_laboratorio = $res['fecha_entrega_lab'];
                $fecha_resultado = $res['fecha_resultado'];
                $resultado = $res['resultado'];
                $fecha_programacion = $res['fecha_programacion'];
                $id = $res['id'];

                $consulta = $conexion->prepare(
                    "SELECT * FROM complemento_seg WHERE id_pacientes = $id"
                );
                $consulta->execute();
                $result = $consulta->fetch();

                $stm = $conexion->prepare(
                    "SELECT * FROM seguimiento_paciente WHERE id_pacientes = $id AND actual = 1 AND paciente_recuperado = 1"
                );
                $stm->execute();
                $result_actual = $stm->fetch();
            }

        } else {
            $errores = 'Paciente no encontrado';
        }
    }
}
require 'views/segto_evolucion_view.php';