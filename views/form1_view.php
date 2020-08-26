<?php require_once 'views/header_view.php' ?>
  <div class="container">
    <div class="row">
      <h3 class="titulo">Ingrese los Datos del Paciente</h3>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <label class="col-form-label">Tipo de Paciente:</label>
          <select name="tipo_paciente" class="custom-select" required>
            <option selected value=""> </option>
            <option value="CASO INDICE">CASO INDICE</option>
            <option value="CONTACTO ESTRECHO">CONTACTO ESTRECHO</option>
            <option value="COMORBILIDAD">COMORBILIDAD</option>
          </select>
          <br>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Seleccione el tipo de documento:</label>
        <select name="tipo_documento" class="custom-select" required>
          <!--<option selected>Seleccione el tipo de documento</option>-->
          <option selected value=""> </option>
          <option value="CC">CEDULA DE CIUDADANIA</option>
          <option value="TI">TARJETA DE INDENTIDAD</option>
          <option value="RC">REGISTRO CIVIL</option>
          <option value="CE">CEDULA EXTRANJERA</option>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Numero Documento:</label>
        <input type="number" name="numero_identificacion" class="form-control" placeholder="" required>
      </div>

      <div class="col-sm-4">
        <input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">
        <label class="col-form-label">Primer Nombre:</label>
        <input type="text" name="primer_nombre" class="form-control" placeholder="Primer Nombre" required>
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Segundo Nombre:</label>
        <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Primer Apellido:</label>
        <input type="text" name="primer_apellido" class="form-control" placeholder="Primer Apellido" required>
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" required>
      </div>


      <div class="col-sm-4">
        <label class="col-form-label">Digite su Edad:</label>
        <input type="number" name="edad" class="form-control" placeholder="" required>
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Unidad de Medida:</label>
        <select name="unidad_medida" class="custom-select" required>
          <option selected value=""> </option>
          <option value="AÑOS">AÑOS</option>
          <option value="MESES">MESES</option>
          <option value="DIAS">DIAS</option>
        </select>
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Sexo:</label>
        <select name="sexo" class="custom-select" required>
          <option selected value=""> </option>
          <option value="MASCULINO">MASCULINO</option>
          <option value="FEMENINO">FEMENINO</option>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Numero de Telefono:</label>
        <input type="number" name="telefono" class="form-control" placeholder="Celular" required>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Numero de Telefono 2 (Opcional) :</label>
        <input type="number" name="telefono2" class="form-control" placeholder="Celular">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Aseguradora o EPS:</label>
        <select name="aseguradora" class="custom-select" required>
          <option value=""></option>
          <?php
          $aseguradoras = ['Ambuq','Anaswayuu EPSI','ARS con vida','Asmet salud','Caja de prevecion','Cajacopi','Caprecom','Colsanitas','Comfamiliar','Comfenalco','Comparta','Compensar','Coomeva','Coosalud','Dadis','Emssanar','Famisanar','Ferrocariles','Inpec','Magisterio','Medimas','Mutual ser','Nueva EPS','Sabia Salud','Salud total','Sanidad militar','Sanitas','Sura'];
          foreach($aseguradoras as $aseguradora => $valor): ?>
            <option value="<?= strtoupper($valor) ?>"><?= $valor ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Regimen:</label>
        <select name="regimen" class="custom-select" required>
          <option selected value=""> </option>
          <option value="SUBSIDIADO">Subsidiado</option>
          <option value="CONTRIBUTIVO">Contributivo</option>
          <option value="REGIMEN ESPECIAL">Regimen Especial</option>
          <option value="SIN AFILIACION">Sin Afilicion</option>
        </select>
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Barrio y direccion Completa:</label>
        <input type="text" name="barrio" class="form-control" placeholder="ejemplo: Campestre mz:7 lt: 12" required>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Email:</label>
        <input type="email" name="correo" class="form-control" placeholder="Correo Electronico">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Fecha De Recepcion de Informacion</label>
        <input type="date" name="fecha_recepcion_programacion " class="form-control">
      </div>
      <div class="col-sm-4">
        <label>Municipio</label>
        <select name="municipio" class="custom-select" required>
          <option value=""></option>
          <?php
          $municipios = ['cartagena (13001)', 'Santa catalina (13673)', 'Clemencia (13222)', 'Turbana (13838)', 'Turbaco (13836)', 'Arjona (13052)', 'Mahates (13433)', 'VillaNueva (13873)', 'Maria la baja (13442)', 'San jacinto (13654)', 'Carmen de bolivar (13244)', 'San juan nepomuceno (13657)', 'Zambrano (13894)', 'Calamar (13140)', 'Santa Rosa de lima (13683)', 'San estanislao (13647)', 'San cristobal (13620)', 'SoplaViento (13760)', 'El guamo (13248)', 'Arroyohondo (13062)', 'Cordoba (13212)'];
          foreach ($municipios as $municipio) : ?>
            <option value="<?= strtoupper($municipio) ?>"><?= ucwords($municipio) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <br>
      <div class="col-sm-4">
        <br>
        <div>
          <button type="submit" class="btn btn-outline-secondary btn-lg">Guardar Datos</button>
          <br>
          <br>
        </div>
      </div>
      <div class="col-sm-4">
        <br>
        <div>
          <a href="index.php">
            <button type="button" class="btn btn-outline-secondary btn-lg">Regresar</button>
          </a>
          <br>
          <br>
        </div>
        <br>

      </div>
      </form>
    </div>
  </div>
<?php require_once 'views/footer_view.php' ?>