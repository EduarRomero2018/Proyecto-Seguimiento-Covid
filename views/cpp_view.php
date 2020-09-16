<?php require_once 'views/header_view.php' ?>
    <div class="container">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                <h4>Pacientes pendientes por toma de muestra</h4>
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
                                    <th style="background: #ffc974" class="text-center th-sm">Fecha de Programacion<i</th>
                                    <th style="background: #ffc974" class="text-center th-sm">Usuario de Progracion toma de muestra<i</th>
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
                                        <td class="text-center"><?= $key->fecha_programacion ?></td>
                                        <td class="text-center"><?= $key->nombre_apellido ?></td>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php require_once 'views/footer_view.php' ?>