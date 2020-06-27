<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
</head>

<body>

    <div class="container-fluid">
        <?php if (isset($res) != '') : ?>
        <div class="card shadow mt-5">
            <div class class="col text-left">
                <a href="index.php">

                    <button type="button" class="btn btn-outline-secondary btn-lg"> <i
                            class="fas fa-chevron-left"></i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Paciente registrados: <?= $query->rowCount() ?></h3>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <input type="text" class="form-control" id="buscar"  placeholder="Buscar Paciente"
                                aria-describedby="inputGroupPrepend21" onkeyup="busqueda();">
                                <a href="listar_pacientes.php">
                                    <span type="submi" class="input-group-text" id="inputGroupPrepend21">Borrar</span>
                                </a>
                            </div>



                              </div>
                          </div>
                        </div>
                    </div>
                        </div>

                <div class="container">
                    <div class="linea1"></div>
                    <div class="linea2"></div>
                    <div class="linea3"></div>
                </div>
                <?php $cant_pag = round($cantidad / $fin);?>

                <table id="search" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Registro
                            </th>
                            <th class="th-sm">Nombre y Apellido
                            </th>
                            <!--<th class="th-sm">Tipo Documento
                            </th>-->
                            <th class="th-sm">Identificacion
                            </th>
                            <th class="th-sm">Edad
                            </th>
                            <!--<th class="th-sm">Sexo
                            </th>-->
                            <!--<th class="th-sm">Dirección
                            </th>-->
                            <!--<th class="th-sm">Correo
                            </th>-->
                            <th class="th-sm">Telefono
                            </th>
                            <!--<th class="th-sm">Fecha Entrega laboratorio
                            </th>-->
                            <th class="th-sm">Fecha de Resultado
                            </th>
                            <th class="th-sm">Resultados
                            </th>
                        </tr>
                    </thead>

                    <tbody id="listar_pacientes">
                        <?php $i = 1;
                            foreach ($res as $results) : ?>
                        <tr data-toggle="popover-hover" data-content="">
                            <td><?= $i ?></td>
                            <td> <?= $results->Nombre_Completo?></td>
                            <td><?= $results->Identificacion?></td>
                            <!--<td><?= $results->numero_documento?></td>-->
                            <td><?= $results->Edad?></td>
                            <!--<td><?= $results->sexo?></td>-->
                            <!--<td><?= $results->barrio?></td>-->
                            <!--<td><?= $results->correo?></td>-->
                            <td><?= $results->telefono?></td>
                            <!--<td><?= $results->fecha_entrega_lab?></td>-->
                            <td><?= $results->fecha_resultado?></td>
                            <td><?= $results->resultado?></td>

                        </tr>
                        <?php $i = $i + 1;
                            endforeach; ?>
                    </tbody>
                </table>
                <div id="paginacion" class="d-flex justify-content-center mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php $p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 0 ?>
                            <li class="page-item <?= $p > 1 ? : 'disabled' ?>">
                                <a class="page-link"
                                    href="listar_pacientes.php?p=<?= isset($_REQUEST['p']) ? $_REQUEST['p'] - 1: 1 ?>"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Anterior</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $cant_pag; $i++): ?>
                            <li class="page-item <?= isset($_REQUEST['p']) && $_REQUEST['p'] == $i ? 'active':'' ?>"><a
                                    class="page-link" href="listar_pacientes.php?p=<?= $i ?>"><?= $i ?></a></li>
                            <?php endfor ?>
                            <?php $n = isset($_REQUEST['p']) ? $_REQUEST['p'] + 1: 0;?>
                            <li class="page-item <?= $n < $i ? : 'disabled' ?>">
                                <a class="page-link"
                                    href="listar_pacientes.php?p=<?= isset($_REQUEST['p'])?$_REQUEST['p'] + 1: 0 + 1 ?>"
                                    aria-label="Next">
                                    <span aria-hidden="true">Siguiente &raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="popover-hover"]').popover({
            html:true,
            trigger: 'hover',
            placement: 'top'
        });
        console.log('ajax');

        $('#buscar').on('keyup', function () {
            let consulta = $('#buscar').val()
            $('#paginacion').attr('hidden',true)

            $.ajax({
                url: "listar_pacientes.php",
                type: "POST",
                data: {
                    consulta
                },
                success: function (response) {
                    let resultados = JSON.parse(response)
                    switch (resultados) {

                        default:
                            let plantilla = ''
                            let i = 1

                            resultados.forEach(element => {
                                plantilla += `
                                        <tr>
                                            <td>${i}</td>
                                            <td>${element.Nombre_Completo}</td>
                                            <td>${element.Identificacion}</td>
                                            <td>${element.Edad}</td>
                                            <td>${element.telefono}</td>
                                            <td>${element.fecha_resultado}</td>
                                            <td>${element.resultado}</td>

                                        </tr>
                                    `
                                i = i + 1
                            });
                            $('#listar_pacientes').html(plantilla)
                            console.log(resultados);
                            break;
                    }

                }
            });
        })
    })
</script>

</html>


