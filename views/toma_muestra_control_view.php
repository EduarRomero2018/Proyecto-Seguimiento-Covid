<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>toma muestra control</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    </script>

</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <div class="container">
        <div class="row">
            <h3 class="titulo">Programacion Segunda Toma de Muestra</h3>
        </div>
    </div>
    <div class="container card mb-3 text-center hoverable">
        <div class="row">
            <div class="col-sm-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <label class="col-form-label">Digite el Documento del Paciente a consultar</label>
                        <input type="" name="documento" class="form-control" placeholder="# Documento">
                        <br>
                        <div class class="col text-center">
                            <button type="submit" class="btn btn-outline-secondary btn-lg">Consultar</button>
                            <a href="index.php">
                                <button type="button" class="btn btn-outline-secondary btn-lg">Regresar</button>
                            </a>
                        </div>
                    </form>
            </div>


            <div class="col-sm-8">
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
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Dirección de Residencia:
                                        <?php echo $Direccion_Residencia; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Telefono de Contacto:
                                        <?php echo $telefono; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">EPS a la que Pertenece:
                                        <?php echo $aseguradora; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Creacion del Paciente:
                                        <?php echo $fecha_creacion_paciente; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha Primera Toma de Muestra:
                                        <?php echo $fecha_primera_toma_muestra; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Resultado de la Primera Toma:
                                        <?php echo $resultado_toma; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">El Paciente fue Notificado?:
                                        <?php echo $notificado; ?></p>
                                </div>
                            </div>
                        <?php } ?>
            </div>

            </form>
        </div>
    </div>
    <?php if (!empty($resultado)) : ?>

        <div id="contenido" class="container">
            <div class="progmuestra">
                <div class="row">
                    <div class="col-sm-3">
                        <form id="form-TM">
                            <label class="col-form-label">Visita Domiciliaria</label>
                            <select id="visita_domiciliaria" class="custom-select">
                                <option selected value=""> </option>
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                                <option value="LLAMADA NO Exitosa">llamada no Exitosa</option>
                                <option value="NO APLICA">No Aplica</option>
                            </select>
                    </div>

                    <div class="col-sm-3">
                        <label class="col-form-label">Estado Del Paciente</label>
                        <select id="estado_paciente" class="custom-select">
                            <option selected value=""> </option>
                            <option value="VIVO">Vivo</option>
                            <!-- <option value="MUERTO">Muerto</option> -->
                        </select>
                    </div>

                    <div class="col-sm-3" id="programacion" hidden>
                        <label class="col-form-label">Fecha de Programacion</label>
                        <input type="date" id="fecha_programacion" min="<?= date('Y-m-d') ?>" class="form-control">
                    </div>

                    <!-- <div class="col-sm-3" name="fallecimiento" hidden>
                        <label class="col-form-label">Fecha de Fallecimiento</label>
                        <input type="date" id="fecha_fallecimiento" class="form-control">
                    </div>
                    <div class="col-sm-3" name="fallecimiento" hidden>
                        <label class="col-form-label">Lugar de Fallecimiento</label>
                        <input type="text" id="lugar_fallecimiento" class="form-control">
                    </div> -->
                    <div class="col-sm-3">
                        <br>
                        <input type="hidden" id="paciente_id" value="<?= $id ?>">
                        <input type="hidden" id="usuario_id" value="<?= $_SESSION['id'] ?>">
                        <!-- <label class="col-form-label">Observacion</label>
                            <input type="text" id="observacion" class="form-control" placeholder="Observacion"> -->
                    </div>
                </div>

                <div class="col-sm-3">
                    <br>
                    <button id="guardar" type="submit" class="btn btn-outline-secondary btn-lg">Guardar
                        Datos</button>
                </div>
                </form>

            </div>
        </div>
    <?php endif ?>
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

    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </script>
    <script>
        $('#guardar').on('click', function(e) {
            e.preventDefault()

            let visita_domiciliaria = $('#visita_domiciliaria').val()
            let estado_paciente = $('#estado_paciente').val()
            let fecha_programacion = $('#fecha_programacion').val()
            let fecha_fallecimiento = $('#fecha_fallecimiento').val()
            let lugar_fallecimiento = $('#lugar_fallecimiento').val()
            let paciente_id = $('#paciente_id').val()
            let usuario_id = $('#usuario_id').val()

            if (estado_paciente == 'VIVO') {
                fecha_fallecimiento = ''
                lugar_fallecimiento = 'Null'
            } else {
                fecha_programacion = ''
            }

            let datos = {
                visita_domiciliaria,
                estado_paciente,
                fecha_programacion,
                fecha_fallecimiento,
                lugar_fallecimiento,
                paciente_id,
                usuario_id
            }

            let i = 1
            for (const key in datos) {
                if (datos.hasOwnProperty(key)) {
                    const element = datos[key];
                    
                    console.log(element);
                    if (element == '') {
                        i ++
                    }
                }
            }

            if (i > 2) {
                swal({
                    type: 'error',
                    title: "Error",
                    text: "Todos los campos son obligatorios",
                    button: "Aceptar",
                    icon: "error",
                    button: "Aceptar",
                    animation: false,
                    customClass: 'animated heartBeat'
                })
            }else{

                $.ajax({
                    type: 'post',
                    url: 'segundaTomaMuestra.php',
                    data: datos,
                    success: function(res) {
                        console.log(res)
                        let resultado = JSON.parse(res)
                        console.log(resultado)
                        switch (resultado) {
                            case 1:
                                swal({
                                    type: 'error',
                                    title: "Error",
                                    text: "Este paciente no cuenta con seguimiento por favor verfique",
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
                                    text: "Datos guardados correctamente",
                                    button: "Aceptar",
                                    icon: "success",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#contenido').attr('hidden', true)
                                break;

                            case 'bad':
                                swal({
                                    type: 'error',
                                    title: "Error",
                                    text: "Ha ocurrido un error al intentar guardar los datos",
                                    button: "Aceptar",
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
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#estado_paciente').on('change', function() {

                if (this.value != '') {
                    if (this.value == 'MUERTO') {
                        $('div[name=fallecimiento]').attr('hidden', false)
                        $('#programacion').attr('hidden', true)
                        $('#error').attr('hidden', true)
                    } else {
                        $('div[name=fallecimiento]').attr('hidden', true)
                        $('#programacion').attr('hidden', false)
                        $('#error').attr('hidden', true)
                    }
                } else {
                    $('#error').attr('hidden', false)
                    $('div[name=fallecimiento]').attr('hidden', true)
                    $('#programacion').attr('hidden', true)
                }
            })
        })
    </script>
</body>

</html>