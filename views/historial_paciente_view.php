<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Historial Paciente</title>
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
    <!--<link rel="stylesheet" href="">-->

<body>

    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>

    <!--******************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light fondo-color img-nav">
        <a class="navbar-brand" href="#">
            <img src="img/logo_sin_fondo.png" class="img-fluid" alt="logo-caminos">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--******************************************************-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--******************************************************
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">INICIO</a>
                    </li>
-->
                <!--******************************************************-->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SEGUIMIENTO
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="getform1.php" class="dropdown-item" href="#">Ingresar Pacientes</a>
                        <!--<a class="dropdown-item" href="#">Ingresar Datos Personales</a>-->
                        <a href="progmuestra.php" class="dropdown-item" href="#">Programar Primera Toma Muestra</a>
                        <!--<a class="dropdown-item" href="#">Programacion de Toma de Muestra</a>-->
                        <a href="segto_evolucion.php" class="dropdown-item" href="#">Ingresar Seguimiento Diario Por
                            Paciente</a>
                        <!--<a class="dropdown-item" href="#">Seguimiento Semanal por Paciente</a>-->
                        <a href="historial_paciente.php" class="dropdown-item">Ver Seguimiento Paciente</a>
                        <a href="toma_muestra_control.php" class="dropdown-item">Programar Segunda Toma Muestra (Control)</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INGRESAR RESULTADOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link " href="#" id="navbarDropdown" data-target='#exampleModal' role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                            Ingresar Resultado Primera Vez
                        </a>
                        <a class="nav-link " href="#" id="navbarDropdown" data-target='#modalTomaMuestraControl' role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                            Ingresar Resultado Segunda Vez (Control)
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        REPORTES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="listar_pacientes.php" class="dropdown-item" href="#">Listar Todos los Pacientes</a>
                        <!--<a class="dropdown-item" href="#">Seguimiento Semanal por Paciente</a>-->
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="soporte_resultado.php" class="nav-link">INGRESAR SOPORTE RESULTADO</a>
                </li>
            </ul>
            <a href="cerrar.php">
                <button class="btn btn-outline-info  my-2 my-sm-0" type="submit">
                    <i class="fa fa-power-off mr-2" aria-hidden="true"></i>Cerrar Sesión</button>
            </a>
        </div>
    </nav>

    <!--*********************EMPIEZA LA INFORMACION DEBAJO DE LA NAVEGACION*********************************-->

    <div class="container padre mt-5">
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
                            if (!empty($resultado)) { ?>
                                <div class="container">
                                    <div class="card card-cascade">
                                        <!-- Card image -->
                                        <div class="view view-cascade gradient-card-header blue-gradient">
                                            <!-- Title -->
                                            <h2 class="card-header-title mb-3 mt-2"><?php echo $Nombre_Completo; ?></h2>
                                        </div>
                                        <!-- Card content -->
                                        <div class="card-body card-body-cascade text-left">
                                            <p style="color:rgba(13, 70, 177, 0.972)" ; class="card-text">Numero Documento:
                                                <?php echo $numero_documento; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Tipo Documento:
                                                <?php echo $tipo_documento; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Edad:
                                                <?php echo $edad; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Registro:
                                                <?php echo $fecha_registro; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de
                                                Programacion de Toma de Muestra: <?php echo $fecha_programacion; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de
                                                Realizacion Toma de Muestra: <?php echo $fecha_realizacion; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Programa al Cual
                                                Pertenece el Paciente: <?php echo $programa_pertenece; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Entrega de
                                                laboratorio: <?php echo $fecha_entrega_lab; ?></p>
                                            <p style="color:rgba(13, 70, 177, 0.972)" ;class="card-text">Fecha de Resultado:
                                                <?php echo $fecha_resultado; ?></p>
                                            <p style="color:rgba(228, 50, 27, 0.972)" ;class="card-text">Resultado:
                                                <?php echo $resultado; ?></p>
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
            <div class="row">
                <?php $i = 1;
                foreach ($res as $key) : ?>
                    <div class="col-4">
                        <div class="card card-cascade wider">
                            <div class="view view-cascade gradient-card-header blue-gradient">
                                <h2 class="card-header-title mb-3"> </h2>
                                <h5 class='ml-4'> Seguimiento (Dia) <?= $i ?></h5>
                            </div>
                            <div class="card-body card-body-cascade text-left">
                                <!-- Text -->
                                <p class="card-text ">
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
                                </p>
                                <!-- Link -->
                                <a href="#!" class="orange-text d-flex flex-row-reverse p-2">
                                    <h5 class="waves-effect waves-light">Leer Mas<i class="fas fa-angle-double-right ml-2"></i>
                                    </h5>
                                </a>
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
    <br>

</body>
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
</script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js">
</script>

</html>