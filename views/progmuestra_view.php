<?php require_once 'views/header_view.php' ?>
    <div class="container">
        <div class="row">
            <h3 class="titulo">Programacion Primera Toma de Muestra</h3>
        </div>
    </div>
    <div class="container card mb-3 text-center hoverable">
        <div class="row">
            <div class="col-sm-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <label class="col-form-label">Digite el Documento del Paciente a consultar</label>
                    <input type="" name="documento" class="form-control" placeholder="# Documento">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <div class class="col text-center">
                                    <button type="submit" class="btn btn-outline-secondary btn-lg">Consultar</button>
                                    <a href="index.php">
                                        <button type="button" class="btn btn-outline-secondary btn-lg">Regresar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
            </div>

            <!--PINTAMOS LA TABLA DONDE MOSTRAMOS LOS DATOS QUE TRAEMOS DE LA BD-->
            <div class="col-sm-8">
                <div id="tbl_paciente">
                    <?php
                    if (!empty($resultado)) { ?>
                            <div class="card card-cascade">
                                <!-- Card image -->
                                <div class="view view-cascade gradient-card-header blue-gradient">
                                    <!-- Title -->
                                    <h2 class="card-header-title mb-3 mt-2"><?php echo $Nombre_Completo; ?></h2>
                                </div>
                                <!-- Card content -->
                                <div class="card-body card-body-cascade text-left">
                                    <p style="color:rgba(13, 70, 177, 0.972)" ; class="card-text">Tipo Documento:
                                        <?php echo $tipo_documento; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Numero Documento:
                                        <?php echo $numero_documento; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Edad:
                                        <?php echo $edad; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Tipo de Paciente:
                                        <?php echo $tipo_paciente; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Aseguradora:
                                        <?php echo $aseguradora; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha Creacion del Paciente:
                                        <?php echo  $fecha_registro ?> </>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Usuario de creacion del Paciente:
                                        <?php echo  $usuario_Creacion ?> </>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button <?= $disabled ?> style='cursor: pointer;' type="button" id="mostrar" class="btn btn-outline-secondary btn-lg" value="mostrar">Programar Primera Toma de Muestra</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- **********formulario de los 4 campos************** -->
    <div class="container">
        <div id="contenido" class="progmuestra" hidden>
            <div class="row">
                <div class="col-sm-3">
                    <form id="form-TM">
                        <label class="col-form-label">Acepta Visita ?</label>
                        <select id="acepta_visita" class="custom-select">
                            <option selected value=""> </option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                            <option value="LLAMADA NO EXITOSA">Llamada no Exitosa</option>
                            <option value="NO APLICA PARA CERCO">No aplica para (Cerco)</option>
							<option value="INTRAMURAL">Intramural</option>
                        </select>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Fecha de Programacion</label>
                    <input type="date"  min="<?= date('Y-m-d') ?>" id="fecha_programacion" class="form-control">
                </div>


                <div class="col-sm-3">
                    <label class="col-form-label">lugar de Toma de Muestra</label>
                    <select id="programacion_atencion" class="custom-select">
                        <option selected value=""> </option>
                        <option value="CERCO">Cerco</option>
                        <!--<option value="MAS 60">Mas 60</option>-->
                        <option value="HOSPITALARIO">Hospitalario</option>
                        <option value="DOMICILIO">Domicilio</option>
                        <option value="CARCEL">Carcel</option>
						<option value="INTRAMURO 1">Intramuro 1</option>
						<option value="INTRAMURO 2">Intramuro 2</option>
						 <option value="SEDE DE CAMINOS">Caminos IPS</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <!-- <br> -->
                    <label class="col-form-label">Programa al que Pertenece</label>
                    <select id="nombre_programa" class="custom-select">
                        <option selected value=""> </option>
                        <option value="NO APLICA">No Aplica</option>
                        <option value="NINGUNO">Ninguno</option>
                        <option value="DE TODO CORAZON">De todo Corazón</option>
                        <option value="VIH">Vih</option>
                        <option value="AMARTE (ARTRITIS REUMATOIDES)">Amarte (artritis reumatoides)</option>
                        <option value="RESPIRA (EPOC)">Respira (Epoc)</option>
                        <option value="PROMOCION Y MANTENIMIENTO DE LA SALUD">Promocion y mantenimiento de la salud</option>
                        <option value="MUJER SANA">Mujer Sana</option>
                        <option value="OBESIDAD">Obesidad</option>
                        <option value="GESTANTES">Gestantes</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <br>
                    <button id="guardar-p" type="submit" class="btn btn-outline-secondary btn-lg">Guardar Datos</button>
                </div>
                <div class="col-sm-3">
                    <br>
                    <input type="hidden" id="paciente_id" value="<?= $id ?>">
                </div>
                </form>

            </div>
        </div>
    </div>
    <br>
<?php require_once 'views/footer_view.php'; ?>

<?php if(!empty($disabled)): ?>
    <script>
        swal.fire(
            'Mensaje',
            'Este paciente no esta disponible',
            'warning'
        )
    </script>
<?php endif ?>

<script>
    $('#mostrar').on('click', function(e){
        e.preventDefault()
        $('#contenido').attr('hidden', false)
    })

    $('#fecha_programacion').on('change', function() {
        let fecha_programacion = $('#fecha_programacion').val()
        if (fecha_programacion != '') {
            $('#fecha_realizacion').attr('disabled', false)

        }

        console.log(fecha_programacion)
    })

    $('#fecha_realizacion').on('change', function() {
        let fecha_realizacion = $('#fecha_realizacion').val()
        let fecha_programacion = $('#fecha_programacion').val()
        if (fecha_realizacion < fecha_programacion) {
            swal({
                type: 'error',
                title: "ERROR",
                text: "La fecha de realizacion debe ser mayor o igual a la fecha de programacion",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })

            $('#guardar').attr('disabled', true)
        } else {
            $('#guardar').attr('disabled', false)
        }
    })


    $('#guardar-p').on('click', function(e) {
        e.preventDefault()

        let paciente_id = $('#paciente_id').val()
        let acepta_visita = $('#acepta_visita').val()
        let fecha_programacion = $('#fecha_programacion').val()
        let programacion_atencion = $('#programacion_atencion').val()
        let nombre_programa = $('#nombre_programa').val()

        $.ajax({
            type: 'POST',
            url: 'ingresoprog_muestra.php',
            data: {
                paciente_id,
                acepta_visita,
                fecha_programacion,
                programacion_atencion,
                nombre_programa
            },
            success: function(res) {
                console.log(res)
                let resultado = JSON.parse(res)
                switch (resultado) {
                    case 'empty':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Todos los campos son obligatorios",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        console.log('campos vacios')
                        break;
                    case 'bad':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Ha ocurrido un error al intentar guardar los datos",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 'ok':
                        swal({
                            type: 'success',
                            title: "Exito",
                            text: "Datos guardados exitosamente",
                            button: "Aceptar",
                            icon: "success",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        console.log('datos guardados')
                        $('#tablePaciente').attr('hidden', true)
                        $('#exampleModal').modal('hide')
                        $('#tbl_paciente').attr('hidden', true)
                        $('#contenido').attr('hidden', true)
                        $('#form-body').attr('hidden', true)
                        break;
                    default:
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Ha ocurrido un error",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        console.log('Ya esta programado para la toma');

                        break;
                }
            }
        })
    })

    $('#buscarPaciente').on('click', function() {
        $('#error').attr('hidden', true)
    })

    $('#visita_exitosa').on('change', function() {
        console.log(this.value);
        if (this.value == 'NO') {
            $('div[name="ocultar"]').attr('hidden', true)
            $('#div-motivo').attr('hidden', false)
        } else {
            $('div[name="ocultar"]').attr('hidden', false)
            $('#div-motivo').attr('hidden', true)
        }
    })

    
</script>
<?php if (!empty($exito)) : ?>
        <script>
            swal({
                type: 'succes',
                title: "Exito",
                text: "<?php echo $exito; ?>",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        </script>
    <?php endif; ?>

    <?php if (!empty($errores)) : ?>
        <script>
            swal({
                type: 'error',
                title: "ERROR",
                text: "<?php echo $errores; ?>",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        </script>
    <?php endif; ?>
</html>