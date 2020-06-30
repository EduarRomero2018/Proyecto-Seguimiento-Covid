<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Resultado</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/stylos_formulario.css">
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <!--******************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light fondo-color img-nav">
        <a class="navbar-brand" href="/">
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
                <button style="font-size: 15px;" class="btn btn-outline-info  my-2 my-sm-0" type="submit">
                    <i class="fa fa-sign-out-alt mr-2" aria-hidden="true"></i>Cerrar Sesión</button>
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label>Ingres el Documento de Paciente</label>
                            <input class="form-control" type="text" name="documento">
                        </div>
                        <div class="form-group">
                            <label>Seleccionar PDF</label>
                            <input type="file" accept="" name="soporte">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="btn btn-success btn-block" type="submit" name="listar" value="listar">
                            </div>
                            <div class="col-md-6">
                                <input class="btn btn-primary btn-block" type="submit" name="guardar" value="Subir">
                            </div>
                        </div>
                    </form>
                    <?php if (!empty($exito)) : ?>
                        <script>
                            swal({
                                type: 'success',
                                title: "Datos Guardados Exitosamente",
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
                </div>

            </div>
        </div>
        <?php if (isset($result) && $result != '') : ?>
            <div class="card shadow">
                <div class="card-body">
                    <h3>Historial de soportes de resultado del paciente: <?= ucwords($Nombre_Completo) ?></h3>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-right">
                                    <th class="text-center th-sm"># Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Documento</th>
                                    <th class="text-center th-sm">Fecha Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Url</th>
                                    <th class="text-center th-sm">Descargar Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($result as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td id="documento"><?= $documento ?></td>
                                        <td><?= $row->Fecha_registro ?></td>
                                        <td><small class="text-muted"><?= base64_encode($row->soporte_resultado) ?></small></td>
                                        <td class="text-center"><a name="descargar" id="<?= $row->soporte_resultado ?>" href="" class="btn btn-info btn-sm"><i style="font-size: 20px;" class="text-white fas fa-file-download"></i></a></td>
                                    </tr>
                                <?php $i = $i + 1;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center"># Registro</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">Fecha Registro</th>
                                    <th class="text-center">Url</th>
                                    <th class="text-center">Descargar Archivo</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <legend hidden id="nombre"><?= $Nombre_Completo ?></legend>
    </div>
<?php endif; ?>
</body>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script>
    $(document).ready(function() {
        console.log('JQ')
        document.getElementsByName('descargar').forEach(Element => {
            Element.addEventListener('click', function(e) {
                e.preventDefault()

                console.log(this)
                let nombre = $('#nombre')[0].innerHTML
                let documento = $('#documento')[0].innerHTML
                let url = this.id

                let datos = {
                    nombre,
                    url,
                    documento
                }

                $.ajax({
                    type: 'post',
                    url: 'descargar_soporte.php',
                    data: datos,
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(res) {
                        console.log(res)
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(res);
                        link.download =
                            `soporte-resultado-paciente-${nombre}_${documento}.pdf`;
                        link.click();
                    }
                })

                console.log(datos)
            })
        })
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>