
<?php session_start(); //vamos a trabajar con sessiones

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //print_r ($_POST);
    $documento = $_POST['documento'];
    //variables globales que recogen al final el estado del condicional
    $errores = '';
    $exito = '';
    //comprobamos que los campos no esten vacios
    if (empty($documento) or (!is_numeric($documento))) {
        $errores = 'El campo no debe estar vacio y debe ser solo numerico'; //si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable

    } else {
        //CODIGO CARDS
        $consulta = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = $documento");
        $consulta->execute();
        if ($consulta->rowCount() > 0) {

            $consulta = $conexion->prepare("SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS 'Nombre_Completo', numero_documento, tipo_documento,
        fecha_registro,edad,ptm.fecha_programacion, fecha_realizacion, programa_pertenece, fecha_entrega_lab, fecha_resultado, resultado
         FROM pacientes
         INNER JOIN prog_toma_muestra ptm ON ptm.pacientes_id = pacientes.id
         WHERE numero_documento = :numero_documento");
            $consulta->execute(array(':numero_documento' => $documento));

            $resultado = $consulta->fetch();
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
            $resultado = $resultado['resultado'];
            //mandamos un msg si no encontro nada

            $stm = $conexion->prepare("SELECT
            s.fecha_hora, s.asintomatico, s.fiebre_cuantificada, s.tos, s.dificultad_respiratoria,
             s.odinofagia, s.fatiga_adinamia, cumple_criterios, comorbilidad, fecha_entrega_kits, oxigeno_terapia
             FROM `complemento_seg` C
             INNER JOIN pacientes P ON p.id = c.id_pacientes
             INNER JOIN seguimiento_paciente s ON s.complemento_seg_id = c.id
             WHERE P.numero_documento = $documento");
            $stm->execute();
            //print_r($stm);
            if ($stm->errorInfo()[2] != null) {
                $errores = $stm->errorInfo()[2];
            }

            if (!$stm->rowCount()) {
                $errores = 'Este paciente no tiene seguimiento';
            }

            $res = $stm->fetchAll(PDO::FETCH_OBJ);
        } else {
            $errores = 'Paciente no se encuentra Registrado';
        }
    }
}
require 'views/historial_paciente_view.php';
?>