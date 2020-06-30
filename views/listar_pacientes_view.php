<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
        <!--******************************************************-->
        <nav class="navbar navbar-expand-lg navbar-light fondo-color img-nav">
        <a class="navbar-brand" href="#">
            <img src="img/logo_sin_fondo.png" class="img-fluid" alt="logo-caminos">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INGRESAR RESULTADOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" data-target='#exampleModal' role="button"
                        data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                        Ingresar Resultado Primera Vez
                    </a>
                    <a class="nav-link " href="#" id="navbarDropdown" data-target='#modalTomaMuestraControl'
                        role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                        Ingresar Resultado Segunda Vez (Control)
                    </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <div class="container-fluid">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                    <div class="container">
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-right">
                                    <th class="text-center th-sm"># Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Nombre paciente<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Edad<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Identificacion<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Telefono<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Fecha Del Resultado<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Resultado<i class="text-left fas fa-sort ml-1"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tbl-llamadas">
                                <?php
                                $i = 1;
                                foreach ($res as $key) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $key->Nombre_Completo ?></td>
                                        <td class="text-center"><?= $key->Edad ?></td>
                                        <td><?= $key->Identificacion ?></td>
                                        <td><?= $key->telefono ?></td>
                                        <td class="text-center"><?= $key->fecha_resultado ?></td>
                                        <td><?= $key->resultado ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center"># Registro</th>
                                    <th class="text-center">Nombre paciente</th>
                                    <th class="text-center">Edad</th>
                                    <th class="text-center">Identificacion</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Fecha Del Resultado</th>
                                    <th class="text-center">Resultado</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

</html>