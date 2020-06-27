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
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/stylos_formulario.css">
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
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
                        <br>
                        <a href="index.php">
                            <button type="button" class="btn btn-outline-secondary btn-lg">Regresar</button>
                        </a>
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