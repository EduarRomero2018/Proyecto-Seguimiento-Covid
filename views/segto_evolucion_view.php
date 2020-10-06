<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Seguimiento</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </script>
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/JsSeguimiento.js"></script>
</head>
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <div class="container">
        <div class="row">
            <h3 class="titulo">Ingresar Datos de Seguimiento a Paciente</h3>
        </div>
    </div>
    <div class="container card mb-3 text-center hoverable">

        <div class="row">
            <div class="col-sm-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <label class="col-form-label">Digite el Documento del Paciente</label>
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
                </form>
            </div>
            <!--PINTAMOS LA TABLA DONDE MOSTRAMOS LOS DATOS QUE TRAEMOS DE LA BD-->
            <div class="col-sm-8">
                <div class="comtainer" id="tbl_paciente">
                    <?php
                    if (!empty($res)) { ?>
                        <div class="container" id="tbl_paciente">
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
                                        <?php echo $identificacion; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Edad:
                                        <?php echo $edad; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de programacion:
                                        <?php echo $fecha_programacion; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de entrega de la muestra al laboratorio:
                                        <?php echo $fecha_entrega_laboratorio; ?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha del resultado:
                                        <?php echo $fecha_resultado; ?></p>
                                    <?php if ($resultado == 'negativo') : ?>
                                        <div class="text-center text-light bg-success py-1">
                                            <h5>Resultado:
                                                <?php echo $resultado; ?></h5>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($resultado == 'Positivo') : ?>
                                        <div class="text-center text-light bg-danger py-1">
                                            <h5>Resultado:
                                                <?php echo $resultado; ?></h5>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($resultado == 'Pendiente') : ?>
                                        <div class="text-center text-light bg-warning py-1">
                                            <h5>Resultado:
                                                <?php echo $resultado; ?></h5>
                                        </div>
                                    <?php endif ?>

                                    <hr>
                                    <button style='cursor: pointer;' id="continuar" type="button" class="btn btn-outline-secondary btn-lg" value="mostrar" <?= !empty($result_actual) ? 'disabled' : '' ?> >Ingresar Seguimiento</button>
                                </div>
                            </div>

                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="tbl_paciente">
        <?php
        if (!empty($res)) : ?>
            <!-- ********************************************************* -->

            <div hidden id="form-seguimiento" class="container mb-4">
                <div class="contenedor_padre">
                    <form class="card">
                        <div class="card-body">
                            <div class="row align-items-end">
                                <?php if(isset($result['fecha_atencion_medica_domiciliaria']) && $result['fecha_atencion_medica_domiciliaria'] == null): ?>
                                    <div class="col-sm-3">
                                        <label class="col-form-label">Fecha de atencion domiciliaria</label>
                                        <input type="date" id="fecha_atencion_medica_domiciliaria" min="<?= $fecha_programacion ?>" max="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                <?php endif ?>
                                <div class="col-md-4 form-group">
                                    <input type="hidden" id="tipo_toma" value="<?= $tipo_toma ?>">
                                    <label>Fatiga/adinamia</label>
                                    <select class="custom-select" name="sintomas" id="fatiga_adinamia">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Fiebre cuantificada mayor a 38°C</label>
                                    <select class="custom-select" name="sintomas" id="fiebre_cuantificada">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>El paciente presenta tos</label>
                                    <select class="custom-select" name="sintomas" id="tos">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Dificultad respiratoria</label>
                                    <select class="custom-select" name="sintomas" id="dificultad_respiratoria">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Odinofagia</label>
                                    <select class="custom-select" name="sintomas" id="odinofagia">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="hidden" id="complemento_seg_id">
                                    <input type="hidden" id="paciente_id" value="<?= $id ?>">
                                    <input type="hidden" id="id_usuario" value="<?= $_SESSION['id'] ?>">
                                    <label>Paciente Asintomatico</label>
                                    <input type="text" class="form-control" readonly id="asintomatico">
                                </div>

                                <div hidden class="col-md-4 form-group" id="fecha_sintomas">
                                    <label>Fecha de Sintomas</label>
                                    <input type="date" class="form-control" id="f_sintomas">
                                </div>

                            </div>
                            <?php if (!isset($hidden)) : ?>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Comorbilidad</label>
                                        <select class="custom-select" id="comorbilidad">
                                            <option value=""></option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Entrega de Kits</label>
                                    <select type="text" class="custom-select" id="entrega_kits">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group" id="div-fecha_entrega_kits">
                                    <label>Fecha de entrega de kits</label>
                                    <input type="date" class="form-control" min="<?= $fecha_programacion ?>" id="fecha_entrega_kits">
                                </div>
                                <div class="col-md-4 form-group">
                                    <br>
                                    <label>Terapia de oxigeno</label>
                                    <select class="custom-select" id="oxigeno_terapia">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div id="div-tipo_flujo" class="col-md-4 form-group" hidden>
                                    <br>
                                    <label>Sistema de oxigeno terapias</label>
                                    <select class="custom-select" id="tipo_flujo">
                                        <option value=""></option>
                                        <option value="1">Alto flujo</option>
                                        <option value="2">Bajo flujo</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Cumple con los criterios de aislamiento en domicilio</label>
                                    <select class="custom-select" id="cumple_criterio">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <br>
                                    <label>Ambito de atencion</label>
                                    <select class="custom-select" id="ambito_atencion">
                                        <option value=""></option>
                                        <option value="HOTEL">Hotel</option>
                                        <option value="DOMICILIO">Domicilio</option>
                                        <option value="CASA COVID">Casa Covid</option>
                                        <option value="HOSPITAL">Hospital</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <br>
                                    <label class="col-form-label">Saturacion de oxigeno</label>
                                    <input type="number" min="0" id="saturacion_oxigeno" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <br>
                                    <label class="col-form-label">Novedad del paciente</label>
                                    <textarea type="text" id="novedad_paciente" class="form-control" placeholder="Si el paciente tiene alguna novedad escribala aqui"></textarea>
                                </div>
                                <div class="col-md-4 form-group">
                                    <br>
                                    <label class="col-form-label">Paciente recuperado</label>
                                    <select id="paciente_recuperado" class="custom-select">
                                        <option value="">Seleccione una opcion</option>
                                        <?php if (isset($_SESSION) && $_SESSION['role'] == 'Medico' || $_SESSION['role'] == 'Coordinador covid') : ?>
                                            <option value="1">Si</option>
                                        <?php endif ?>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <a id="guardarSeguimiento" href="" class="btn btn-primary">Guardar Datos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div hidden id="contenido" class="container mb-4">
                <div class="contenedor_padre">
                    <form class="card">
                        <div class="card-body">
                            <div class="row align-items-end">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Atencion domiciliaria en 24 Horas</label>
                                    <select id="atencion_medica_domiciliaria" class="custom-select">
                                        <option value=""></option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label class="col-form-label">Antecedentes de Viaje</label>
                                    <select id="antecedentes_viaje" class="custom-select">
                                        <option selected value=""> </option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label class="col-form-label">Realizacion de hemograma y LDH</label>
                                    <input type="text" id="realizacion_hemograma" class="form-control">
                                </div>

                                <div class="col-sm-3">
                                    <div id="viaje">
                                        <label class="col-form-label">Paises o ciudades visitadas</label>
                                        <input type="text" id="paises_ciudades" class="form-control" placeholder="Escriba el Pais o la Ciudad">
                                    </div>
                                </div>

                                <div class="" hidden>
                                    <input type="text" id="id_usuario" class="form-control" value="<?= $_SESSION['id'] ?>">
                                    <input type="hidden" id="paciente_id" value="<?= $id ?>">
                                </div>

                                <div class="col-sm-3">
                                    <button id="guardar" type="submit" class="btn btn-outline-secondary">Guardar Datos</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container-fluid">
                <div class="fondo_formulario">
                </div>
            </div>
        <?php endif; ?>
        </form>
    </div>
    </div>

    <?php if (!empty($disabled) && !empty($msj)) : ?>
        <script>
            swal({
                type: 'warning',
                title: "Advertencia",
                text: "<?= $msj ?>",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 15000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        </script>
    <?php endif ?>

    <?php if (!empty($result_actual)) : ?>
        <script>
            swal.fire(
                "Mensaje",
                "Este paciente ya esta recuperado",
                "info"
            )
        </script>
    <?php endif ?>

    <?php if (!empty($disabled) && empty($msj)) : ?>
        <script>
            swal({
                type: 'error',
                title: "Paciente Aun no Cuenta con Resultados",
                text: "Ingrese el Resultado de la prueba del paciente antes de hacer un seguimiento",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 15000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        </script>
    <?php endif; ?>

    <?php if (!empty($exito)) : ?>
        <script>
            swal({
                type: 'success',
                title: "Paciente Encontrado",
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>


</html>