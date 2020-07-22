<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
    if($_REQUEST['buscar'] == ''){
        die(json_encode('empty'));
    }

    $identificacion = $_REQUEST['buscar'];
    $stm = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = '$identificacion'");
    //print_r($stm);
    //die();
    $stm->execute();

    if(!$stm->rowCount()){
        die(json_encode('err'));
    }
    $resultado = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($resultado as $key => $row)
    validar($conexion,$row->id);

    echo(json_encode($resultado));

    function validar($conexion,$id)
    {
        $consulta = $conexion->prepare(
            "SELECT *
            FROM prog_toma_muestra
            WHERE pacientes_id = ?  AND fecha_realizacion IS NULL"
        );
        $consulta->execute(array($id));

        if($consulta->rowCount() != 0 ){
            die(json_encode('null'));
        }

        $consulta = $conexion->prepare(
            "SELECT *
            FROM prog_toma_muestra
            WHERE pacientes_id = ? AND prog_toma_muestra.resultado != 'Pendiente'"
        );
        $consulta->execute(array($id));

        if($consulta->rowCount() > 0){
            die(json_encode($consulta->rowCount()));
        }

        $ok = json_encode('ok');
    }
?>