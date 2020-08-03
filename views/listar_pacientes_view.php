<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
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
                                    <th style="background: #a9c5e7" class="text-center th-sm "># Registro<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Nombre paciente<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Edad<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Identificacion<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Telefono<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Creacion<i class="text-center fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Programacion<i class="text-center fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha Del Resultado<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Resultado Primera Muestra<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Creacion<i class="text-left fas fa-sort ml-1"></i></th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Inhabilitar paciente</th>
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
                                        <td class="text-center"><?= $key->nombre_apellido ?></td>
                                        <th class="text-center"><input type="checkbox" name="inhabilitar" id="<?= $key->id ?>"></th>
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
                                    <th class="text-center">Fecha Del Resultado</th>
                                    <th class="text-center">Resultado Primera Muestra</th>
                                    <th class="text-center">Usuario de Creacion</th>
                                    <th class="text-center">Inhabilitar paciente</th>
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
<script>
    $('input[name="inhabilitar"]').on('click',function (e) {  
        e.preventDefault()
        let nombre = this.parentElement.parentElement.children[1].innerText
        let identificacion = this.parentElement.parentElement.children[3].innerText
        let row = this.parentElement.parentElement
        
        Swal.fire({
            title: 'Esta seguro?',
            text: `Modificando estado del paciente (${nombre}) esta accion no podra ser revertida`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si'
        }).then((result) => {
            if (result.value) {
                let id = this.id
                $.ajax({
                    type: "POST",
                    url: "cambioEstado.php",
                    data: {id},
                    success: function (response) {
                        console.log(response);
                        Swal.fire(
                        'Inhabilitado!',
                        'Cambio Realizado.',
                        'success'
                        )
                        row.hidden = true
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