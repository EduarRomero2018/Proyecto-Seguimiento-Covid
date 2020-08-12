<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link href="css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>
    <!--******************************************************-->
    
    <!--*********************EMPIEZA LA INFORMACION DEBAJO DE LA NAVEGACION*********************************-->
    <div class="container padre">
        <div class="card mb-3 text-center hoverable">
            <div class="card-body d-flex justify-content-center">
                <form action="" method="post" class="col-sm-6">
                    <div class="form-group">
                        <label>Seleccione el mes que desea visualizar:</label>
                        <select name="mes" class="custom-select">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($meses as $mes => $valor): ?>
                                <option value="<?= $valor ?>"><?= $valor ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <footer class="final text-center">
        <div class="container-fluid centrar">
            <img src="img/vigilados-supersalud-pie.png" width="250" class="img-responsive" alt="super salud">
            <br> Copyright © 2020 Caminosips || Todos
            los derechos reservados.
        </div>
    </footer>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>