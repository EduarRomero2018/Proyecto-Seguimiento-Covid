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
                            <option value="SEDE DE CAMINOS">Sede Caminos IPS</option>
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
                        <option value="MAS 60">Mas 60</option>
                        <option value="HOSPITALARIO">Hospitalario</option>
                        <option value="DOMICILIO">Domicilio</option>
                        <option value="CARCEL">Carcel</option>
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
    <br>
    <br>
    <!--******************MODALS************************-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Resultado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-container">
                        <div class="form-group">
                            <label>Buscar Paciente</label>
                            <input class="form-control" type="search" id="documento">
                            <input type="hidden" id="paciente_id">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Consultar" id="buscarPaciente">
                        <div class="mt-2">
                            <table hidden id="tablePaciente" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">N° Identificacion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                        <div hidden id="form-body">
                            <div class="mt-2">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de Entrega al laboratorio toma de
                                        muestra</label>
                                    <input type="date" id="fecha_entrega_laboratorio" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Fecha de procesamiento de la toma</label>
                                    <input type="date" id="fecha_procesamiento" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de Resultados</label>
                                    <input type="date" id="fecha_resultado" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Resultado</label>
                                <select id="resultado" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="1">Positivo</option>
                                    <option value="2">Negativo</option>
                                </select>
                            </div>
                            <button id="guardar" type="button" class="btn btn-primary">Guardar datos</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal segunda toma de muestra -->
    <div class="modal fade" id="modalTomaMuestraControl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resultado toma de muestras control</h5>
                </div>
                <div class="modal-body">
                    <form id="form-container-2">
                        <div class="form-group">
                            <label>Buscar Paciente</label>
                            <input class="form-control" type="search" id="documento-2">
                            <input type="hidden" id="paciente_id_2">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Consultar" id="buscar">
                        <div class="mt-2">
                            <table hidden id="tablePaciente2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">N° Identificacion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-2"></tbody>
                            </table>
                        </div>
                        <div hidden id="form-body-2">
                            <div class="mt-2">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de programacion</label>
                                    <input disabled type="date" id="fecha_programacion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de realizacion de la toma</label>
                                    <input type="date" id="fecha_toma" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Resultado</label>
                                <select id="resultadoControl" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>
                            <button id="guardarResultado" type="button" class="btn btn-primary">Guardar datos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal fecha de realizacion -->
    <div class="modal fade" id="modalFechaRealizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fecha de realizacion de la toma</h5>
                </div>
                <div class="modal-body">
                    <form id="form-container-3">
                        <div class="form-group">
                            <label>Buscar Paciente</label>
                            <input class="form-control" type="search" id="documento-3">
                            <input type="hidden" id="paciente_id_3">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Consultar" id="buscar3">
                        <div class="mt-2">
                            <table hidden id="tablePaciente3" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">N° Identificacion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-3"></tbody>
                            </table>
                        </div>
                        <div style="display: none;" id="form-body-3">
                            <div class="mt-2">
                                <div class="form-group">
                                    <label for="">Fecha de programacion</label>
                                    <input disabled type="date" id="f_programacion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de Realizacion</label>
                                    <input type="date" id="fecha_realizacion" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Visita Exitosa</label>
                                <select id="visita_exitosa" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="SI">Si</option>
                                    <option value="NO">No</option>
                                </select>
                            </div>
                            <div class="form-group" name="ocultar">
                                <label class="col-form-label">Tipo de prueba aplicada al paciente</label>
                                <select id="tipo_prueba" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="PRC">PCR</option>
                                    <!-- <option value="IGG">IGG</option> -->
                                    <option value="IGG Y IGM">IGG y IGM</option>
                                    <option value="ANTIGENO">Antigeno</option>
                                    <!-- <option value="IGM">IGM</option> -->
                                </select>
                            </div>
                            <div class="form-group" name="ocultar">
                                <label class="col-form-label">Observacion</label>
                                <input type="text" id="observacion" class="form-control" placeholder="Observacion">
                            </div>
                            <div class="form-group" id="div-motivo" hidden>
                                <label class="col-form-label">Motivo</label>
                                <input type="text" id="motivo" class="form-control" placeholder="Motivo">
                            </div>
                            <button id="guardar-complemento" type="button" class="btn btn-primary">Guardar datos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="js/jquery.js"></script>
