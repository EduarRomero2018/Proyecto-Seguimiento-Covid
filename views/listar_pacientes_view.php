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

    <div class="container-fluid">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                    <div class class="col text-left">
                        <a href="index.php">
                            <button type="button" class="btn btn-outline-secondary btn-lg"> <i class="fas fa-chevron-left"></i></button>
                        </a>
                    </div>
                    <div class="container">
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-right ">
                                    <th style="background: #a9c5e7" class="text-center th-sm "># Registro</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Nombre paciente</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Edad</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Identificacion</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Telefono</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Creacion<i</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Programacion<i</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha Del Resultado</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Resultado Primera Muestra</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Creacion y Programacion</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Seguimiento</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Seguimiento</th>
                                    <!-- <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Resultado</th> -->
                                    <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                        <th style="background: #a9c5e7" class="text-center th-sm">Reprogramar</th>
                                    <?php endif ?>
                                    <?php if($_SESSION['role'] == 'Medico'): ?>
                                        <th style="background: #a9c5e7" class="text-center th-sm">Seleccione si el paciente a muerto</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody id="tbl-llamadas">
                                <?php
                                $i = 1;
                                foreach ($res as $key) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                        <td class="text-center"><?= $key->Edad ?></td>
                                        <td class="text-center"><?= $key->Identificacion ?></td>
                                        <td class="text-center"><?= $key->telefono ?></td>
                                        <td class="text-center"><?= $key->fecha_registro?></td>
                                        <td class="text-center"><?= $key->fecha_programacion?></td>
                                        <td class="text-center"><?= $key->fecha_resultado ?></td>
                                        <td class="text-center"><?= $key->resultado ?></td>
                                        <td class="text-center"><?= $key->usuario_programacion ?></td>
                                        <td class="text-center"><?= $key->usuario_seguimiento ?></td>
                                        <!-- <td class="text-center"><?= $key->usuario_resultado ?></td> -->
                                        <td class="text-center"><?= $key->usuario_medico ?></td>
                                        <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                            <td class="text-center"><a href="#" id="<?= $key->id ?>" name="reprogramar" class="btn btn-info px-3"><i style="font-size: 30px;" class="fas fa-calendar-alt text-white"></i></a></td>
                                        <?php endif ?>
                                        <?php if($_SESSION['role'] == 'Medico'): ?>
                                            <th class="text-center"><input type="checkbox" name="inhabilitar" id="<?= $key->id ?>"></th>    
                                        <?php endif ?>
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
                                    <th class="text-center">Fecha de Creacion</th>
                                    <th class="text-center">Fecha de Programacion</th>
                                    <th class="text-center">Fecha del Resultado</th>
                                    <th class="text-center">Resultado Primera Muestra</th>
                                    <th class="text-center">Usuario de Programacion</th>
                                    <th class="text-center">Usuario de Seguimiento</th>
                                    <!-- <th class="text-center">Usuario de Resultado</th> -->
                                    <th class="text-center">Usuario de Notificacion</th>
                                    <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                        <th class="text-center">Reprogramar</th>
                                    <?php endif ?>
                                    <?php if($_SESSION['role'] == 'Medico'): ?>
                                        <th class="text-center">Inhabilitar paciente</th>
                                    <?php endif ?>
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
<script type="text/javascript" src="js/mdb.min.js"></script>
<script>
    $('input[name="inhabilitar"]').on('click',function (e) {
        e.preventDefault()
        let nombre = this.parentElement.parentElement.children[1].innerText
        let identificacion = this.parentElement.parentElement.children[3].innerText
        let row = this.parentElement.parentElement

        Swal.fire({
            title: `${nombre} Fecha de fallecimiento`,
            html: '<input type="date" id="fecha_fellecimiento" class="form-control">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.value) {
                let id = this.id
                let fecha_f = $('#fecha_fellecimiento').val()
                $.ajax({
                    type: "POST",
                    url: "cambioEstado.php",
                    data: {id,fecha_f},
                    success: function (response) {
                        console.log(response);
                        response = JSON.parse(response)
                        if (response == 'ok') {
                            Swal.fire(
                                'Accion completada',
                                'Datos guardados',
                                'success'
                            )
                            row.hidden = true
                        } else {
                            Swal.fire(
                                'Error!',
                                'Campo fecha de fallecimiento es obligatorio',
                                'error'
                            )
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(`Status: ${textStatus} Error: ${errorThrown}`);
                    }
                });
            }
        })
    })

    $('a[name="reprogramar"]').on('click', function(){
        let nombre = this.parentElement.parentElement.children[1].innerText

        Swal.fire({
            title: `${nombre} Fecha de reprogramacion`,
            html: '<input type="date" id="fecha_programacion" min="<?= date('Y-m-d') ?>" class="form-control">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.value) {
                let id = this.id
                let fecha_r = $('#fecha_programacion').val()
                $.ajax({
                    type: "POST",
                    url: "reprogramar.php",
                    data: {id,fecha_r},
                    success: function (response) {
                        console.log(response);
                        response = JSON.parse(response)
                        if (response == 'ok') {
                            Swal.fire(
                                'Accion completada',
                                'Datos guardados',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Error!',
                                'Campo fecha de reprogramacion es obligatoria',
                                'error'
                            )
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(`Status: ${textStatus} Error: ${errorThrown}`);
                    }
                });
            }
        })
    })
</script>
</html>