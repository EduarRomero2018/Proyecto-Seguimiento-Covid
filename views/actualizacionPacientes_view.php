<?php require_once 'views/header_view.php' ?>
<div class="d-flex justify-content-center mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="titulo mt-0">Buscar datos de paciente</h3>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="">Ingresar numero de cedula</label>
                    <input type="text" name="Bcedula" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="buscar" value="buscar" class="btn btn-outline-secondary btn-lg">Consultar</button>
                    <a href="index.php">
                        <button type="button" class="btn btn-outline-secondary btn-lg">Regresar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if(!empty($paciente)): ?>
<div class="container-fluid mb-4 mt-4">
    <div class="card">
        <div class="card-body">
            <?= !empty($error) ? $error : '' ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h2 class="titulo mt-0">Actualizar datos de paciente</h2>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Tipo de documento</label>
                        <input type="hidden" name="id" value="<?= $paciente->id_pacientes ?>">
                        <select name="tipo_documento" class="custom-select">
                            <option value="<?= $paciente->tipo_documento ?>"><?= $paciente->tipo_documento ?></option>
                            <option value="CC">CEDULA DE CIUDADANIA</option>
                            <option value="TI">TARJETA DE INDENTIDAD</option>
                            <option value="RC">REGISTRO CIVIL</option>
                            <option value="CE">CEDULA EXTRANJERA</option>
		                    <option value="PE">PERMISO ESPECIAL</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Numero de documento</label>
                        <input type="text" name="cedula" value="<?= $paciente->numero_documento ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Primer nombre</label>
                        <input type="text" name="primer_nombre" value="<?= $paciente->primer_nombre ?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Segundo nombre</label>
                        <input type="text" name="segundo_nombre" value="<?= $paciente->segundo_nombre ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Primer apellido</label>
                        <input type="text" name="primer_apellido" value="<?= $paciente->primer_apellido ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Segundo nombre</label>
                        <input type="text" name="segundo_apellido" value="<?= $paciente->segundo_apellido ?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Tipo de paciente</label>
                        <select name="tipo_paciente" class="custom-select">
                            <option value="<?= $paciente->tipo_paciente ?>"><?= $paciente->tipo_paciente ?></option>
                            <option value="CASO INDICE">CASO INDICE</option>
                            <option value="CONTACTO ESTRECHO">CONTACTO ESTRECHO</option>
                            <option value="COMORBILIDAD">COMORBILIDAD</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Edad</label>
                        <input type="text" name="edad" value="<?= $paciente->edad ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Unidad de medida</label>
                        <select name="unidad_medida" class="custom-select" required>
                            <option value="<?= $paciente->unidad_medida ?>"><?= $paciente->unidad_medida ?></option>
                            <option value="AÑOS">AÑOS</option>
                            <option value="MESES">MESES</option>
                            <option value="DIAS">DIAS</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Sexo</label>
                        <select name="sexo" class="custom-select">
                            <option value="<?= $paciente->sexo ?>"><?= $paciente->sexo ?></option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Barrio</label>
                        <input type="text" name="barrio" value="<?= $paciente->barrio ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Municipio</label>
                        <select name="municipio" class="custom-select">
                            <option value="<?= $paciente->municipio ?>"><?= $paciente->municipio ?></option>
                            <?php
                            $municipios = ['Cartagena (13001)', 'Turbana (13838)', 'Turbaco (13836)', 'Arjona (13052)', 'Carmen de bolivar (13244)', 'Barranquilla (080001)', 'Galapa (08296)','Malambo (08433)', 'Puerto Colombia (08573)','Soledad (08758)'];
                            foreach ($municipios as $municipio) : ?>
                                <option value="<?= strtoupper($municipio) ?>"><?= ucwords($municipio) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Correo electronico</label>
                        <input type="email" name="correo" value="<?= $paciente->correo ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Telefono</label>
                        <input type="text" name="telefono" value="<?= $paciente->telefono ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Telefono 2 (Opcional)</label>
                        <input type="text" name="telefono2" value="<?= $paciente->telefono2 ?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Aseguradora</label>
                        <select name="aseguradora" class="custom-select">
                            <option value="<?= $paciente->aseguradora ?>"><?= $paciente->aseguradora ?></option>
                            <?php
                                $aseguradoras = ['Ambuq','Anaswayuu EPSI','ARS con vida','Asmet salud','Caja de prevecion','Cajacopi','Caprecom','Colsanitas','Comfamiliar','Comfenalco','Comparta','Compensar','Coomeva','Coosalud','Dadis','Ecopetrol','Emssanar','Famisanar','Ferrocariles','Inpec','Magisterio','Medimas','Mutual ser','Nueva EPS','Policia nacional','Salud publica','Sabia Salud','Salud total','Sanidad militar','Sanitas','Sura'];
                            foreach($aseguradoras as $aseguradora => $valor): ?>
                                    <option value="<?= strtoupper($valor) ?>"><?= $valor ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Regimen</label>
                        <select name="regimen" class="custom-select" required>
                            <option value="<?= $paciente->regimen ?>"><?= $paciente->regimen ?></option>
                            <option value="SUBSIDIADO">Subsidiado</option>
                            <option value="CONTRIBUTIVO">Contributivo</option>
                            <option value="REGIMEN ESPECIAL">Regimen Especial</option>
                            <option value="SIN AFILIACION">Sin Afilicion</option>
                        </select>
                    </div>
                    <?php if($_SESSION['role'] == 'Coordinador covid'): ?>
                        <div class="form-group col-md-4">
                            <label for="">Medico de seguimiento</label>
                            <select name="id_usuario_seguimiento" class="custom-select">
                                <option value="<?= $paciente->id_usuario_seguimiento ?>"><?= empty($paciente->nombre_apellido) ? 'No asignado' : $paciente->nombre_apellido . " ($paciente->sede)"?></option>
                                <?php foreach($usuarios as $usuario): ?>
                                    <option value="<?= $usuario->id ?>"><?= $usuario->nombre_apellido ?> (<?= $usuario->sede ?>)</option>
                                <?php endforeach ?>
                                <option value="">Ninguno</option>
                            </select>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" name="actualizar-paciente" value="Actualizar datos" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <?= !empty($error) ? $error : '' ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h2 class="titulo mt-0">Actualizar datos de paciente (Programacion de toma de muestra)</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha de programacion</label>
                            <input type="hidden" name="id" value="<?= $programacion->id ?>">
                            <input type="date" value="<?= $programacion->fecha_programacion ?>" name="fecha_programacion" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha de realizacion</label>
                            <input type="date" value="<?= $programacion->fecha_realizacion ?>" id="fecha_realizacion" name="fecha_realizacion" class="form-control">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="fecha_realizacion_chck" name="!fecha_realizacion">
                                <label class="custom-control-label" for="fecha_realizacion_chck">Quitar fecha de realizacion</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Tipo de prueba aplicada al paciente</label>
                            <input type="hidden" name="id" value="<?= $programacion->id ?>">
                            <select name="tipo_prueba" class="custom-select">
                                <option selected value="<?= $programacion->tipo_prueba ?>"><?= $programacion->tipo_prueba ?></option>
                                <option value="PRC">PCR</option>
                                <option value="IGG Y IGM">IGG y IGM</option>
                                <option value="ANTIGENO">Antigeno</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" name="actualizar-programacion" value="Actualizar datos" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif ?>

<?php require_once 'views/footer_view.php' ?>
<?php if(isset($success) && $success != ''): ?>
    <script>
        Swal.fire(
            'Tarea completada',
            'Datos actualizados con exito',
            'success'
        )
    </script>
<?php endif ?>
<?php if(empty($DatosPaciente) && isset($_REQUEST['buscar'])): ?>
    <script>
        Swal.fire(
            'Advertencia',
            'Paciente no encontrado',
            'warning'
        )
    </script>
<?php endif ?>

<script>
    $(document).ready(function () {

        const fecha_realizacion_original = $('#fecha_realizacion').val()

        $('#estado_paciente').on('change', function(){
            if(this.value == 'MUERTO')
            {
                $('#fecha_fallecimiento').attr('required', true)
            }
            else
            {
                $('#fecha_fallecimiento').val('')
                $('#fecha_fallecimiento').attr('disabled', true)
            }
        })

        $('#fecha_realizacion_chck').on('click', function(){
            if(this.checked == true)
            {
                $('#fecha_realizacion').text('')
                $('#fecha_realizacion').val('')
            }
            else
            {
                $('#fecha_realizacion').val(fecha_realizacion_original)
            }
        })
    });
</script>