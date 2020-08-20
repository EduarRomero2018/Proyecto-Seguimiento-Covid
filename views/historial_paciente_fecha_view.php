<?php require_once 'views/header_view.php' ?>
    <div class="container padre mt-4">
        <div class="card mb-3 text-center hoverable">
            <h4 class="mb-1">
                <strong>Historial de Seguimiento del Paciente</strong>
                <hr>
                </h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
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
                                        <?php if($resultadoP == 'Negativo'): ?>
                                            <div class="text-center text-light bg-success py-1">
                                                <h5>Resultado:
                                                <?php echo $resultadoP;?></h5>
                                            </div>
                                        <?php endif ?>
                                        <?php if($resultadoP == 'Positivo'): ?>
                                            <div class="text-center text-light bg-danger py-1">
                                                <h5>Resultado:
                                                <?php echo $resultadoP;?></h5>
                                            </div>
                                        <?php endif ?>
                                        <?php if($resultadoP == 'Pendiente'): ?>
                                            <div class="text-center text-light bg-warning py-1">
                                                <h5>Resultado:
                                                <?php echo $resultadoP;?></h5>
                                            </div>
                                        <?php endif ?>
                                        <hr>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($res)) : ?>
    <div class="container">
    
        <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr class="text-right ">
                        <th style="background: #a9c5e7" class="text-center th-sm">Dia de seguimiento<i class="text-left fas fa-sort ml-1"></i></th>
                        <th style="background: #a9c5e7" class="text-center th-sm">Nombre paciente<i class="text-left fas fa-sort ml-1"></i></th>
                        <th style="background: #a9c5e7" class="text-center th-sm">Fecha del seguimiento<i class="text-left fas fa-sort ml-1"></i></th>
                    </tr>
                </thead>
                <tbody id="tbl-llamadas">
                <?php
                $i = 1;
                foreach ($res as $key) : ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center"><?= $Nombre_Completo ?></td>
                        <td class="text-center"><a href="historial_paciente.php?fs=<?= $key->fecha_hora ?>&nd=<?= $numero_documento ?>" data-toggle="tooltip" data-html="true" title="<em>Haga click Aqui para ver las llamadas realizadas al paciente en esta fecha</em>"><?= $key->fecha_hora ?></a></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Dia de seguimiento</th>
                        <th class="text-center">Nombre paciente</th>
                        <th class="text-center">Fecha del seguimiento</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    
    </div>

    <?php endif ?>

<?php require_once 'views/footer_view.php' ?>
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