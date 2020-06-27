<?php

$url = $_REQUEST['url'];
$documento = $_REQUEST['documento'];
$nombre = $_REQUEST['nombre'];

print_r($_REQUEST);

$url = $_REQUEST['url'];
$archivo = 'soporte_de_resultados-' . $nombre . '_' . $documento;
echo($archivo);

header('Content-disposition: attachment; filename=' . $archivo);
header("Content-type: application/pdf");
readfile($url);