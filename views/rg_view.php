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
                    <?php if(!isset($_REQUEST['export_report'])): ?>
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <h4 class="text-center">SISTEMA GENERADOR DE INFORMES</h4>
                                <hr>
                                <label>Seleccione el tipo de Reporte a generar</label>
                                <select name="tipo_reporte" class="custom-select">
                                    <option selected value="<?= $tipo_de_reporte?>"><?= $tipo_de_reporte?></option>
                                    <option value="NTPM">Numero total de paciente mutual</option>
                                    <option value="NTPNM">Numero total de paciente no mutual</option>
                                    <option value="NTP">Numero total de pacientes</option>
                                    <option value="NTMP">Numero total de muestras procesadas</option>
                                    <option value="CPSA">Pacientes confirmado con toma de muestra sin asignacion a Seguimiento</option>
                                    <option value="CPSM">Pacientes positivos confirmados sin asignacion a profesional (Medicos)</option>
                                    <option value="CPPA">Cantidad de pacientes pendientes por asignar</option>
                                    <!-- <option value="CPP">Seguimientos por pacientes</option>
                                    <option value="CPP">Cantidad de Pacientes Positivos</option>
                                    <option value="CPN">Cantidad de Pacientes Negativos</option>
                                    <option value="CPS">Cantidad de Pacientes Sintomaticos</option>
                                    <option value="CPA">Cantidad de Pacientes Asintomaticos</option>
                                    <option value="CPF">Cantidad de Pacientes Fallecidos </option>
                                    <option value="CMP">Informes diario visita paciente positivo</option> -->
                                </select>
                            </div>
                            <h6 class="text-center">Seleccione el Rango de Fechas:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Desde:</label>
                                    <input type="date" name="fecha_inicio_reporte" value="<?= $fecha_inicio_reporte?>" min="2020-08-19" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Hasta:</label>
                                    <input type="date" name="fecha_final_reporte"  value="<?= $fecha_final_reporte?>" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="btn btn-success btn-block" type="submit" name="listar" value="Generar Reporte">
                                </div>
                            </div>
                            <br>
                                <div class="col-md-5">
                                <button type="submit"  name="export_report"  value="exportar" class="btn btn-outline-default waves-effect"> <i class="far fa-file-excel px-1 fa-2x"> Excel</i></button>
                                <!-- <button type="submit"  disabled="true" name="export_report"  value="exportar" class="btn btn-outline-default waves-effect"> <i class="far fa-file-pdf px-1 fa-2x" aria-hidden="true"> pdf</i></button> -->
                                    <!-- <input class="btn btn-success btn-block" type="submit" name="export_report" value="Exportar a Excel"> -->
                                </div>
                            </div>
                            <br>
                        </form>
                    <?php endif ?>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- *******************cantidad de pacientes positivos*************************+ -->
                <?php if (isset($cpp) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes Positivos: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm "># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Tipo Documento</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Telefonos<i</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Direccion<i</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl-llamadas">
                                                        <?php
                                                        $i = 1;
                                                        foreach ($cpp as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->tipo_documento ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->numero_documento ?></td>
                                            <td class="text-center"><?= $key->telefonos ?></td>
                                            <td class="text-center"><?= $key->barrio ?></td>
                                        <?php $i++;
                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- *******************cantidad de pacientes negativos*************************+ -->
                <?php if (isset($cpn) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes Negativos: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm "># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Tipo Documento</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Telefonos</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Direccion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de programacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de entrega al laboratorio</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha del Resultado</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Resultado</th>
                                        </tr>
                                        </thead>
                                            <tbody id="tbl-llamadas">
                                                                        <?php
                                                                        $i = 1;
                                                                        foreach ($cpn as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->tipo_documento ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->numero_documento ?></td>
                                            <td class="text-center"><?= $key->telefonos ?></td>
                                            <td class="text-center"><?= $key->barrio ?></td>
                                            <td class="text-center"><?= $key->fecha_programacion ?></td>
                                            <td class="text-center"><?= $key->fecha_entrega_lab ?></td>
                                            <td class="text-center"><?= $key->fecha_resultado ?></td>
                                            <td class="text-center"><?= $key->resultado ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- *******************Numero total de pacientes*************************+ -->
                <?php if (isset($ntp) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Numero total paciente: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm "># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Eps</th>
                                        </tr>
                                        </thead>
                                            <tbody id="tbl-llamadas">
                                                                        <?php
                                                                        $i = 1;
                                                                        foreach ($ntp as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->fecha_creacion ?></td>
                                            <td class="text-center"><?= $key->aseguradora ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                   <!-- *******************cantidad de pacientes mutual*************************+ -->
                   <?php if (isset($ntpm) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes de Mutual: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Telefono</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Dirreccion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creación</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($ntpm as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->telefono ?></td>
                                            <td class="text-center"><?= $key->barrio ?></td>
                                            <td class="text-center"><?= $key->fecha_registro ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                 <!-- *******************cantidad de pacientes NO mutual*************************+ -->
                 <?php if (isset($ntpnm) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes que no pertenecen a mutual: <?php echo $count?> </h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Telefono</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Dirreccion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creación</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Eps</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Lugar toma de Muestra</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($ntpnm as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->telefono ?></td>
                                            <td class="text-center"><?= $key->barrio ?></td>
                                            <td class="text-center"><?= $key->fecha_registro ?></td>
                                            <td class="text-center"><?= $key->aseguradora ?></td>
                                            <td class="text-center"><?= $key->programacion_atencion ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                 <!-- *******************numero total de muestras procesadas*************************+ -->
                <?php if (isset($ntmp) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Numero total de muestras procesadas: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Municipio</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creación</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Confirmacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Lugar de la toma</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($ntmp as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->municipio ?></td>
                                            <td class="text-center"><?= $key->fecha_creacion ?></td>
                                            <td class="text-center"><?= $key->fecha_confirmacion ?></td>
                                            <td class="text-center"><?= $key->lugar_de_la_toma ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- **********Pacientes confirmado con toma de muestra sin asignacion a seguimiento***************+ -->
                <?php if (isset($cpsa) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes confirmados con toma de muestra sin asignacion: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Municipio</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creación</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Programacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Confirmacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Lugar de la toma</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($cpsa as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->municipio ?></td>
                                            <td class="text-center"><?= $key->fecha_creacion ?></td>
                                            <td class="text-center"><?= $key->fecha_programacion ?></td>
                                            <td class="text-center"><?= $key->fecha_confirmacion ?></td>
                                            <td class="text-center"><?= $key->lugar_de_la_toma ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
  <!-- **********Pacientes confirmado con toma de muestra sin asignacion a profesional (medico)***************+ -->
                <?php if (isset($cpsm) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Pacientes Positivos confirmados sin asignacion a profesional: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Municipio</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Programacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Confirmacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Lugar de la toma</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($cpsm as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->municipio ?></td>
                                            <td class="text-center"><?= $key->fecha_programacion ?></td>
                                            <td class="text-center"><?= $key->fecha_confirmacion ?></td>
                                            <td class="text-center"><?= $key->lugar_de_la_toma ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                 <!-- *******************cantidad de pacientes pendientes por asignar*************************+ -->
                <?php if (isset($cppa) != '') : ?>
                    <div class="card shadow mt-5">
                        <div class="card-body">
                            <h4>Cantidad de pacientes pendientes por asignar: <?php echo $count?></h4>
                            <div class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-right ">
                                            <div class="row">
                                            </div>
                                            <th style="background: #CCD1D1" class="text-center th-sm"># Registro</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Nombre del paciente</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Identificacion</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Edad</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Creación</th>
                                            <th style="background: #CCD1D1" class="text-center th-sm">Fecha de Programacion</th>
                                            </tr>
                                        </thead>
                                             <?php
                                             $i = 1;
                                             foreach ($cppa as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $key->Nombre_Completo ?></td>
                                            <td class="text-center"><?= $key->identificacion ?></td>
                                            <td class="text-center"><?= $key->edad ?></td>
                                            <td class="text-center"><?= $key->fecha_creacion ?></td>
                                            <td class="text-center"><?= $key->fecha_programacion ?></td>
                                        <?php $i++;
                                                                        endforeach; ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
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