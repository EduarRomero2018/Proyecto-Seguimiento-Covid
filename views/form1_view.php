<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>IngresarUsuario</title>
  <link rel="stylesheet" href="css/stylos_formulario.css">
  <!--<link rel="stylesheet" href="../css/normalize.css">-->
  <link rel="stylesheet" href="css/mdb.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <script src="validaciones.js"></script>
</head>

<body>

  <div class="linea1"></div>
  <div class="linea2"></div>
  <div class="linea3"></div>

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
          <select name="tipo_paciente" class="custom-select">
            <option selected value=""> </option>
            <option value="CASO INDICE">CASO INDICE</option>
            <option value="CONTACTO ESTRECHO">CONTACTO ESTRECHO</option>
          </select>
          <br>
      </div>

      <div class="col-sm-4">
        <input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">
        <label class="col-form-label">Primer Nombre:</label>
        <input type="text" name="primer_nombre" class="form-control" placeholder="Primer Nombre">
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Segundo Nombre:</label>
        <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Primer Apellido:</label>
        <input type="text" name="primer_apellido" class="form-control" placeholder="Primer Apellido">
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido">
      </div>


      <div class="col-sm-4">
        <label class="col-form-label">Digite su Edad:</label>
        <input type="number" name="edad" class="form-control" placeholder="">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Sexo:</label>
        <select name="sexo" class="custom-select">
          <option selected value=""> </option>
          <option value="MASCULINO">MACULINO</option>
          <option value="FEMENINO">FEMENINO</option>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Numero de Telefono:</label>
        <input type="number" name="telefono" class="form-control" placeholder="Celular">
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Aseguradora o EPS:</label>
        <input type="text" name="aseguradora" class="form-control" placeholder="Escriba su EPS">
      </div>

      <div class="col-sm-4">
        <label class="col-form-label">Seleccione el tipo de documento:</label>
        <select name="tipo_documento" class="custom-select">
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
        <input type="number" name="numero_identificacion" class="form-control" placeholder="">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Unidad de Medida:</label>
        <select name="unidad_medida" class="custom-select">
          <option selected value=""> </option>
          <option value="AÑOS">AÑOS</option>
          <option value="MESES">MESES</option>
          <option value="DIAS">DIAS</option>
        </select>
      </div>

      <div class="col-sm-4">
        <br>
        <label class="col-form-label">Barrio y direccion Completa:</label>
        <input type="text" name="barrio" class="form-control" placeholder="ejemplo: Campestre mz:7 lt: 12">
      </div>
      <div class="col-sm-4">
        <br>
        <label class="col-form-label">Email:</label>
        <input type="email" name="correo" class="form-control" placeholder="Correo Electronico">
      </div>
      <div class="col-sm-4">
        <label class="col-form-label">Fecha Recepcion de Programacion de Toma de Muestra</label>
        <input type="date" name="fecha_recepcion_programacion " class="form-control">
      </div>
      <div class="col-sm-4">
      <br>
        <label>Municipio</label>
        <select name="municipio" class="custom-select">
          <option value=""></option>
          <?php
          $municipios = ['Santa catalina','Clemencia','Turbana','Turbaco','Arjona','Mahates','Villa nueva','Maria la baja','San jacinto','El carmen de bolivar','San juan nepomuceno','Zambrano','Calamar','Santa Rosa','San estanislao','San cristobal','Sopla viento','El guamo','Arroyohondo','Cordoba'];
          foreach($municipios as $municipio): ?>
          <option value="<?= strtoupper($municipio) ?>"><?= ucwords($municipio) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
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

      </div>
      </form>
    </div>
  </div>

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
        title: "ERROR",
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

  <footer class="final text-center pb-3">
    <div class="container-fluid centrar">
      <img src="img/vigilados-supersalud-pie.png" width="250" class="img-responsive" alt="super salud">
      <br> Copyright © 2020 Caminosips || Todos
      los derechos reservados.
    </div>
  </footer>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
