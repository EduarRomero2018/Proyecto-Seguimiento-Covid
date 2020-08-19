<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="js/jquery.js"></script>
    <!-- <script src="js/funciones.js"></script> -->
</head>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>

    <div class="container">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                <h4>Pacientes Negativos</h4>
                    <div class class="col text-left">
                        <a href="index.php">
                            <button type="button" class="btn btn-outline-secondary btn-lg"> <i class="fas fa-chevron-left"></i></button>
                        </a>
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-right ">
                                    <div class="row">
                                    </div>
                                    <th style="background: #ffc974" class="text-center th-sm "># Registro</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Nombre del paciente</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Tipo Documento</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Edad</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Identificacion</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Telefono 1</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Telefono 2</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de Programacion<i</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de entrega laboratorio<i</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha Del Resultado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Paciente Notificado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Notificar paciente</th>
                                </tr>
                            </thead>
                            <tbody id="tbl-llamadas">
                                <?php
                                $i = 1;
                                foreach ($res as $key) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                        <td class="text-center"><?= $key->tipo_documento ?></td>
                                        <td class="text-center"><?= $key->edad ?></td>
                                        <td class="text-center"><?= $key->numero_documento ?></td>
                                        <td class="text-center"><?= $key->telefono ?></td>
                                        <td class="text-center"><?= $key->telefono2 ?></td>
                                        <td class="text-center"><?= $key->fecha_programacion ?></td>
                                        <td class="text-center"><?= $key->fecha_entrega_lab ?></td>
                                        <td class="text-center"><?= $key->fecha_resultado ?></td>
                                        <td class="text-center"><?= $key->notificado ?></td>
                                        <th class="text-center"><a name="notificar"  data-toggle="modal" data-target="#modal-notificacion" class="btn btn-info px-3" id="<?= $key->id ?>"><i style="font-size: 30px;" class="fas fa-bell text-white"></i></a></th>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                <th style="background: #ffc974" class="text-center th-sm "># Registro</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Nombre del paciente</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Tipo Documento</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Edad</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Identificacion</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de Programacion<i</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de entrega laboratorio<i</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha Del Resultado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha Del Resultado</th>
                                    <th class="text-center">Notificar paciente</th>
                                </tr>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
            <legend hidden id="nombre"></legend>
            <legend hidden id="telefono"></legend>
            <legend hidden id="telefono2-hidedn"></legend>
            <legend hidden id="role"><?= $_SESSION['role'] ?></legend>
        <?php endif; ?>
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
                                    <input type="text" id="paciente_id" value="" hidden class="form-control">
                                </div>
                                <div class="form-group" name="hidden" hidden>
                                    <label>Marque el numero al que se comunico</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="telefono1">
                                        <label class="custom-control-label" id="telefono1-l" for="telefono1"></label>
                                    </div>
                                    <div id="div-telefono2" class="custom-control custom-checkbox" hidden>
                                        <input type="checkbox" class="custom-control-input" id="telefono2">
                                        <label class="custom-control-label" id="telefono2-l" for="telefono2"></label>
                                    </div>
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
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script>
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
        let identificacion = this.parentElement.parentElement.children[4].innerText
        let nombre =  this.parentElement.parentElement.children[1].innerText
        let telefono =  this.parentElement.parentElement.children[5].innerText
        let telefono2 =  this.parentElement.parentElement.children[6].innerText
        let id = this.id

        if(telefono2 == ''){
            $('#div-telefono2').attr('hidden', true)
        }else{
            $('#div-telefono2').attr('hidden', false)
        }

        $('#nombre').text(nombre)
        $('#paciente_id').val(id)
        $('#telefono1-l').text(telefono)
        $('#telefono2-l').text(telefono2)
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
</html>