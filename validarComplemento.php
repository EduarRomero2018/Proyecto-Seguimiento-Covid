<?php

session_start(); //vamos a trabajar con sessiones

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //print_r ($_POST);

    // variables de Atención personal
    $paciente_id = $_POST['paciente_id'];
    //echo $documento;

    //variables globales que recogen al final el estado del condicional
    $errores = '';
    $exito = '';

    if (empty($paciente_id) or (!is_numeric($paciente_id))) {
        $errores = 'El campo no debe estar vacio y debe ser solo numerico'; //si hay alguna variable vacia, entonces errores va hacer igual al contenido que tenga la variable
    } else {

        $consulta = $conexion->prepare(
            "SELECT * FROM complemento_seg WHERE id_pacientes = ?"
        );
        $consulta->execute(array($paciente_id));
        $res = $consulta->fetch();

        if($consulta->errorInfo()[2] != null){
            die(json_encode($consulta->errorInfo()[2]));
        }

        if($consulta->rowCount() > 0){
            die(json_encode(array('ok',$res['id'])));
        }else {
            die(json_encode(array('primera_vez',null)));
        }
    }
}
