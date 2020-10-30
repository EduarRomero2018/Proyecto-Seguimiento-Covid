<?php require_once 'views/header_view.php'; ?>
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
                            <option value="INTRAMURO 1">Intramuro 1</option>
                            <option value="INTRAMURO 2">Intramuro 2</option>
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
                        <button id="guardar-p" <?= $disabled ?> type="submit" class="btn btn-outline-secondary btn-lg">Guardar Datos</button>
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <input type="hidden" id="paciente_id" value="<?= $id ?>">
                        <input type="hidden" id="programacion_2" value="2">
                    </div>
                    </form>

                </div>

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

<?php if (!empty($disabled)) : ?>
        <script>
            swal({
                type: 'warning',
                title: "Advertencia",
                text: "Esta paciente no esta disponible para programar segunda toma",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        </script>
    <?php endif; ?>