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
                        <div class="form-group">
                            <label for="">Seleccionar toma de muestra</label>
                            <select id="tabla-resultado" class="custom-select">
                                <option value="prog_toma_muestra">Primera toma de muestra</option>
                                <option value="segunda_toma_muestra_control_2">Segunda toma de muestra</option>
                            </select>
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
                                    <label class="col-form-label">Fecha de Entrega al laboratorio toma de muestra</label>
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
                        <div class="form-group">
                            <label for="">Seleccionar toma de muestra</label>
                            <select id="tabla-fr" class="custom-select">
                                <option value="prog_toma_muestra">Primera toma de muestra</option>
                                <option value="segunda_toma_muestra_control_2">Segunda toma de muestra</option>
                            </select>
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
                                <label class="col-form-label">Visita Exitosa</label>
                                <select id="visita_exitosa" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="SI">Si</option>
                                    <option value="NO">No</option>
                                </select>
                            </div>
                            </div>
                                <div class="form-group" name="ocultar">
                                    <label class="col-form-label">Fecha de Realizacion</label>
                                    <input type="date" id="fecha_realizacion" class="form-control">
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
<footer class="final text-center">
    <div class="container-fluid centrar">
        <img src="img/vigilados-supersalud-pie.png" width="250" class="img-responsive" alt="super salud">
        <br>
        Copyright © 2020 Caminosips || Todos los derechos reservados.
    </div>
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
<!-- <script src="js/funciones.js"></script> -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/JsComplementoProg_toma_muestra.js"></script>
<script src="js/addons/datatables.min.js"></script>
<script src="js/JsSeguimiento.js"></script>
<script src="js/jsContenido.js"></script>
<script src="js/validacion.js"></script>
<script src="js/tables.js"></script>

