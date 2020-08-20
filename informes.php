<?php
require_once 'conexion.php';

print_r($_REQUEST);



$date = date('Y-m-d');
$anio = date('Y');
$mes = date('m');
$dia = date('d');

$semanal = 7;

for ($semanal; $semanal != 1; $semanal--) {
    $dia--;
    if ($dia == 0) {
        
        $mes--;

        if ($mes == 0) {
            $mes = 12;
        }

        switch ($mes) {
            case 1:
                $dia = 31;
                break;
            case 2:
                $bisiesto = $anio % 4;
                if ($bisiesto == 0) {
                    $dia = 29;
                }else{
                    $dia = 28;
                }
                break;
            case 3:
                $dia = 31;
                break;
            case 4:
                $dia = 30;
                break;
            case 5:
                $dia = 31;
                break;
            case 6:
                $dia = 30;
                break;
            case 7:
                $dia = 31;
                break;
            case 8:
                $dia = 31;
                break;
            case 9:
                $dia = 30;
                break;
            case 10:
                $dia = 31;
                break;
            case 11:
                $dia = 30;
                break;
            case 12:
                $dia = 31;
                break;
        }
    }
}

echo('Fecha hace 7 dias: ' . $anio.'-'.$mes.'-'.$dia);
$semanal = $anio.'-'.$mes.'-'.$dia;

$stm = $conexion->prepare(
    "SELECT * FROM prog_toma_muestra
    WHERE visita_exitosa = 'SI' AND resultado = 'Positivo' 
    AND DATE(fecha_registro) BETWEEN ? AND DATE(NOW())"
);
$stm->execute(array($semanal));

$res = $stm->fetchAll(PDO::FETCH_OBJ);
echo '<br> -- Cantidad de visitas exitosas a pacientes positivos semanal -- <br>';
foreach ($res as $dato ) {
    echo $dato->id . ' - ' . $dato->visita_exitosa . ' - ' . $dato->resultado . ' - ' . $dato->fecha_registro . '<br>';
}
print_r('Numero de resultados: ' . $stm->rowCount() . '<br>');
echo '----------------------------------------------------------------';

$stm = $conexion->prepare(
    "SELECT * FROM prog_toma_muestra
    WHERE fecha_realizacion IS NOT NULL 
    AND DATE(fecha_registro) BETWEEN ? AND DATE(NOW())"
);
$stm->execute(array($semanal));

$res = $stm->fetchAll(PDO::FETCH_OBJ);
echo '<br> -- Cantidad de muestras efictivas semanal -- <br>';
foreach ($res as $dato ) {
    echo $dato->id . ' - ' . $dato->fecha_registro . '<br>';
}
print_r('Numero de resultados: ' . $stm->rowCount() . '<br>');
echo '---------------------------------------------------';

$stm = $conexion->prepare(
    "SELECT * FROM prog_toma_muestra
    WHERE fecha_realizacion IS NOT NULL 
    AND DATE(fecha_registro) = DATE(NOW())"
);
$stm->execute();

$res = $stm->fetchAll(PDO::FETCH_OBJ);

echo '<br> -- Cantidad de muestras efictivas diarias -- <br>';
foreach ($res as $dato ) {
    echo $dato->id . ' - ' . $dato->fecha_registro . '<br>';
}
print_r('Numero de resultados: ' . $stm->rowCount() . '<br>');
echo '--------------------------------------------------- <br>';

$mensual = $_REQUEST['mes'];

switch ($mensual) {
    case 'Enero':
        $dia = 31;
        break;
    case 'Febrero':
        $bisiesto = $anio % 4;
        if ($bisiesto == 0) {
            $dia = 29;
        }else{
            $dia = 28;
        }
        break;
    case 'Marzo':
        $dia = 31;
        break;
    case 'Abril':
        $dia = 30;
        break;
    case 'Mayo':
        $dia = 31;
        break;
    case 'Junio':
        $dia = 30;
        break;
    case 'Julio':
        $dia = 31;
        break;
    case 'Agosto':
        $dia = 31;
        break;
    case 'Septiembre':
        $dia = 30;
        break;
    case 'Octubre':
        $dia = 31;
        break;
    case 'Noviembre':
        $dia = 30;
        break;
    case 'Diciembre':
        $dia = 31;
        break;
}

$fecha_inicial = date('Y') . '-' . $mensual . '-' . 1;
$fecha_final = date('Y') . '-' . $mensual . '-' . $dia;
$total_seg_mes = 0;

for ($i=1; $i <= 3; $i++) { 
    $stm = $conexion->prepare(
        "SELECT * FROM seguimiento_paciente
        INNER JOIN usuarios ON id_usuario = usuarios.id
        WHERE roles = $i AND DATE(fecha_hora) BETWEEN ? AND ?"
    );
    $stm->execute(array($fecha_inicial,$fecha_final));
    
    $numero_seg = $stm->rowCount();
    switch ($i) {
        case 1:
            $rol = 'Auxiliar de enfermeria';
            break;
        
        case 2:
            $rol = 'Jefe de Enfermeria';
            break;
        case 3:
            $rol = 'Medico general';
            break;
    }
   
    echo '-- Cantidad de seguimiento realizado por ' . $rol . ' -- <br>';
    echo 'Fecha inicial: ' . $fecha_inicial .'<br>';
    echo 'seguimiento realizado por ' . $rol . ': ' . $numero_seg . '<br>';
    echo 'Fecha final: ' . $fecha_final .'<br>';
    echo '------------------------------------------------------------------------------ <br>';
    $total_seg_mes += $numero_seg; 
}

$mes_pasado = date('m') - 1;
$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
require_once 'views/informes_views.php';