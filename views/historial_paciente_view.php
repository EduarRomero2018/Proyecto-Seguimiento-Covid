<?php require_once 'views/header_view.php' ?>
    <div class="container padre mt-4">
        <div class="card mb-3 text-center hoverable">
            <h4 class="mb-1">
                <strong>Historial de Seguimiento del Paciente</strong>
                <hr>
                </h4>
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="comtainer">
                        <?php
                            if (!empty($resultado)){?>
                        <div class="container">
                            <div class="card card-cascade">
                                <!-- Card image -->
                                <div class="view view-cascade gradient-card-header blue-gradient">
                                    <!-- Title -->
                                    <h2 class="card-header-title mb-3 mt-2"><?php echo $Nombre_Completo;?></h2>
                                </div>
                                <!-- Card content -->
                                <div class="card-body card-body-cascade text-left">
                                    <p style="color:rgba(13, 70, 177, 0.972)" ; class="card-text">Numero Documento:
                                        <?php echo $numero_documento;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Tipo Documento:
                                        <?php echo $tipo_documento;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Edad:
                                        <?php echo $edad;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Registro:
                                        <?php echo $fecha_registro;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de
                                        Programacion de Toma de Muestra: <?php echo $fecha_programacion;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de
                                        Realizacion Toma de Muestra: <?php echo $fecha_realizacion;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Programa al Cual
                                        Pertenece el Paciente: <?php echo $programa_pertenece;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Entrega de
                                        laboratorio: <?php echo $fecha_entrega_lab;?></p>
                                    <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Resultado:
                                        <?php echo $fecha_resultado;?></p>
                                    <?php if($resultado == 'Negativo'): ?>
                                        <div class="text-center text-light bg-success py-1">
                                            <h5>Resultado:
                                            <?php echo $resultado;?></h5>
                                        </div>
                                    <?php endif ?>
                                    <?php if($resultado == 'Positivo'): ?>
                                        <div class="text-center text-light bg-danger py-1">
                                            <h5>Resultado:
                                            <?php echo $resultado;?></h5>
                                        </div>
                                    <?php endif ?>
                                    <?php if($resultado == 'Pendiente'): ?>
                                        <div class="text-center text-light bg-warning py-1">
                                            <h5>Resultado:
                                            <?php echo $resultado;?></h5>
                                        </div>
                                    <?php endif ?>
                                    <hr>
                                </div>
                            </div>
                            <?php } ?>
                            <a href="historial_paciente_fecha.php?nd=<?= $numero_documento ?>" class="btn btn-outline-secondary">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($res)) : ?>
    <div class="container">
        <div class="row">
            <?php $i = 1;
            foreach ($res as $key) : ?>
            <div class="col-4">
                <div class="card card-cascade wider">
                    <div class="view view-cascade gradient-card-header blue-gradient">
                        <h2 class="card-header-title mb-3"> </h2>
                            <h5 class='ml-4'> Seguimiento <?= $i ?></h5>
                    </div>
                    <div class="card-body card-body-cascade text-left">
                        <!-- Text -->
                        <p class="card-text ">
                            <strong style="color:rgba(30, 80, 143)">Usuario seguimiento:
                            </strong><?= $key->nombre_apellido ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Fecha de Seguimiento:
                            </strong><?= $key->fecha_hora ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Asintomatico:
                            </strong><?= $key->asintomatico ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Fiebre cuantificada mayor a 38°C:
                            </strong><?= $key->fiebre_cuantificada ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Tos: </strong><?= $key->tos ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Dificultad respiratoria:
                            </strong><?= $key->dificultad_respiratoria ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Odinofagia: </strong><?= $key->odinofagia ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Fatiga / Adinamia:
                            </strong><?= $key->fatiga_adinamia ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Cumple los criterios de aislamiento
                                domiciliarios: </strong><?= $key->cumple_criterios ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Paciente presenta comorbilidad:
                            </strong><?= $key->comorbilidad ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Fecha de entrega de kits:
                            </strong><?= $key->fecha_entrega_kits ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Paciente con terapia de oxigeno:
                            </strong><?= $key->oxigeno_terapia ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Paciente recuperado?
                            </strong><?= $key->paciente_recuperado ?>
                            <br>
                            <strong style="color:rgba(30, 80, 143)">Novedad del paciente
                            </strong><?= $key->novedad_paciente ?>
                        </p>
                    </div>
                </div>
                <br>
            </div>
            <?php $i++;
                    endforeach ?>
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
<?php require_once 'views/footer_view.php' ?>