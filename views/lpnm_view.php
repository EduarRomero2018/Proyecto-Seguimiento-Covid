<!-- PACIENTES QUE NO SON DE MUTUAL -->
<?php require_once 'views/header_view.php' ?>
    <div class="container-fluid">
        <?php if (isset($res) != '') : ?>
            <div class="card shadow mt-5">
                <div class="card-body">
                <h4>Pacientes que no pertenecen a mutual</h4>
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
                                    <th style="background: #a9c5e7" class="text-center th-sm"># Registro</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Nombre paciente</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Edad</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Documento</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Ubicacion</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Eps</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Fecha de Programacion<i</th>
									<th style="background: #a9c5e7" class="text-center th-sm">Fecha de Realizacion<i</th>
                                    <th style="background: #a9c5e7" class="text-center th-sm">Usuario de Programacion</th>
                                </tr>
                            </thead>
                            <tbody id="tbl-llamadas">
                                <?php
                                $i = 1;
                                foreach ($res as $key) : ?>
                                    <tr>
                                        <td class="text-center th-sm"><?= $i ?></td>
                                        <td class="text-center th-sm"><?= $key->Nombre_Completo ?></td>
                                        <td class="text-center th-sm"><?= $key->edad ?></td>
										<td class="text-center th-sm"><?= $key->documento?></td>
										<td class="text-center th-sm"><?= $key->municipio?></td>
                                        <td class="text-center th-sm"><?= $key->aseguradora ?></td>
                                        <td class="text-center th-sm"><?= $key->fecha_programacion?></td>
										<td class="text-center th-sm"><?= $key->fecha_realizacion?></td>
                                        <td class="text-center"><?= $key->Usuario_de_Programacion ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                <th class="text-center"># Registro</th>
                                    <th class="text-center th-sm">Nombre paciente</th>
                                    <th class="text-center th-sm">Edad</th>
                                    <th class="text-center th-sm">Identificacion</th>
                                    <th class="text-center th-sm">Telefono</th>
                                    <th class="text-center th-sm">Dirrección</th>
                                    <th class="text-center th-sm">Ubicacion del Paciente</th>
                                    <th class="text-center th-sm">Toma de Muestra</th>
                                    <th class="text-center th-sm">Fecha de Programacion</th>
                                    <th class="text-center th-sm">Fecha de Realizacion</th>
                                    <th class="text-center th-sm">Observacion</th>
                                    <th class="text-center th-sm">Fecha del Resultado</th>
                                    <th class="text-center th-sm">Resultado Primera Muestra</th>
                                    <th class="text-center th-sm">Usuario de Programacion</th>
                                    <th class="text-center th-sm">Usuario de Seguimiento</th>
                                    <th class="text-center th-sm">Usuario del Medico</th>
                                    <?php if($_SESSION['role'] == 'Auxiliar de programacion'): ?>
                                        <th class="text-center">Reprogramar</th>
                                    <?php endif ?>
                                    <?php if($_SESSION['role'] == 'Medico'): ?>
                                        <th class="text-center">Inhabilitar paciente</th>
                                    <?php endif ?>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
<script src="js/addons/datatables.min.js"></script>
<script src="js/tables.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/JsComplementoProg_toma_muestra.js"></script>
</html>