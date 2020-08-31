<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>global reports</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/stylos_formulario.css">
</head>

<body>
    <div class="linea3"></div>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card  shadow">
                <div class="linea1"></div>
                <div class="linea2"></div>
                <div class="linea3"></div>
                <div class="card-body">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <h4 class="text-center">SISTEMA GENERADOR DE INFORMES</h4>
                            <hr>
                            <label>Seleccione el tipo de Reporte a generar</label>
                            <select name="tipo_reporte" class="custom-select">
                                <option selected value=""> </option>
                                <option value="CPP">Cantidad de Pacientes Positivos</option>
                                <option value="CPN">Cantidad de Pacientes Negativos</option>
                                <option value="CPS">Cantidad de Pacientes Sintomaticos</option>
                                <option value="CPA">Cantidad de Pacientes Asintomaticos</option>
                                <option value="CPF">Cantidad de Pacientes Fallecidos </option>
                                <option value="CMP">Cantidad de Muestras Procesadas</option>
                            </select>
                        </div>
                        <h6 class="text-center">Seleccione el Rango de Fechas:</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Desde:</label>
                                <input type="date" name="fecha_inicio_reporte" min="2020-08-18" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Hasta:</label>
                                <input type="date" name="fecha_final_reporte" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="btn btn-success btn-block" type="submit" name="listar" value="Generar Reporte">
                            </div>
                        </div>
                        <br>
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
                                title: "Error",
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
    </div>
    <div class="container">
        <div class="row">
        <?php $resulado = $res;
        echo json_encode($resulado);
        ?>
        </div>
    </div>
</body>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>