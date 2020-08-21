<?php require_once 'views/header_view.php' ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form>
                        <h4>Asignacion de pacientes a usuarios</h4>
                        <div class="form-group">
                            <label>Seleccionar en que proceso desea asignar</label>
                            <input type="date" id="fecha_realizacion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Seleccionar en que proceso desea asignar</label>
                            <select id="asignacion" class="custom-select" disabled>
                                <option value="">Seleccionar proceso</option>
                                <!-- <option value="programacion">programacion</option> -->
                                <option value="seguimiento">seguimiento</option>
                                <!-- <option value="resultado">resultado</option> -->
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
<?php require_once 'views/footer_view.php' ?>