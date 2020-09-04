<?php require_once 'views/header_view.php' ?>
    <div class="container-fluid">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                <h4>Trazabiliad de Pacientes</h4>
                    <div class class="col text-left">
                        <a href="index.php">
                            <button type="button" class="btn btn-outline-secondary btn-lg"> <i class="fas fa-chevron-left"></i></button>
                        </a>
                    </div>
                    <div class="container">
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-right ">
                                    <th style="background: #a9c5e7" class="text-center th-sm"># Registro</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Nombre paciente</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Edad</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Eps</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Identificacion</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Telefono</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Dirección</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Ubicacion del Paciente</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Toma de Muestra</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Programacion<i</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Fecha de Realizacion<i</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Observacion<i</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha Del Resultado</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Resultado Primera Muestra</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Programacion</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Seguimiento</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario del Medico</th>
                                    <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                        <th style="background: #a9c5e7" class="text-center th-sm">Reprogramar fecha de toma</th>
                                    <?php endif ?>
                                    <?php if($_SESSION['role'] == 'Medico'): ?>
                                        <th style="background: #a9c5e7" class="text-center th-sm">Seleccione si el paciente a muerto</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody id="tbl-llamadas">
                                <?php
                                $i = 1;
                                foreach ($res as $key) : ?>
                                    <tr>
                                        <td class="text-center th-sm"><?= $i ?></td>
                                        <td class="text-center th-sm"><?= $key->Nombre_Completo ?></td>
                                        <td class="text-center th-sm"><?= $key->Edad ?></td>
                                        <td class="text-center th-sm"><?= $key->aseguradora?></td>
                                        <td class="text-center th-sm"><?= $key->Identificacion ?></td>
                                        <td class="text-center th-sm"><?= $key->telefono ?></td>
										<td class="text-center th-sm"><?= $key->barrio?></td>
                                        <td class="text-center th-sm"><?= $key->municipio ?></td>
										<td class="text-center th-sm"><?= $key->programacion_atencion?></td>
                                        <td class="text-center th-sm"><?= $key->fecha_programacion?></td>
										<td class="text-center th-sm"><?= $key->fecha_realizacion?></td>
										<td class="text-center th-sm"><?= $key->motivo?></td>
                                        <td class="text-center th-sm"><?= $key->fecha_resultado ?></td>
                                        <td class="text-center th-sm"><?= $key->resultado ?></td>
                                        <td class="text-center"><?= $key->usuario_programacion ?></td>
                                        <td class="text-center"><?= $key->usuario_seguimiento ?></td>
                                        <td class="text-center"><?= $key->usuario_medico ?></td>
                                        <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                            <td class="text-center"><a href="#" id="<?= $key->id ?>" name="reprogramar" class="btn btn-info px-3"><i style="font-size: 30px;" class="fas fa-calendar-alt text-white"></i></a></td>
                                        <?php endif ?>
                                        <?php if($_SESSION['role'] == 'Medico'): ?>
                                            <th class="text-center"><input type="checkbox" name="inhabilitar" id="<?= $key->id ?>"></th>
                                        <?php endif ?>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th class="text-center"># Registro</th>
                                    <th class="text-center th-sm">Nombre paciente</th>
                                    <th class="text-center th-sm">Edad</th>
                                    <th class="text-center th-sm">Identificacion</th>
                                    <th class="text-center th-sm">Telefono</th>
                                    <th class="text-center th-sm">Dirrección</th>
                                    <th class="text-center th-sm">Ubicacion del Paciente</th>
                                    <th class="text-center th-sm">Toma de Muestra</th>
                                    <th class="text-center th-sm">Fecha de Programacion</th>
                                    <th class="text-center th-sm">Fecha de Realizacion</th>
                                    <th class="text-center th-sm">Observacion</th>
                                    <th class="text-center th-sm">Fecha del Resultado</th>
                                    <th class="text-center th-sm">Resultado Primera Muestra</th>
                                    <th class="text-center th-sm">Usuario de Programacion</th>
                                    <th class="text-center th-sm">Usuario de Seguimiento</th>
                                    <th class="text-center th-sm">Usuario del Medico</th>
                                    <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                        <th class="text-center">Reprogramar</th>
                                    <?php endif ?>
                                    <?php if($_SESSION['role'] == 'Medico'): ?>
                                        <th class="text-center">Inhabilitar paciente</th>
                                    <?php endif ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
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

    <!-- Modal fecha de reprogramacion -->
    <div class="modal fade" id="modalFechaReprogramacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloReprogramacion">Fecha de reprogramacion de la toma</h5>
                </div>
                <div class="modal-body">
                    <form id="form-container-3">
                        <div class="form-group">
                            <label>Fecha de reprogramacion: </label>
                            <input type="hidden" id="id_reprogramacion">
                            <input type="date" id="fecha_reprogramacion" min="<?= date('Y-m-d') ?>" class="form-control">
                            <a href="#" id="reprogramacion" class="btn btn-primary">Reprogramar</a>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/JsComplementoProg_toma_muestra.js"></script>
<script>
    $('input[name="inhabilitar"]').on('click',function (e) {
        e.preventDefault()
        let nombre = this.parentElement.parentElement.children[1].innerText
        let identificacion = this.parentElement.parentElement.children[3].innerText
        let row = this.parentElement.parentElement

        Swal.fire({
            title: `${nombre} Fecha de fallecimiento`,
            html: '<input type="date" id="fecha_fellecimiento" class="form-control">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.value) {
                let id = this.id
                let fecha_f = $('#fecha_fellecimiento').val()
                $.ajax({
                    type: "POST",
                    url: "cambioEstado.php",
                    data: {id,fecha_f},
                    success: function (response) {
                        console.log(response);
                        response = JSON.parse(response)
                        if (response == 'ok') {
                            Swal.fire(
                                'Accion completada',
                                'Datos guardados',
                                'success'
                            )
                            row.hidden = true
                        } else {
                            Swal.fire(
                                'Error!',
                                'Campo fecha de fallecimiento es obligatorio',
                                'error'
                            )
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(`Status: ${textStatus} Error: ${errorThrown}`);
                    }
                });
            }
        })
    })

    $('#reprogramacion').on('click', function (e) {
        e.preventDefault()

        let id = $('#id_reprogramacion').val()
        let fecha_r = $('#fecha_reprogramacion').val()
        $.ajax({
            type: "POST",
            url: "reprogramar.php",
            data: {id,fecha_r},
            success: function (response) {
                console.log(id + ' ' + fecha_r);
                console.log(response);
                response = JSON.parse(response)
                if (response == 'ok') {
                    Swal.fire(
                        'Accion completada',
                        'Datos guardados',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error!',
                        'Campo fecha de reprogramacion es obligatoria',
                        'error'
                    )
                }
                $('#modalFechaReprogramacion').modal('hide')
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(`Status: ${textStatus} Error: ${errorThrown}`);
            }
        });
    })

    $('a[name="reprogramar"]').on('click', function(e){
        e.preventDefault()
        let nombre = this.parentElement.parentElement.children[1].innerText
        $('#tituloReprogramacion').text(`${nombre} Fecha de reprogramacion de la toma`)
        $('#id_reprogramacion').val(this.id)
        $('#modalFechaReprogramacion').modal('show')
    })

    $('#modalFechaReprogramacion').on('hidden.bs.modal', function (e) {
        $('#fecha_reprogramacion').val('')
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
</html>