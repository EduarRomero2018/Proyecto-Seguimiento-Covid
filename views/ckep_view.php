<!--pacientes a los cuales se le han entregado kit-->
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
                <h4>Pacientes a los que se le han entregado kit:</h4>
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
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de entrega de Ktis</th>
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
                                        <td class="text-center"><?= $key->fecha_entrega_kits ?></td>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
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
</html>