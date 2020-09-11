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
                        <input type="hidden" name="id" value="<?= $paciente->id ?>">
                        <select name="tipo_documento" class="custom-select">
                            <option value="<?= $paciente->tipo_documento ?>"><?= $paciente->tipo_documento ?></option>
                            <option value="CC">Cedula de ciudadania</option>
                            <option value="TI">Tarjeta de identidad</option>
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
                            $aseguradoras = ['Ambuq','Anaswayuu EPSI','ARS con vida','Asmet salud','Caja de prevecion','Cajacopi','Caprecom','Colsanitas','Comfamiliar','Comfenalco','Comparta','Compensar','Coomeva','Coosalud','Dadis','Emssanar','Famisanar','Ferrocariles','Inpec','Magisterio','Medimas','Mutual ser','Nueva EPS','Sabia Salud','Salud total','Sanidad militar','Sanitas','Sura'];
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
                    <?php if($_SESSION['role'] != 'Auxiliar de programacion'): ?>
                        <div class="form-group col-md-4">
                            <label for="">Estado del paciente</label>
                            <select name="estado_paciente" id="estado_paciente" class="custom-select">
                                <option value="<?= $paciente->estado_paciente ?>"><?= $paciente->estado_paciente ?></option>
                                <option value="VIVO">Vivo</option>
                                <option value="MUERTO">Muerto</option>
                            </select>
                        </div>   
                    <?php endif ?>
                </div>
                <div class="row">
                    <?php if($_SESSION['role'] != 'Auxiliar de programacion'): ?>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de fallecimiento</label>
                            <input type="date" name="fecha_fallecimiento" id="fecha_fallecimiento" value="<?= $paciente->fecha_fallecimiento ?>" class="form-control">
                        </div>                 
                    <?php endif ?>
                </div>
                <input type="submit" name="actualizar" value="Actualizar datos" class="btn btn-success">
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
<script>
    $(document).ready(function () {
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
    });
</script>