<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>

<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>

    <!--******************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light fondo-color img-nav">
        <a class="navbar-brand" href="#">
            <img src="img/logo_sin_fondo.png" class="img-fluid" alt="logo-caminos">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--******************************************************-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROCESOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="getform1.php" class="dropdown-item" href="#">Ingresar Pacientes</a>
                        <!--<a class="dropdown-item" href="#">Ingresar Datos Personales</a>-->
                        <a href="progmuestra.php" class="dropdown-item" href="#">Programar Primera Toma Muestra</a>
                        <!--<a class="dropdown-item" href="#">Programacion de Toma de Muestra</a>-->
                        <a href="segto_evolucion.php" class="dropdown-item" href="#">Ingresar Seguimiento Diario Por
                            Paciente</a>
                        <!--<a class="dropdown-item" href="#">Seguimiento Semanal por Paciente</a>-->
                        <a href="historial_paciente.php" class="dropdown-item">Ver Seguimiento Paciente</a>
                        <a href="toma_muestra_control.php" class="dropdown-item">Programar Segunda Toma Muestra (Control)</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INGRESAR RESULTADOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" data-target='#exampleModal' role="button"
                        data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                        Ingresar Fecha de Realizacion de la toma
                    </a>
                    <a class="nav-link " href="#" id="navbarDropdown" data-target='#exampleModal' role="button"
                        data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                        Ingresar Resultado Primera Vez
                    </a>
                    <a class="nav-link " href="#" id="navbarDropdown" data-target='#modalTomaMuestraControl'
                        role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                        Ingresar Resultado Segunda Vez (Control)
                    </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        REPORTES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="listar_pacientes.php" class="dropdown-item" href="#">Listar Todos los Pacientes</a>
                        <!--<a class="dropdown-item" href="#">Seguimiento Semanal por Paciente</a>-->
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="soporte_resultado.php" class="nav-link">INGRESAR SOPORTE RESULTADO</a>
                </li>
            </ul>
            <a href="cerrar.php">
                <button class="btn btn-outline-info  my-2 my-sm-0" type="submit">
                    <i class="fa fa-power-off mr-2" aria-hidden="true"></i>Cerrar Sesión</button>
            </a>
        </div>
    </nav>
    <!--*********************EMPIEZA LA INFORMACION DEBAJO DE LA NAVEGACION*********************************-->
    <div class="container padre">
        <!--News card-->
        <div class="card mb-3 text-center hoverable">
            <div class="card-body">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-4 offset-md-1 mx-3 my-3">
                        <!--Featured image-->
                        <div class="view overlay ">

                            <div class="documento">
                                <a href="" class="green-text">
                                    <h6 class="font-bold pb-1">
                                        <?php echo 'Bienvenido : ', $_SESSION['nombre_apellido']?>
                                </a>
                            </div>

                            <img class="img-thumbnail" src="img/user.png" class="img-fluid z-depth-2-half "
                                alt="imagen de user" data-holder-rendered="true">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 text-center hoverable">
                        <h4 class="mb-1">
                            <strong>Cantidad de Pacientes Positivos:</strong>
                        </h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-1x fa-briefcase-medical"><p class="display-1 degree"><?php echo $positivos?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Card -->
    <div class="container padre">
        <div class="row">
            <div style="height: 100%;" class="col-sm-4 text-center ">
                <div class="card weather-card">
                    <div class="card-body pb-3  text-center hoverable">
                        <h4 class="mb-1">
                            <strong>Pacientes que estan Pendientes Por Resultados:</strong>
                            <hr>
                        </h4>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-4x fa-syringe"><p class="display-1 degree"><?php echo $numero_conteo?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <!-- Card -->
                <div class="card weather-card">
                    <div class="card-body pb-3  text-center hoverable">

                        <!-- Title -->
                        <h4 class="card-title font-weight-bold">Pacientes que aun no se le han Realizado Toma de Muestra</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-4x fa-stethoscope"><p class="display-1 degree"><?php echo $Cantidad_Pacientes?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div style="height: 100%;" class="col-sm-4 text-center ">
                <div class="card weather-card">
                    <div class="card-body pb-3  text-center hoverable">
                        <h4 class="mb-1">
                            <strong>Cantidad de Pacientes que estan Programados:</strong>
                            <hr>
                        </h4>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-4x fa-user-md"><p class="display-1 degree"><?php echo $Cantidad_p_p_pendiente_por_toma?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>
                    </div>
                </div>
            </div>
             <!--************SEGUNDA FILA*************-->
            <div class="container padre">
                <br>
        <div class="row">
            <div class="col-sm-4">
                <!-- Card -->
                <div class="card weather-card">
                    <div class="card-body pb-3  text-center hoverable">

                        <!-- Title -->
                        <h4 class="card-title font-weight-bold">Cantidad de Pacientes Asintomaticos:</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-4x fa-file-medical-alt"><p class="display-1 degree"><?php echo $Cantidad_Pacientes?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <!-- Card -->
                <div class="card weather-card">
                    <div class="card-body pb-3  text-center hoverable">

                        <!-- Title -->
                        <h4 class="card-title font-weight-bold">Cantidad de Pacientes  Sintomaticos:</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                        <i class="fas fa-4x fa-file-medical-alt"><p class="display-1 degree"><?php echo $Cantidad_Pacientes?></p></i>
                            <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                        </div>

                    </div>

                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    <!--******************MODALS************************-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Resultado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-container">
                        <div class="form-group">
                            <label>Buscar Paciente</label>
                            <input class="form-control" type="search" id="documento">
                            <input type="hidden" id="paciente_id">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Consultar" id="buscarPaciente">
                        <div class="mt-2">
                            <table hidden id="tablePaciente" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">N° Identificacion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                        <div hidden id="form-body">
                            <div class="mt-2">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de Entrega al laboratorio toma de
                                        muestra</label>
                                    <input type="date" id="fecha_entrega_laboratorio" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Fecha de procesamiento de la toma</label>
                                    <input type="date" id="fecha_procesamiento" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de Resultados</label>
                                    <input type="date" id="fecha_resultado" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Resultado</label>
                                <select id="resultado" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="1">Positivo</option>
                                    <option value="2">Negativo</option>
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="notificado" id="defaultUnchecked">
                                <label id="defaultUnchecked" name="check-label" class="custom-control-label" for="defaultUnchecked"></label>
                            </div>
                            <button id="guardar" type="button" class="btn btn-primary">Guardar datos</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal segunda toma de muestra -->
    <div class="modal fade" id="modalTomaMuestraControl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resultado toma de muestras control</h5>
                </div>
                <div class="modal-body">
                    <form id="form-container">
                        <div class="form-group">
                            <label>Buscar Paciente</label>
                            <input class="form-control" type="search" id="documento-2">
                            <input type="hidden" id="paciente_id_2">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Consultar" id="buscar">
                        <div class="mt-2">
                            <table hidden id="tablePaciente2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">N° Identificacion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-2"></tbody>
                            </table>
                        </div>
                        <div hidden id="form-body-2">
                            <div class="mt-2">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de programacion</label>
                                    <input disabled type="date" id="fecha_programacion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de realizacion de la toma</label>
                                    <input type="date" id="fecha_toma" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Resultado</label>
                                <select id="resultadoControl" class="custom-select">
                                    <option selected value=""> </option>
                                    <option value="Positivo">Positivo</option>
                                    <option value="Negativo">Negativo</option>
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="notificado" id="defaultUnchecked-2">
                                <label id="defaultUnchecked-2" name="check-label" class="custom-control-label" for="defaultUnchecked-2"></label>
                            </div>
                            <button id="guardarResultado" type="button" class="btn btn-primary">Guardar datos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="final text-center">
        <div class="container-fluid centrar">
            <img src="img/vigilados-supersalud-pie.png" width="250" class="img-responsive" alt="super salud">
            <br> Copyright © 2020 Caminosips || Todos
            los derechos reservados.
        </div>
    </footer>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <script src="js/jsContenido.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#buscarPaciente').on('click', function () {
                $('#error').attr('hidden', true)
            })
            $('#fecha_entrega_laboratorio').on('change', function () {
                let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
                if (fecha_entrega_laboratorio != '') {
                    $('#fecha_procesamiento').attr('disabled', false)
                }
            })

            $('#fecha_procesamiento').on('change', function () {
                let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
                let fecha_procesamiento = $('#fecha_procesamiento').val()
                if (fecha_procesamiento < fecha_entrega_laboratorio) {
                    swal({
                        type: 'error',
                        title: "ERROR",
                        text: "La fecha de procesamiento no puede ser menor a la fecha de entrega de laboratorio",
                        button: "Aceptar",
                        icon: "error",
                        button: "Aceptar",
                        timer: 7000,
                        animation: false,
                        customClass: 'animated heartBeat'
                    })
                    $('#guardar').attr('disabled', true)
                } else {
                    $('#fecha_resultado').attr('disabled', false)
                    $('#guardar').attr('disabled', false)
                }
            })

            $('#fecha_resultado').on('change', function () {
                let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
                let fecha_procesamiento = $('#fecha_procesamiento').val()
                let fecha_resultado = $('#fecha_resultado').val()
                if (fecha_resultado < fecha_entrega_laboratorio || fecha_resultado < fecha_procesamiento) {
                    swal({
                        type: 'error',
                        title: "ERROR",
                        text: "La fecha de resultado no puede ser menor a la fecha de entrega de laboratorio y a la fecha de procesamiento de la toma",
                        button: "Aceptar",
                        icon: "error",
                        button: "Aceptar",
                        timer: 7000,
                        animation: false,
                        customClass: 'animated heartBeat'
                    })

                    $('#guardar').attr('disabled', true)
                } else {
                    $('#guardar').attr('disabled', false)
                }
            })
            $('#guardar').on('click', function (e) {
                e.preventDefault()
                let id = $('#paciente_id').val()
                let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
                let fecha_procesamiento = $('#fecha_procesamiento').val()
                let fecha_resultado = $('#fecha_resultado').val()
                let resultado2 = $('#resultado').val()
                let notificado = ''
                if($('#defaultUnchecked').is(':checked') == true){
                    notificado = 'SI'

                }

                $.ajax({
                    type: 'POST',
                    url: 'resultadoTomaDeMuestra.php?paciente_id=' + id +
                        '&fecha_entrega_laboratorio=' + fecha_entrega_laboratorio + '&fecha_procesamiento=' + fecha_procesamiento +
                        '&fecha_resultado=' + fecha_resultado + '&resultado=' + resultado2 + '&notificado=' + notificado,
                    success: function (res) {

                        let resultado1 = JSON.parse(res)
                        switch (resultado1) {
                            case 'empty':
                                console.log(resultado1)
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "Todos los campos son obligatorios",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                break;
                            case 'bad':
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "Ha ocurrido un error al intentar guardar los datos",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                break;
                            default:
                                let t = ''
                                swal({
                                    type: 'success',
                                    title: "Exito",
                                    text: "Datos guardados exitosamente",
                                    button: "Aceptar",
                                    icon: "success",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#tablePaciente').attr('hidden', true)
                                $('#exampleModal').modal('hide')
                                $('#form-container')[0].reset()
                                $('#form-body').attr('hidden', true)
                                break;
                        }
                    }
                })
            })

            $('#buscarPaciente').on('click', function (e) {
                e.preventDefault()
                let identificacion = $('#documento').val()
                $('#guardar').attr('disabled',true)

                $('#defaultUnchecked').on('click', function () {
                    if ($('#defaultUnchecked').is(':checked') == true) {
                        $('#guardar').attr('disabled', false)
                    } else {
                        $('#guardar').attr('disabled', true)
                    }
                })

                $.ajax({
                    type: 'post',
                    url: 'buscarPaciente.php?buscar=' + identificacion,
                    success: function (res) {
                        console.log(res);
                        let resultado = JSON.parse(res)
                        let plantilla = ''
                        let id = ''
                        let numero_telefono = 0
                        switch (resultado) {

                            case "empty":
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "Debe ingresar un numero de documento para realizar la busqueda",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#form').attr('hidden', true)
                                $('#tablePaciente').attr('hidden', true)
                                break;

                            case 1:
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "El paciente ya tiene Resultados, Por favor Verifique",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#form').attr('hidden', true)
                                $('#tablePaciente').attr('hidden', true)
                                break;

                            case 'null':
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "Este Paciente aun no cuenta con una realizacion de toma de muestra, favor verifique",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 10000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#form').attr('hidden', true)
                                $('#tablePaciente').attr('hidden', true)
                                break;

                            case 'err':
                                swal({
                                    type: 'error',
                                    title: "ERROR",
                                    text: "Paciente no Encontrado... Verifique si Existe",
                                    button: "Aceptar",
                                    icon: "error",
                                    button: "Aceptar",
                                    timer: 7000,
                                    animation: false,
                                    customClass: 'animated heartBeat'
                                })
                                $('#form-body').attr('hidden', true)
                                $('#tablePaciente').attr('hidden', true)
                                break;

                            default:
                                resultado.forEach(element => {
                                    id = element.id
                                    numero_telefono = element.telefono
                                    plantilla += `
                                    <tr>
                                        <td>${element.primer_nombre}</td>
                                        <td>${element.numero_documento}</td>
                                    </tr>
                                `
                                    //plantilla += `<label>ID: ${element.id} Nombre: ${element.nombre} Identificacion: ${element.identificacion}</label>`
                                })
                                $('#paciente_id').attr('value', id)
                                $('#form-body').attr('hidden', false)
                                $('#tablePaciente').attr('hidden', false)
                                $('label[name=check-label]')[0].innerText = `¿El paciente ha sido notificado? (Numero telefonico del paciente: ${numero_telefono})`
                                $('#tbody').html(plantilla)
                                break;
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>