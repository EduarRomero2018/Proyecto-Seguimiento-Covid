<?php
//Listar Seguimiento
//Dato Necesario ID_paciente
//MARIO FERNANDEZ 2020-06-07
/* SQL EJEMPLO
SELECT s.fecha,s.hora, s.asintomatico, s.fiebre_cuantificada, s.tos, s.dificultad_respiratoria, s.odinofagia, s.fatiga_adinamia, s.fecha_seguimiento
FROM `complemento_seg` C
INNER JOIN pacientes P ON p.id=c.id_paciente
INNER JOIN seguimiento_paciente s ON s.complemento_seg_id=c.id
WHERE P.numero_documento='1047433073'
ORDER BY s.fecha_seguimiento
*/

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

/*foreach ($_REQUEST as $key) {
    if ($key == '') {
        die(json_encode('empty'));
    }
}*/

try {
    $numero_documento = $_REQUEST['numero_documento'];
    /*
        //comprobamos que los campos no esten vacios
    */

    $stm = $conexion->prepare("SELECT
    s.fecha,s.hora, s.asintomatico, s.fiebre_cuantificada, s.tos, s.dificultad_respiratoria, s.odinofagia, s.fatiga_adinamia, s.fecha_seguimiento
    FROM `complemento_seg` C
    INNER JOIN pacientes P ON p.id=c.id_pacientes
    INNER JOIN seguimiento_paciente s ON s.complemento_seg_id=c.id
    WHERE P.numero_documento='3387632'
    ORDER BY s.fecha_seguimiento ");
    $stm->execute();
    //print_r($stm);
    if ($stm->errorInfo()[2] != null) {
        $err = $stm->errorInfo()[2];
        die(json_encode($err));
    }

    if (!$stm->rowCount()) {
        die(json_encode('err'));
    }

    $res = json_decode(json_encode($stm->fetchAll(PDO::FETCH_OBJ)), true);
    //$res= json_decode($stm->fetchAll(PDO::FETCH_OBJ),true);
    //print_r($res);die();
    echo '<div class="container-fluid">';
    $cont=1;
    $sem=1;

    $htmlOut= '</div>
        </div>';
    $color='';
    foreach ($res as $key => $value) {
        if ($cont == 1) {
            $color= 'primary';
            echo '<div class="fondo_formulario"><div class="row">';
        }if ($cont == 2) {
            $color= 'warning';
            //echo '<div class="fondo_formulario"><div class="row">';
        }
        if ($cont == 3) {
            $color= 'info';
            //echo '<div class="fondo_formulario"><div class="row">';
        }
        if ($cont == 4) {
            $color= 'dark';
            //echo '<div class="fondo_formulario"><div class="row">';
        }
        echo '<div class="col-sm-3">
                <div class="card text-white bg-'. $color .' mb-3" style="max-width: 18rem;">';
        echo '<div class="card-header">Dia '.$sem.'</div>';
        echo '<h5 class="card-title">Fecha: ' . $value["fecha"].' Hora: ' . $value["hora"] .'</h5>';
        echo '<p class="card-text">';
        echo "Asintomatico: " . $value["asintomatico"] . "<br>";
        echo "Fiebre_cuantificada: " . $value["fiebre_cuantificada"] . "<br>";
        echo "Tos: " . $value["tos"] . "<br>";
        echo "Dificultad Respiratoria: " . $value["dificultad_respiratoria"] . "<br>";
        echo "odinofagia: " . $value["odinofagia"] . "<br>";
        echo "Fatiga adinamia: " . $value["fatiga_adinamia"] . "<br>";
        echo "Fecha Seguimiento: " . $value["fecha_seguimiento"] . "<br>";
        echo "</p>";
        echo $htmlOut;

        if($cont==4){
            $cont=0;
            echo "</div></div>";
        }
        $cont++;
        $sem++;
    }
    echo '</div>';
} catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
}


?>