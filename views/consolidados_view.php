<?php
if(!isset($_REQUEST['Exportar']))
{
    require_once 'views/header_view.php'; 
}
?>
<div class="container mt-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <?php if(!isset($_REQUEST['Exportar'])): ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Fecha realizacion</label>
                        <input type="date" name="fecha_realizacion" value="<?= $date ?>" class="form-control" required>
                        <label for="">Municipio</label>
                        <select name="municipio" class="custom-select" required>
                            <option value="<?= $municipio ?>"><?= $municipio ?></option>
                            <?php
                            $municipios = ['Cartagena (13001)', 'Turbana (13838)', 'Turbaco (13836)', 'Arjona (13052)', 'Carmen de bolivar (13244)', 'Barranquilla (080001)', 'Galapa (08296)','Malambo (08433)', 'Puerto Colombia (08573)','Soledad (08758)'];
                            foreach ($municipios as $municipio) : ?>
                                <option value="<?= strtoupper($municipio) ?>"><?= ucwords($municipio) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Buscar" class="btn btn-success">
                        <input type="submit" name="Exportar" value="Exportar" class="btn btn-primary">
                    </div>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center"># REGISTRO</th>
                    <th class="text-center">Fecha Muestra</th>
                    <th class="text-center">Codigo Municipio Remitente</th>
                    <th class="text-center">Nombre Municipio Remite</th>
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">Numero De Documento</th>
                    <th class="text-center">Evento</th>
                    <th class="text-center">Nombre IPS</th>
                    <th class="text-center">Codigo IPS</th>
                    <th class="text-center">Subcodigo IPS</th>
                    <th class="text-center">Primer Nombre</th>
                    <th class="text-center">Segundo Nombre</th>
                    <th class="text-center">Primer Apellido</th>
                    <th class="text-center">Segundo Apellido</th>
                    <th class="text-center">Fecha De Nacimiento</th>
                    <th class="text-center">Edad</th>
                    <th class="text-center">Sexo</th>
                    <th class="text-center">Condicion Final</th>
                    <th class="text-center">Nombre EPS</th>
                    <th class="text-center">Regimen</th>
                    <th class="text-center">Pais De Nacimiento</th>
                    <th class="text-center">Pais De Residencia</th>
                    <th class="text-center">Codigo Departamento De Residencia</th>
                    <th class="text-center">Departamento Residencia</th>
                    <th class="text-center">Codigo Municipio de Residencia</th>
                    <th class="text-center">Municipio Residencia</th>
                    <th class="text-center">Direccion</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Laboratorio Al Que Envia</th>
                    <th class="text-center">Trabajador De La Salud</th>
                    <th class="text-center">Contacto Con Caso Confirmado</th>
                    <th class="text-center">Tipo De Muestra</th>
                    <th class="text-center">Ubicacion Del Paciente</th>
                    <th class="text-center">Observaciones</th>   
                </tr>
            </thead>
            <tbody id="tbl-llamadas">
                <?php $i = 1; foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center"><?= $paciente->fecha_realizacion ?></td>
                        <td class="text-center">13001</td>
                        <td class="text-center">CARTAGENA</td>
                        <td class="text-center"><?= $paciente->tipo_documento ?></td>
                        <td class="text-center"><?= $paciente->numero_documento ?></td>
                        <td class="text-center">346</td>
                        <td class="text-center">CAMINOS IPS</td>
                        <td class="text-center">1300103098</td>
                        <td class="text-center">1</td>
                        <td class="text-center"><?= $paciente->primer_nombre ?></td>
                        <td class="text-center"><?= $paciente->segundo_nombre ?></td>
                        <td class="text-center"><?= $paciente->primer_apellido ?></td>
                        <td class="text-center"><?= $paciente->segundo_apellido ?></td>
                        <td class="text-center"><?= $paciente->fecha_nacimiento ?></td>
                        <td class="text-center"><?= $paciente->edad . ' ' . 'AÑOS'?></td>
                        <td class="text-center"><?= $paciente->sexo ?></td>
                        <td class="text-center">VIVO</td>
                        <td class="text-center"><?= $paciente->aseguradora ?></td>
                        <td class="text-center"><?= $paciente->regimen ?></td>
                        <td class="text-center">COLOMBIA</td>
                        <td class="text-center">COLOMBIA</td>
                        <td class="text-center">13</td>
                        <td class="text-center">BOLIVAR</td>
                        <td class="text-center"><?php print_r(explode(' ',$paciente->municipio)[1]) ?></td>
                        <td class="text-center"><?php print_r(explode(' ',$paciente->municipio)[0])?></td>
                        <td class="text-center"><?= $paciente->barrio ?></td>
                        <td class="text-center"><?= $paciente->telefono ?></td>
                        <td class="text-center"><?= $paciente->laboratorio ?></td>
                        <td class="text-center"><?= $paciente->trabajador_salud ?></td>
                        <td class="text-center"><?= $paciente->contacto_caso_confirmado ?></td>
                        <td class="text-center">HISOPADO NASO/OROFARINGEO</td>
                        <td class="text-center"><?= $paciente->programacion_atencion ?></td>
                        <td class="text-center"><?= $paciente->observacion_paciente ?></td>
                    </tr>
                <?php $i++; endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center"># REGISTRO</th>
                    <th class="text-center">Fecha Muestra</th>
                    <th class="text-center">Codigo Municipio Remitente</th>
                    <th class="text-center">Nombre Municipio Remite</th>
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">Numero De Documento</th>
                    <th class="text-center">Evento</th>
                    <th class="text-center">Nombre IPS</th>
                    <th class="text-center">Codigo IPS</th>
                    <th class="text-center">Subcodigo IPS</th>
                    <th class="text-center">Primer Nombre</th>
                    <th class="text-center">Segundo Nombre</th>
                    <th class="text-center">Primer Apellido</th>
                    <th class="text-center">Segundo Apellido</th>
                    <th class="text-center">Fecha De Nacimiento</th>
                    <th class="text-center">Edad</th>
                    <th class="text-center">Sexo</th>
                    <th class="text-center">Condicion Final</th>
                    <th class="text-center">Nombre EPS</th>
                    <th class="text-center">Regimen</th>
                    <th class="text-center">Pais De Nacimiento</th>
                    <th class="text-center">Pais De Residencia</th>
                    <th class="text-center">Codigo Departamento De Residencia</th>
                    <th class="text-center">Departamento Residencia</th>
                    <th class="text-center">Codigo Municipio de Residencia</th>
                    <th class="text-center">Municipio Residencia</th>
                    <th class="text-center">Direccion</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Laboratorio Al Que Envia</th>
                    <th class="text-center">Trabajador De La Salud</th>
                    <th class="text-center">Contacto Con Caso Confirmado</th>
                    <th class="text-center">Tipo De Muestra</th>
                    <th class="text-center">Ubicacion Del Paciente</th>
                    <th class="text-center">Observaciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php if(!isset($_REQUEST['Exportar']))
{
    require_once 'views/footer_view.php'; 
} 
?>