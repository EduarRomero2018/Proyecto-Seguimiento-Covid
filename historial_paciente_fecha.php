
<?php session_start(); //vamos a trabajar con sessiones

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

    //print_r ($_POST);
    if($_REQUEST){
        $documento = isset($_REQUEST['documento'])?$_REQUEST['documento']:$_REQUEST['nd'];
        $errores = '';
        $exito = '';
        //comprobamos que los campos no esten vacios
        if (empty($documento) or (!is_numeric($documento))) {
            $errores = 'El campo no debe estar vacio y debe ser solo numerico'; //si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
    
        } else {
            $consulta = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = $documento");
            $consulta->execute();
            if ($consulta->rowCount() > 0) {
            //CODIGO CARDS
                $consulta = $conexion->prepare("SELECT pacientes.id as id, CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', numero_documento, tipo_documento,
                    DATE(pacientes.fecha_registro) AS fecha_registro,edad,DATE(ptm.fecha_programacion) AS fecha_programacion, DATE(fecha_realizacion) AS fecha_realizacion, programa_pertenece, DATE(fecha_entrega_lab) AS fecha_entrega_lab, DATE(fecha_resultado) AS fecha_resultado, resultado
                    FROM pacientes
                    INNER JOIN prog_toma_muestra ptm ON ptm.pacientes_id = pacientes.id
                    WHERE numero_documento = :numero_documento"
                );
                $consulta->execute(array(':numero_documento' => $documento));

                if($consulta->rowCount() > 0){
                    $resultado = $consulta->fetch();
                    $id = $resultado['id'];
                    $Nombre_Completo = $resultado['Nombre_Completo'];
                    $tipo_documento = $resultado['tipo_documento'];
                    $numero_documento = $resultado['numero_documento'];
                    $fecha_registro = $resultado['fecha_registro'];
                    $edad = $resultado['edad'];
                    $fecha_programacion = $resultado['fecha_programacion'];
                    $fecha_realizacion = $resultado['fecha_realizacion'];
                    $programa_pertenece = $resultado['programa_pertenece'];
                    $fecha_entrega_lab = $resultado['fecha_entrega_lab'];
                    $fecha_resultado = $resultado['fecha_resultado'];
                    $resultadoP = $resultado['resultado'];
                    
                    $stm = $conexion->prepare("SELECT DATE(fecha_hora) as fecha_hora FROM seguimiento_paciente WHERE id_pacientes = $id GROUP BY DATE(fecha_hora)");
                    $stm->execute();

                    $res = $stm->fetchAll(PDO::FETCH_OBJ);

                }
    
                //mandamos un msg si no encontro nada
    
                
                if (!$consulta->rowCount()) {
                    $errores = 'Este paciente no tiene seguimiento';
                }
    
            }else{
                $errores = 'Paciente no se encuentra Registrado';
            }
        }
    }
    //variables globales que recogen al final el estado del condicional

require 'views/historial_paciente_fecha_view.php';
?>