<!-- alertas al guardar pacientes ********************+ -->
<?php if (!empty($exito)) : ?>
    <script>
      swal({
        type: 'success',
        title: "Datos Guardados Exitosamente",
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
  <!-- final alertas al guardar pacientes********************+ -->
<script>
    $(document).ready(function () {

        if($('body').height() > $(window).height()){
            $("footer").removeClass("fixed-bottom")
            $("footer").addClass('footer')
        }else{
            $("footer").addClass("fixed-bottom")
            $("footer").removeClass('footer')
        }
    })

    // Tooltips Initialization
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
        $(document).ready(function() {
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
                let tabla = $('#tabla-resultado').val()
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
                    data: {tabla},
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
                let tabla = $('#tabla-resultado').val()
                $('#guardar').attr('disabled', true)

                $.ajax({
                    type: 'post',
                    url: 'buscarPaciente.php?buscar=' + identificacion,
                    data: {tabla},
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
        })
    </script>
    <script>
    $(document).ready(function () {

        $('#fecha_realizacion-asignacion').on('change', function(){
            $('#municipio').attr('disabled', false)
        })

        $('#municipio').on('change',function(){
            $('#asignacion').attr('disabled', false)
        })
        function table(proceso){
            let municipio = $('#municipio').val()
            let fecha_realizacion = $('#fecha_realizacion-asignacion').val()

            $.ajax({
                type: "GET",
                url: "lista_pacientes_mutual.php",
                data: {municipio, fecha_realizacion, proceso},
                success: function (response) {
                    let res = JSON.parse(response)
                    console.log(res);
                    switch (res[0]) {
                        case 'ok':
                                let headerTable =
                                `
                                    <h4>Pacientes pendientes por asignar por fecha seleccionada</h4>
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="text-right">
                                                <th style="background: #ffc974" class="text-center th-sm "># Registro</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Nombre del paciente</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Tipo Documento</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Identificacion</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Fecha de Programacion<i</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Fecha de Realizacion<i</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Eps<i</th>
                                                <th style="background: #ffc974" class="text-center th-sm">Municipio<i</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl-llamadas">
                                `
                                let bodyTable = ``
                                let footerTable =
                                `
                                        </tbody>
                                    </table>
                                `
                                let i = 1
                                res[1].forEach(paciente => {

                                    bodyTable +=
                                    `
                                        <tr>
                                            <td class="text-center">${i}</td>
                                            <td class="text-center">${paciente.Nombre_Completo}</td>
                                            <td class="text-center">${paciente.tipo_documento}</td>
                                            <td class="text-center">${paciente.numero_documento}</td>
                                            <td class="text-center">${paciente.fecha_programacion}</td>
                                            <td class="text-center">${paciente.fecha_realizacion}</td>
                                            <td class="text-center">${paciente.aseguradora}</td>
                                            <td class="text-center">${paciente.municipio}</td>
                                        </tr>
                                    `
                                    i++
                                })

                                let plantilla = headerTable + bodyTable + footerTable

                                $('#tableMutual').html(plantilla);
                            break;

                        default:
                                Swal.fire(
                                    'Mensaje',
                                    `No se encontraron pacientes pendientes por asignar de MUTUAL SER en la fecha ${fecha_realizacion}`
                                )
                                $('#tableMutual').html('');
                            break;
                    }
                }
            });
        }

        $('#asignacion').on('change', function(){
            if(this.value != ''){
                let asignacion = this.value
                let fecha_realizacion = $('#fecha_realizacion-asignacion').val()
                let municipio = $('#municipio').val()

                $('#cantidad_pacientes').val('')

                $.ajax({
                    type: "post",
                    url: "asignacion_pacientes.php",
                    data: {asignacion,fecha_realizacion,municipio},
                    success: function (response) {
                        console.log(response);
                        let result = JSON.parse(response)
                        switch (result[0]) {
                            case 'ok':
                                table(asignacion)
                                let plantilla = `<option value="">Seleccione una opcion</option>`
                                result[2].forEach(usuarios => {
                                    plantilla += `
                                        <option value="${usuarios.id}">${usuarios.nombre_apellido} (${usuarios.sede})</option>
                                    `
                                })

                                $('#id_usuario').html(plantilla)

                                result[1].forEach(pacientes => {
                                   $('#cantidad_pacientes').attr('max',pacientes.cantidad_pacientes)
                                   $('#cantidad_pacientes_text').text(`Cantidad de pacientes sin asignar: ${pacientes.cantidad_pacientes}`)
                                });

                                $('div[name="hidden"]').attr('hidden', false)
                            break;

                            case '!found':
                                $('div[name="hidden"]').attr('hidden', true)
                                Swal.fire(
                                    'Mensaje!',
                                    `No se encontraron pacientes disponibles para el proceso seleccionado`,
                                    'info'
                                )
                            break;

                            case '!found_usuarios':
                                $('div[name="hidden"]').attr('hidden', true)
                                Swal.fire(
                                    'Mensaje!',
                                    `No se encontraron usuarios con el rol seleccionado (${asignacion})`,
                                    'info'
                                )
                            break;
                        }
                    }
                });
            }else{
                Swal.fire(
                    'Error!',
                    'Campo proceso de asignacion es obligatorio',
                    'warning'
                )

                $('div[name="hidden"]').attr('hidden', true)
            }
        })

        $('#asignar').on('click', function(e){
            e.preventDefault()

            let id_usuario = $('#id_usuario').val()
            let cantidad_pacientes = $('#cantidad_pacientes').val()
            let proceso = $('#asignacion').val()
            let fecha_realizacion = $('#fecha_realizacion-asignacion').val()
            let municipio = $('#municipio').val()

            if (id_usuario != '' && cantidad_pacientes != '' && municipio != '') {
                $.ajax({
                    type: "post",
                    url: "asignacion_pacientes.php",
                    data: {id_usuario,cantidad_pacientes,fecha_realizacion,proceso,municipio},
                    success: function (response) {
                        console.log(this.data);
                        console.log(response)
                        let result = JSON.parse(response)

                        switch (result[0]) {
                            case 'ok':
                                let cantidad_pacientes = result[1]
                                Swal.fire(
                                    'Tarea realizada!',
                                    'Pacientes asignados exitosamente',
                                    'success'
                                )

                                $('#cantidad_pacientes').attr('max',cantidad_pacientes)
                                $('#cantidad_pacientes').val('')
                                $('#cantidad_pacientes_text').text(`Cantidad de pacientes sin asignar: ${cantidad_pacientes}`)
                            break;

                            default:
                                break;
                        }
                    }
                });
            }else{
                Swal.fire(
                    'Error!',
                    'Campo todos los campos son obligatorio',
                    'warning'
                )
            }
        })
    });
</script>
<script>
    $('#llamada').on('change', function () {
        if (this.value == 'Si') {
            $('div[name="hidden"]').attr('hidden', false)
            $('a[name="hidden"]').attr('hidden', false)
        } else {
            $('div[name="hidden"]').attr('hidden', true)
            $('a[name="hidden"]').attr('hidden', false)
        }

        if(this.value == ''){
            $('a[name="hidden"]').attr('hidden', true)

        }
    })

    $('a[name="notificar"]').on('click', function (e) {
        let identificacion = this.parentElement.parentElement.children[4].innerText
        let nombre =  this.parentElement.parentElement.children[1].innerText
        let telefono =  this.parentElement.parentElement.children[5].innerText
        let telefono2 =  this.parentElement.parentElement.children[6].innerText
        let id = this.id

        if(telefono2 == ''){
            $('#div-telefono2').attr('hidden', true)
        }else{
            $('#div-telefono2').attr('hidden', false)
        }

        if(this.href == "http://proyecto-seguimiento-covid.test/stm"){
            $('#stm').val('stm')
        }else{
            $('#stm').val()
        }

        $('#nombre').text(nombre)
        $('#paciente_id').val(id)
        $('#telefono1-l').text(telefono)
        $('#telefono2-l').text(telefono2)
        $('#text-modal').text(`Notificar al paciente ${nombre} - ${identificacion} de sus reslutados`)
    })

    $('#notificar').on('click', (e) => {
        e.preventDefault()

        let id_usuario = $('#id_usuario').val()
        let paciente_id = $('#paciente_id').val()
        let rol_usuario = $('#role')[0].innerHTML
        let nombre_paciente = $('#nombre')[0].innerText
        let telefono_paciente = ''
        let telefono2_paciente = ''
        let motivo = $('#motivo').val()
        let llamada = $('#llamada').val()
        let stm = $('#stm').val()

        for (let index = 1; index <= 2; index++) {
            const element = `#telefono${index}`;

            if ($(element).is(':checked') == true) {
                if(element == '#telefono1'){
                    telefono_paciente = $('#telefono1-l')[0].innerText
                }else{
                    telefono2_paciente = $('#telefono2-l')[0].innerText
                }
            }
        }

        $.ajax({
            type: "POST",
            url: "notificar_paciente.php",
            data: {
                stm,
                llamada,
                paciente_id,
                id_usuario,
                rol_usuario,
                nombre_paciente,
                telefono_paciente,
                telefono2_paciente,
                motivo
            },
            success: function (response) {
                console.log(response);
                let res = JSON.parse(response)

                switch (res) {
                    case 'ok':
                        Swal.fire(
                            'Tarea realizada con exito!',
                            'datos guardados',
                            'success'
                        )
                        $('#modal-notificacion').modal('hide')
                        $('#form-notificacion')[0].reset()
                        break;

                    default:
                        Swal.fire(
                            'Error!',
                            'Ha ocurrido un error al momento de realizar la tarea',
                            'error'
                        )
                        break;
                }
            }
        });
    })
</script>
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

    $('a[name="reprogramar"]').on('click', function(){
        let nombre = this.parentElement.parentElement.children[1].innerText

        Swal.fire({
            title: `${nombre} Fecha de reprogramacion`,
            html: '<input type="date" id="fecha_programacion" min="<?= date('Y-m-d') ?>" class="form-control">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.value) {
                let id = this.id
                let fecha_r = $('#fecha_programacion').val()
                $.ajax({
                    type: "POST",
                    url: "reprogramar.php",
                    data: {id,fecha_r},
                    success: function (response) {
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
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(`Status: ${textStatus} Error: ${errorThrown}`);
                    }
                });
            }
        })
    })
</script>
<script>
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
        let programacion_2 = $('#programacion_2').val()

        $.ajax({
            type: 'POST',
            url: 'ingresoprog_muestra.php',
            data: {
                paciente_id,
                acepta_visita,
                fecha_programacion,
                programacion_atencion,
                programacion_2,
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
</script>
<script>
    $(document).ready(function() {
        console.log('JQ')
        document.getElementsByName('descargar').forEach(Element => {
            Element.addEventListener('click', function(e) {
                e.preventDefault()

                console.log(this)
                let nombre = $('#nombre')[0].innerHTML
                let documento = $('#documento')[0].innerHTML
                let url = this.id

                let datos = {
                    nombre,
                    url,
                    documento
                }

                $.ajax({
                    type: 'post',
                    url: 'descargar_soporte.php',
                    data: datos,
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(res) {
                        console.log(res)
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(res);
                        link.download =
                            `soporte-resultado-paciente-${nombre}_${documento}.pdf`;
                        link.click();
                    }
                })

                console.log(datos)
            })
        })
    })

    $('#llamada').on('change', function () {
        if (this.value == 'Si') {
            $('div[name="hidden"]').attr('hidden', false)
            $('a[name="hidden"]').attr('hidden', false)
        } else {
            $('div[name="hidden"]').attr('hidden', true)
            $('a[name="hidden"]').attr('hidden', false)
        }

        if(this.value == ''){
            $('a[name="hidden"]').attr('hidden', true)

        }
    })

    $('a[name="notificar"]').on('click', function (e) {
        let identificacion = this.parentElement.parentElement.children[1].innerText
        let nombre = $('#nombre')[0].innerHTML

        $('#text-modal').text(`Notificar al paciente ${nombre} - ${identificacion} de sus reslutados`)
    })
</script>
<script>
    $('select[name="sintomas"]').on('change',function(){
        let sintomas = 0
        for (const iterator of $('select[name="sintomas"]')) {
            if(iterator.value == 'Si'){
                sintomas += 1
            }

            if(sintomas != 0){
                $('#fecha_sintomas').attr('hidden', false)
            }else{
                $('#fecha_sintomas').attr('hidden', true)
            }
        }
        // alert('prueba');
    })
</script>
</body>

</html>
<!-- Bootstrap core JavaScript -->