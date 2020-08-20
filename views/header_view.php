<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/stylos_formulario.css">
    <link href="../css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <!--******************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light fondo-color img-nav">
        <a class="navbar-brand" href="#">
            <img src="../img/logo_sin_fondo.png" class="img-fluid" alt="logo-caminos">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--******************************************************-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROCESOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (isset($_SESSION) && $_SESSION['role'] == 'Auxiliar de programacion' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador') : ?>
                            <a href="getform1.php" class="dropdown-item" href="#">Ingresar Pacientes</a>
                            <!--<a class="dropdown-item" href="#">Ingresar Datos Personales</a>-->
                            <a href="progmuestra.php" class="dropdown-item" href="#">Programar Primera Toma Muestra</a>
                        <?php endif ?>
                        <?php if (isset($_SESSION) && $_SESSION['role'] == 'Auxiliar de seguimiento' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Medico') : ?>
                            <!--<a class="dropdown-item" href="#">Programacion de Toma de Muestra</a>-->
                            <a href="segto_evolucion.php" class="dropdown-item" href="#">Ingresar Seguimiento Diario Por
                                Paciente</a>
                            <!--<a class="dropdown-item" href="#">Seguimiento Semanal por Paciente</a>-->
                            <a href="historial_paciente_fecha.php" class="dropdown-item">Ver Seguimiento Paciente</a>
                            <!-- <a href="toma_muestra_control.php" class="dropdown-item">Programar Segunda Toma Muestra (Control)</a> -->
                        <?php endif ?>
                        <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Medico') : ?>
                            <a href="soporte_resultado.php" class="dropdown-item">Ingresar y Listar Soporte Resultado</a>
                        <?php endif ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Auxiliar de programacion') : ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            INGRESAR FECHA DE REALIZACION Y RESULTADOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Auxiliar de programacion' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador') : ?>
                                <a class="nav-link " href="#" id="navbarDropdown" data-target='#modalFechaRealizacion' role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                    Ingresar Fecha de Realizacion de la primera toma de muestra
                                </a>
                            <?php endif ?>
                            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador' || $_SESSION['role'] == 'Coordinador covid' || $_SESSION['role'] == 'Digitador') : ?>
                                <a class="nav-link " href="#" id="navbarDropdown" data-target='#exampleModal' role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                    Ingresar Resultado Primera Vez
                                </a>
                            <?php endif ?>
                            <!-- <a class="nav-link " href="#" id="navbarDropdown" data-target='#modalTomaMuestraControl' role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                Ingresar Resultado Segunda Vez (Control)
                            </a> -->
                        </div>
                    <?php endif ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        REPORTES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="listar_pacientes.php" class="dropdown-item" href="#">Listar Todos los Pacientes</a>
                        <a href="listar_pacientes_fecha_realizacion_pendiente.php" class="dropdown-item">Listar pacientes pendientes por fecha de realizacion de la toma de muestra</a>
                    </div>
                </li>
            </ul>
            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Coordinador covid') : ?>
                <a href="asignacion_pacientes.php">
                    <button class="btn btn-outline-info  my-2 my-sm-0" type="submit">
                        <i class=" fas fa-file-upload" style="font-size: 20px;"></i></button>
                </a>
            <?php endif ?>
            <a href="cerrar.php">
                <button class="btn btn-outline-info  my-2 my-sm-0" type="submit">
                    <i class="fa fa-power-off mr-2" aria-hidden="true"></i>Cerrar Sesión</button>
            </a>
        </div>
    </nav>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <script src="js/JsComplementoProg_toma_muestra.js"></script>
    <script src="js/jsContenido.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js">
</script>