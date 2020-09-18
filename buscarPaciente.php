<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
    if($_REQUEST['buscar'] == ''){
        die(json_encode('empty'));
    }

    $identificacion = $_REQUEST['buscar'];
    $tabla = $_REQUEST['tabla'];
    $stm = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = '$identificacion'");
    $stm->execute();

    if(!$stm->rowCount()){
        die(json_encode('err'));
    }

    $resultado = $stm->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultado as $key => $row)

    validar($conexion,$row->id,$tabla);
    
    echo(json_encode($resultado));

    function validar($conexion,$id,$tabla)
    {
        $consulta = $conexion->prepare(
            "SELECT *
            FROM $tabla
            WHERE pacientes_id = ?  AND fecha_realizacion IS NOT NULL"
        );
        $consulta->execute(array($id));

        if($consulta->rowCount() == 0 ){
            die(json_encode('null'));
        }

        $consulta = $conexion->prepare(
            "SELECT *
            FROM $tabla
            WHERE pacientes_id = ? AND resultado != 'Pendiente'"
        );
        $consulta->execute(array($id));

        if($consulta->rowCount() > 0){
            die(json_encode($consulta->rowCount()));
        }

    }
?>