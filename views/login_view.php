<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar Sesión</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  </head>
  <body>
    <div class="grid-container general">
      <div class="row small-text-center medium-text-center large-text-center">
            <h1 class="subheader" style="color: blanchedalmond;">Proyecto (covid-19)</h1>
        <div class="grid-x">
          <!-- primera columna-->
           <div class="cell columns small-12 medium-6 large-6 columna1 ">
            <img src="img/logo3.jpg" alt="logo">
          </div>
          <!-- segunda columna-->
          <div class="cell columns small-12 medium-6 large-6 caja">
            <div class="fondo_form ">
                <h4 class="subheader">Iniciar Sesión</h4>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
                    <div class="input-group">
                        <span class="input-group-label primerborde">
                          <i class="fas fa-id-card"></i>
                        </span>
                        <input class="input-group-field" type="number" placeholder="Numero de Documento" name="documento">
                    </div>
                      <div class="input-group">
                          <span class="input-group-label primerborde">
                              <i class="fas fa-unlock-alt"></i>
                          </span>
                          <input class="input-group-field" type="password" placeholder="Contraseña" name="password">
                        </div>

                        <div class="row errores">
                            <div class="grid-x grid-padding-x">
                                <div class="cell columns small-12 medium-12 large-12  ">

                                <?php if(!empty($errores)):?>
                                  <script>
                                    swal({
                                    type: 'error',
                                    title: "Error al iniciar sesión!",
                                    text: "<?php echo $errores; ?>",
                                    button: "Aceptar",
                                    timer: 5000,
                                    animation: false,
                                    customClass: 'animated tada'})
                                  </script>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                  </form>

                  <div class="button-group boton1">
                      <p class="submit-btn button expanded" accesskey="login.submit()"  onclick="login.submit()">Iniciar Sesión </p>
                  </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
  </body>
</html>
