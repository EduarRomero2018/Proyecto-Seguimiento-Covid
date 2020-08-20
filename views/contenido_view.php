<?php require_once 'views/header_view.php' ?>
    <!--*********************EMPIEZA LA INFORMACION DEBAJO DE LA NAVEGACION*********************************-->
    <div class="container padre">
        <!--News card-->
        <div class="card mb-3 text-center hoverable">
            <div class="card-body">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-4 ">
                        <!--Featured image-->
                        <div class="documento">
                        </div>
                        <!-- <h4 style="color:#c18718">Bienvenido:</h4> -->
                        <h4 style="color:#c18718"><?php echo ucwords($_SESSION['nombre_apellido']) ?></h4>
                        <h5 style="color:#c18718"><?php echo ucwords($_SESSION['role']) ?></h5>
                        <img class="img-thumbnail" src="img/user.png" class="img-fluid z-depth-2-half " alt="imagen de user" data-holder-rendered="true">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="col-md-7 text-center hoverable">
                        <h4 class="mb-1">
                            <strong>Cantidad de Pacientes Positivos:</strong>
                        </h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-1x fa-user-plus">
                                <a href="cantidad_p_p.php">
                                    <!-- style="text-decoration: none; color: rgba(6, 62, 131, 0.9);" -->
                                    <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para saber cual son los pacientes positivos"><?= $positivos ?></p>
                                </a>
                            </i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Card -->
    <div class="container padre">
        <div class="row">
            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid') : ?>
                <div style="height: 100%;" class="col-sm-4 text-center ">
                    <div class="card weather-card">
                        <div class="card-body pb-3  text-center hoverable">
                            <h4 class="mb-1">
                                <strong>Pacientes que estan Pendientes Por Resultados:</strong>
                                <hr>
                            </h4>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-4x fa-syringe">
                                    <a href="ppr.php">
                                        <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para ver los pacientes que estan pendientes por resultados"><?php echo $numero_conteo ?></p>
                                    </a>
                                </i>
                                <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Auxiliar de programacion' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador') : ?>
                <div class="col-sm-4">
                    <!-- Card -->
                    <div class="card weather-card">
                        <div class="card-body pb-3  text-center hoverable">
                            <!-- Title -->
                            <h4 class="card-title font-weight-bold">Pacientes que aun no se le ha programado la Toma de Muestra</h4>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-4x fa-stethoscope">
                                    <a href="pptm.php">
                                        <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para ver estos pacientes "><?php echo $Cantidad_Pacientes ?></p>
                                    </a>
                                </i>
                                <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Auxiliar de programacion' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador') : ?>
                <div style="height: 100%;" class="col-sm-4 text-center ">
                    <div class="card weather-card">
                        <div class="card-body pb-3  text-center hoverable">
                            <h4 class="mb-1">
                                <strong>Cantidad de Pacientes pendientes por toma de muestra:</strong>
                                <hr>
                            </h4>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-4x fa-user-md">
                                    <a href="cpp.php">
                                        <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para saber cuales son los pacientes pendientes por toma de muestra"><?php echo $Cantidad_p_p_pendiente_por_toma ?></p>
                                    </a>
                                </i>
                                <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <!--************SEGUNDA FILA*************-->
            <div class="container padre">
                <br>
                <div class="row">
                    <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Auxiliar de seguimiento') : ?>
                        <div class="col-sm-4">
                            <div class="card weather-card">
                                <div class="card-body pb-3  text-center hoverable">
                                    <h4 class="card-title font-weight-bold">Cantidad de Pacientes Asintomaticos:</h4>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-4x fa-file-medical-alt">
                                            <a href="cpa.php">
                                                <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para ver los pacientes Asintomaticos"><?= $asintomaticos ?></p>
                                            </a>
                                        </i>
                                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- Card -->
                            <div class="card weather-card">
                                <div class="card-body pb-3  text-center hoverable">
                                    <!-- Title -->
                                    <h4 class="card-title font-weight-bold">Cantidad de Pacientes Sintomaticos:</h4>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-4x fa-file-medical-alt">
                                            <a href="cps.php">
                                                <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para ver los pacientes Sintomaticos"><?= $sintomaticos ?></p>
                                            </a>
                                        </i>
                                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- Card -->
                            <div class="card weather-card">
                                <div class="card-body pb-3  text-center hoverable">
                                    <!-- Title -->
                                    <h4 class="card-title font-weight-bold">Cantidad de kit Entregados a pacientes:</h4>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-4x fa-medkit">
                                            <a href="ckep.php">
                                                <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para ver los pacientes a los cuales se le han entregado kit"><?= $cantidad_kits ?></p>
                                            </a>
                                        </i>
                                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <!--************TERCERA FILA*************-->
            <div class="container padre">
                <br>
                <div class="row">
                    <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Medico') : ?>
                        <div class="col-sm-4">
                            <!-- Card -->
                            <div class="card weather-card">
                                <div class="card-body pb-3  text-center hoverable">
                                    <!-- Title -->
                                    <h4 class="card-title font-weight-bold">Cantidad de Pacientes Fallecidos:</h4>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-4x fa-book-dead">
                                            <!-- <i class="fas fa-book-dead"></i> -->

                                            <p class="display-1 degree"><?php echo $pacientes_fallecidos ?></p>
                                        </i>
                                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Auxiliar de seguimiento') : ?>
                        <div class="col-sm-4">
                            <!-- Card -->
                            <div class="card weather-card">
                                <div class="card-body pb-3  text-center hoverable">
                                    <!-- Title -->
                                    <h4 class="card-title font-weight-bold">Cantidad de Pacientes Negativos:</h4>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-4x fa-user-minus">
                                            <a href="cpn.php">
                                                <!-- style="text-decoration: none; color: rgba(6, 62, 131, 0.9);" -->
                                                <p class="display-1 degree" data-toggle="tooltip" data-placement="bottom" title="Presione para saber cual son los pacientes negativos"><?= $negativos ?></p>
                                            </a>
                                        </i>
                                        </i>
                                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>

            </div>
        </div>
        <br>
    </div>
<?php require_once 'views/footer_view.php' ?>