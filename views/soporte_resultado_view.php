<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Resultado</title>
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
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label>Ingrese el documento de Paciente</label>
                            <input class="form-control" type="text" name="documento">
                        </div>
                        <?php if (isset($_SESSION) && $_SESSION['role'] == 'Digitador') : ?>
                            <div class="form-group">
                                <label>Seleccionar PDF</label>
                                <input type="file" accept="" name="soporte">
                            </div>
                        <?php endif ?>

                        <div class="row">

                            <div class="col-md-6">
                            <?php if (isset($_SESSION) && $_SESSION['role'] == 'Medico' || $_SESSION['role'] == 'Digitador') : ?>
                                <input class="btn btn-primary btn-block" type="submit" name="guardar" value="Subir">
                                <?php endif ?>
                            </div>
                            <div class="col-md-6">
							  <?php if (isset($_SESSION) && $_SESSION['role'] == 'Medico' || $_SESSION['role'] == 'Digitador') : ?>
                            <input class="btn btn-success btn-block" type="submit" name="listar" value="listar">
							 <?php endif ?>
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
                    <h3>Telefono: <?= $telefono ?> <?php if($telefono2 != ''): ?>- Telefono 2: <?= $telefono2 ?><?php endif ?></h3>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                                <tr class="text-right">
                                    <th class="text-center th-sm"># Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Documento</th>
                                    <th class="text-center th-sm">Fecha Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th class="text-center th-sm">Url</th>
                                    <th class="text-center th-sm">Descargar Archivo</th>
                                    <?php if($notificado == 'NO'): ?>
                                    <th class="text-center th-sm">Notificar paciente</th>
                                    <?php endif ?>
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
                                        <td class="text-center"><a name="descargar" id="<?= $row->soporte_resultado ?>" href="" class="btn btn-info px-3"><i style="font-size: 30px;" class="text-white fas fa-file-download"></i></a></td>
                                        <?php if($notificado == 'NO'): ?>
                                        <th class="text-center"><a name="notificar"  data-toggle="modal" data-target="#modal-notificacion" class="btn btn-info px-3" id="<?= $key->id ?>"><i style="font-size: 30px;" class="fas fa-bell text-white"></i></a></th>
                                        <?php endif ?>
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
                                    <?php if($notificado == 'NO'): ?>
                                    <th class="text-center">Notificar paciente</th>
                                    <?php endif ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <legend hidden id="nombre"><?= $Nombre_Completo ?></legend>
            <legend hidden id="role"><?= $_SESSION['role'] ?></legend>
            
            <div class="modal fade" id="modal-notificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Notificar a un paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-notificacion">
                                <h5 id="text-modal"></h5>
                                <div class="form-group">
                                    <label>Llamada fallida</label>
                                    <select id="llamada" class="custom-select">
                                        <option value="">Seleccion una opcion</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                    <input type="text" id="id_usuario" value="<?= $_SESSION['id'] ?>" hidden class="form-control">
                                    <input type="text" id="paciente_id" value="<?= $paciente_id ?>" hidden class="form-control">
                                </div>
                                <div class="form-group" name="hidden" hidden>
                                    <label>Marque el numero al que se comunico</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="telefono1">
                                        <label class="custom-control-label" id="telefono1-l" for="telefono1"><?= $telefono ?></label>
                                    </div>
                                    <?php if($telefono2 != ''): ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="telefono2">
                                            <label class="custom-control-label" id="telefono2-l" for="telefono2"><?= $telefono2 ?></label>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div name="hidden" hidden class="form-group">
                                    <label>Motivo de la llamada fallida</label>
                                    <textarea id="motivo" cols="30" rows="3" class="form-control" placeholder="Escirba el motivo de la llamada fallida"></textarea>
                                </div>
                                <a href="" name="hidden" id="notificar" class="btn btn-primary" hidden>Enviar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
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

    $('#llamada').on('change', function () {  
        if (this.value == 'Si') {
            $('div[name="hidden"]').attr('hidden', false)
            $('a[name="hidden"]').attr('hidden', false)
        } else {
            $('div[name="hidden"]').attr('hidden', true)
            $('a[name="hidden"]').attr('hidden', false)
        }

        if(this.value == ''){
            $('a[name="hidden"]').attr('hidden', true)
            
        }
    })

    $('a[name="notificar"]').on('click', function (e) {  
        let identificacion = this.parentElement.parentElement.children[1].innerText
        let nombre = $('#nombre')[0].innerHTML

        $('#text-modal').text(`Notificar al paciente ${nombre} - ${identificacion} de sus reslutados`)
    })

    $('#notificar').on('click', (e) => {
        e.preventDefault()

        let id_usuario = $('#id_usuario').val()
        let paciente_id = $('#paciente_id').val()
        let rol_usuario = $('#role')[0].innerHTML
        let nombre_paciente = $('#nombre')[0].innerText
        let telefono_paciente = ''
        let telefono2_paciente = ''
        let motivo = $('#motivo').val()
        let llamada = $('#llamada').val()

        for (let index = 1; index <= 2; index++) {
            const element = `#telefono${index}`;

            if ($(element).is(':checked') == true) {
                if(element == '#telefono1'){
                    telefono_paciente = $('#telefono1-l')[0].innerText
                }else{
                    telefono2_paciente = $('#telefono2-l')[0].innerText
                }
            }
        }

        $.ajax({
            type: "POST",
            url: "notificar_paciente.php",
            data: {
                llamada,
                paciente_id,
                id_usuario,
                rol_usuario,
                nombre_paciente,
                telefono_paciente,
                telefono2_paciente,
                motivo
            },
            success: function (response) {
                console.log(response);
                let res = JSON.parse(response)
                switch (res) {
                    case 'ok':
                        Swal.fire(
                            'Tarea realizada con exito!',
                            'datos guardados',
                            'success'
                        )
                        $('#modal-notificacion').modal('hide')
                        $('#form-notificacion')[0].reset()
                        break;
                
                    default:
                        Swal.fire(
                            'Error!',
                            'Ha ocurrido un error al momento de realizar la tarea',
                            'error'
                        )
                        break;
                }
            }
        });
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>