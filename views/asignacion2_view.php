<?php require_once 'views/header_view.php' ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form>
                        <h4>Asignacion de pacientes a usuarios</h4>
                        <div class="form-group">
                            <label>Seleccione la fecha de realizacion de la toma de muestra</label>
                            <input type="date" id="fecha_realizacion-asignacion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Municipio</label>
                            <select id="municipio" class="custom-select" disabled>
                                <option value="">Seleccione un municipio</option>
                                <?php
                                $municipios = ['Cartagena (13001)', 'Barranquilla (080001)', 'Santa catalina (13673)', 'Clemencia (13222)', 'Turbana (13838)', 'Turbaco (13836)', 'Arjona (13052)', 'Mahates (13433)', 'VillaNueva (13873)', 'Maria la baja (13442)', 'San jacinto (13654)', 'Carmen de bolivar (13244)', 'San juan nepomuceno (13657)', 'Zambrano (13894)', 'Calamar (13140)', 'Santa Rosa de lima (13683)', 'San estanislao (13647)', 'San cristobal (13620)', 'SoplaViento (13760)', 'El guamo (13248)', 'Arroyohondo (13062)', 'Cordoba (13212)'];
                                foreach ($municipios as $municipio) : ?>
                                    <option value="<?= strtoupper($municipio) ?>"><?= ucwords($municipio) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seleccionar en que proceso desea asignar</label>
                            <select id="asignacion" class="custom-select" disabled>
                                <option value="">Seleccionar proceso</option>
                                <option value="seguimiento">seguimiento</option>
                                <option value="medico">medico</option>
                            </select>
                        </div>
                        <div class="form-group" name="hidden" hidden>
                            <label>Seleccionar usuario</label>
                            <select id="id_usuario" class="custom-select">
                            </select>
                        </div>
                        <div class="form-group" name="hidden" hidden>
                            <label>Cantidad de pacientes que desea asignar</label>
                            <input type="number" id="cantidad_pacientes" class="form-control" min="1">
                            <h5 id="cantidad_pacientes_text" style="color: rgba(6, 62, 131, 0.9);" class="mt-3"></h5>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7 pl-2 pr-0" name="hidden" hidden>
                                <input type="submit" id="asignar" value="Asignar pacientes" class="btn btn-primary">
                            </div>
                            <div class="form-group col-sm-5 pl-0">
                                <a href="index.php" class="btn btn-outline-secondary">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="tableMutual" class="table-wrapper-scroll-y my-custom-scrollbar table-hover">
                        
                </div>
            </div>
        </div>
    </div>
<?php require_once 'views/footer_view.php' ?>