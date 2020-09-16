<!-- CANTIDAD DE PACIENTES PENDIENTES POR NOTIFICAR -->
<?php require_once 'views/header_view.php'; ?>
    <div class="container">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                <h4>Pacientes pendientes por notificar</h4>
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
                                    <th style="background: #ffc974" class="text-center th-sm">Identificacion</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Municipio</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Resultado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de Resultado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Paciente Notificado</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Usuario Medico</th>
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
                                        <td class="text-center"><?= $key->numero_documento ?></td>
                                        <td class="text-center"><?= $key->municipio ?></td>
                                        <td class="text-center"><?= $key->resultado?></td>
                                        <td class="text-center"><?= $key->fecha_resultado?></td>
										<td class="text-center"><?= $key->notificado?></td>
                                        <td class="text-center"><?= $key->Usuario_Medico ?></td>
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
                                    <th class="text-center">Paciente Notificado</th>
                                </tr>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php require_once 'views/footer_view.php' ?>