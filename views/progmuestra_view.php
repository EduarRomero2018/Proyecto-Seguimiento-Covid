<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>programacion-muestra</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
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
                <div class="comtainer" id="tbl_paciente">
                    <?php
                    if (!empty($resultado)) { ?>
                    <div class="container">
                        <div class="card card-cascade">
                            <!-- Card image -->
                            <div class="view view-cascade gradient-card-header blue-gradient">
                                <!-- Title -->
                                <h2 class="card-header-title mb-3 mt-2"><?php echo $nombre_completo; ?></h2>
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
                                <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Registro:
                                    <?php echo $fecha_registro; ?></p>
                                <hr>
                                <button style='cursor: pointer;' type="button" class="btn btn-outline-secondary btn-lg"
                                    onClick="muestra_oculta('contenido')" value="mostrar">Programar Muestra</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- ********************************************************* -->
    <div id="contenido" class="container">
        <div class="progmuestra">
            <div class="row">
                <div class="col-sm-3">
                    <form id="form-TM">
                        <label class="col-form-label">Acepta Visita ?</label>
                        <select id="acepta_visita" class="custom-select">
                            <option selected value=""> </option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                            <option value="LLAMADA NO EXITOSA">Llamada no Exitosa</option>
                            <option value="NO APLICA">No Aplica</option>
                        </select>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Fecha de Programacion</label>
                    <input type="date" id="fecha_programacion" class="form-control">
                </div>

                <div class="col-sm-3">
                    <label class="col-form-label">Fecha de Realizacion</label>
                    <input type="date" id="fecha_realizacion" class="form-control" disabled>
                </div>

                <div class="col-sm-3">
                    <label class="col-form-label">Sitio de Toma de Muestra</label>
                    <select id="programacion_atencion" class="custom-select">
                        <option selected value=""> </option>
                        <option value="CERCO">Cerco</option>
                        <option value="DOMICILIO">Domicilio</option>
                        <option value="CARCEL">Carcel</option>
                    </select>
                </div>

                <div class="col-sm-3">
                    <br>
                    <label class="col-form-label">Programa al que Pertenece</label>
                    <select id="nombre_programa" class="custom-select">
                        <option selected value=""> </option>
                        <option value="DE TODO CORAZON">De todo Corazón</option>
                        <option value="VIH">Vih</option>
                        <option value="AMARTE (ARTRITIS REUMATOIDES)">Amarte (artritis reumatoides)</option>
                        <option value="RESPIRA (EPOC)">Respira (Epoc)</option>
                        <option value="PROMOCION Y MANTENIMIENTO DE LA SALUD">Promocion y mantenimiento de la salud
                        </option>
                        <option value="MUJER SANA">Mujer Sana</option>
                        <option value="OBESIDAD">Obesidad</option>
                        <option value="GESTANTES">Gestantes</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <br>
                    <br>
                    <button id="guardar" type="submit" class="btn btn-outline-secondary btn-lg">Guardar Datos</button>
                </div>
                <div class="col-sm-3">
                    <br>
                    <input type="hidden" id="paciente_id" value="<?= $id ?>">
                    <!-- <label class="col-form-label">Observacion</label>
                    <input type="text" id="observacion" class="form-control" placeholder="Observacion"> -->
                </div>
                </form>

            </div>
        </div>
    </div>

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
    <br>
    <br>
    <br>

    <footer class="final text-center pb-3">
        <div class="container-fluid centrar">
            <!--<img src="img/vigilados-supersalud-pie.png" width="250" class="img-responsive" alt="super salud">-->
            <br> Copyright © 2020 Caminosips || Todos
            los derechos reservados.
        </div>
    </footer>
</body>
</script>

<script>
    $('#fecha_programacion').on('change', function () {
        let fecha_programacion = $('#fecha_programacion').val()
        if (fecha_programacion != '') {
            $('#fecha_realizacion').attr('disabled', false)

        }

        console.log(fecha_programacion)
    })

    $('#fecha_realizacion').on('change', function () {
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


    $('#guardar').on('click', function (e) {
        e.preventDefault()

        let paciente_id = $('#paciente_id').val()
        let acepta_visita = $('#acepta_visita').val()
        let fecha_programacion = $('#fecha_programacion').val()
        let fecha_realizacion = $('#fecha_realizacion').val()
        let programacion_atencion = $('#programacion_atencion').val()
        let nombre_programa = $('#nombre_programa').val()
        let fecha_laboratorio = $('#fecha_laboratorio').val()
        // let observacion = $('#observacion').val()

        $.ajax({
            type: 'POST',
            url: 'ingresoprog_muestra.php',
            data: {
                paciente_id,
                acepta_visita,
                fecha_programacion,
                fecha_realizacion,
                programacion_atencion,
                nombre_programa,
                fecha_laboratorio
            },
            success: function (res) {
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
                        break;
                }
            }
        })
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/validacion.js"></script>

</html>