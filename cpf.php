<!-- CANTIDAD DE PACIENTES FALLECIDOS -->
<?php session_start(); //vamos a trabajar con sessiones
include 'conexion.php';
switch ($_SESSION['role']) {
    case 'Coordinador covid':
        $filtro = "";
        break;

    case 'Auxiliar de programacion':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario = $id_session";
        break;
    case 'Auxiliar de seguimiento':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_seguimiento = $id_session";
        break;
    case 'Digitador':
        $id_session = $_SESSION['id'];
        $filtro = "";
        break;
    case 'Medico':
        $id_session = $_SESSION['id'];
        $filtro = "AND id_usuario_notificacion = $id_session AND prog_toma_muestra.resultado = 1";
        break;
}
$usuario_id = $_SESSION['id'];
$consulta = $conexion->prepare(
                "SELECT CONCAT(primer_nombre, ' ', primer_apellido, ' ', segundo_apellido) AS 'Nombre_Completo',
                tipo_documento,
                numero_documento,
                edad,
                estado_paciente,
                DATE(fecha_fallecimiento) AS fecha_fallecimiento
                FROM pacientes
                WHERE estado_paciente = 'MUERTO'
                AND aseguradora = 'MUTUAL SER'");

            $consulta->execute();
            $res = $consulta->fetchAll(PDO::FETCH_OBJ);

            require 'views/cpf_view.php';