<script src="js/JsComplementoProg_toma_muestra.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/validacion.js"></script>

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
                            text: "El paciente ya está agendado para la toma de muestra.. Favor Verifique",
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

    $('#fecha_entrega_laboratorio').on('change', function() {
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        if (fecha_entrega_laboratorio != '') {
            $('#fecha_procesamiento').attr('disabled', false)
            $('#fecha_procesamiento').attr('min', fecha_entrega_laboratorio)
        }
    })

    $('#fecha_procesamiento').on('change', function() {
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        let fecha_procesamiento = $('#fecha_procesamiento').val()
        $('#fecha_resultado').attr('min', fecha_procesamiento)
        if (fecha_procesamiento < fecha_entrega_laboratorio) {
            swal({
                type: 'error',
                title: "ERROR",
                text: "La fecha de procesamiento no puede ser menor a la fecha de entrega de laboratorio",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })
            $('#guardar').attr('disabled', true)
        } else {
            $('#fecha_resultado').attr('disabled', false)
            $('#guardar').attr('disabled', false)
        }
    })

    $('#fecha_resultado').on('change', function() {
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        let fecha_procesamiento = $('#fecha_procesamiento').val()
        let fecha_resultado = $('#fecha_resultado').val()
        if (fecha_resultado < fecha_entrega_laboratorio || fecha_resultado < fecha_procesamiento) {
            swal({
                type: 'error',
                title: "ERROR",
                text: "La fecha de resultado no puede ser menor a la fecha de entrega de laboratorio y a la fecha de procesamiento de la toma",
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
    $('#guardar').on('click', function(e) {
        e.preventDefault()
        let id = $('#paciente_id').val()
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        let fecha_procesamiento = $('#fecha_procesamiento').val()
        let fecha_resultado = $('#fecha_resultado').val()
        let resultado2 = $('#resultado').val()
        let notificado = ''
        if ($('#defaultUnchecked').is(':checked') == true) {
            notificado = 'SI'

        }

        $.ajax({
            type: 'POST',
            url: 'resultadoTomaDeMuestra.php?paciente_id=' + id +
                '&fecha_entrega_laboratorio=' + fecha_entrega_laboratorio + '&fecha_procesamiento=' + fecha_procesamiento +
                '&fecha_resultado=' + fecha_resultado + '&resultado=' + resultado2,
            success: function(res) {

                let resultado1 = JSON.parse(res)
                switch (resultado1) {
                    case 'empty':
                        console.log(resultado1)
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
                    default:
                        let t = ''
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
                        $('#tablePaciente').attr('hidden', true)
                        $('#exampleModal').modal('hide')
                        $('#form-container')[0].reset()
                        $('#form-body').attr('hidden', true)
                        break;
                }
            }
        })
    })

    $('#buscarPaciente').on('click', function(e) {
        e.preventDefault()
        let identificacion = $('#documento').val()
        $('#guardar').attr('disabled', true)

        $.ajax({
            type: 'post',
            url: 'buscarPaciente.php?buscar=' + identificacion,
            success: function(res) {
                console.log(res);
                let resultado = JSON.parse(res)
                let plantilla = ''
                let id = ''
                let numero_telefono = 0
                switch (resultado) {

                    case "empty":
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Debe ingresar un numero de documento para realizar la busqueda",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form').attr('hidden', true)
                        $('#tablePaciente').attr('hidden', true)
                        break;

                    case 1:
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "El paciente ya tiene Resultados, Por favor Verifique",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form').attr('hidden', true)
                        $('#tablePaciente').attr('hidden', true)
                        break;

                    case 'null':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Este Paciente aun no cuenta con una realizacion de toma de muestra, favor verifique",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 10000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form').attr('hidden', true)
                        $('#tablePaciente').attr('hidden', true)
                        break;

                    case 'err':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Paciente no Encontrado... Verifique si Existe",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form-body').attr('hidden', true)
                        $('#tablePaciente').attr('hidden', true)
                        break;

                    default:
                        resultado.forEach(element => {
                            id = element.id
                            numero_telefono = element.telefono
                            plantilla += `
                                <tr>
                                    <td>${element.primer_nombre}</td>
                                    <td>${element.numero_documento}</td>
                                </tr>
                            `
                        })
                        $('#paciente_id').attr('value', id)
                        $('#form-body').attr('hidden', false)
                        $('#tablePaciente').attr('hidden', false)
                        $('#tbody').html(plantilla)
                        break;
                }
            }
        })
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