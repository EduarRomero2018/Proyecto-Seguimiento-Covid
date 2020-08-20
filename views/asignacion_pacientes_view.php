<?php require_once 'views/header_view.php' ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                        <h4>Asignacion de pacientes a usuarios</h4>
                        <div class="form-group">
                            <label>Seleccionar usuario</label>
                            <select <?= $cantidad_pacientes == 0 ? 'disabled': ''?> name="id_usuario" class="custom-select" required>
                                <option value="">Seleccionar usuario</option>
                                <?php foreach($usuarios as $usuario): ?>
                                    <option value="<?= $usuario->id ?>"><?= $usuario->nombre_apellido ?> (<?= $usuario->roles ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cantidad de pacientes sin persona asiganda: <?= $cantidad_pacientes ?></label>
                            <input <?= $cantidad_pacientes == 0 ? 'disabled': ''?> type="number" name="cantidad_pacientes" class="form-control" max="<?= $cantidad_pacientes ?>" min="1" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7 pl-2 pr-0">
                                <input <?= $cantidad_pacientes == 0 ? 'disabled': ''?> type="submit" name="asignar" value="Asignar pacientes" class="btn btn-primary">
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