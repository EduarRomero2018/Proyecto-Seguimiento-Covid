<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylos_formulario.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/stylos_formulario.css">
</head>
<body>
    <div class="linea1"></div>
    <div class="linea2"></div>
    <div class="linea3"></div>

    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-5 mt-5">
            <div class="card col-md-6 shadow">
                <div class="card-body">
                    <form>
                        <h4>Asignacion de pacientes a usuarios</h4>
                        <div class="form-group">
                            <label>Seleccionar en que proceso desea asignar</label>
                            <select id="asignacion" class="custom-select">
                                <option value="">Seleccionar proceso</option>
                                <option value="programacion">programacion</option>
                                <option value="seguimiento">seguimiento</option>
                                <option value="resultado">resultado</option>
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
                            <h3 id="cantidad_pacientes_text"></h3>
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
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {

        $('#asignacion').on('change', function(){
            if(this.value != ''){
                let asignacion = this.value

                $('#cantidad_pacientes').val('') 

                $.ajax({
                    type: "post",
                    url: "asignacion2.php",
                    data: {asignacion},
                    success: function (response) {
                        let result = JSON.parse(response)
                        console.log(result);
                        switch (result[0]) {
                            case 'ok':
                                let plantilla = `<option value="">Seleccione una opcion</option>`
                                result[2].forEach(usuarios => {
                                    plantilla += `
                                        <option value="${usuarios.id}">${usuarios.nombre_apellido}</option>
                                    `
                                })

                                $('#id_usuario').html(plantilla)

                                result[1].forEach(pacientes => {
                                   $('#cantidad_pacientes').attr('max',pacientes.cantidad_pacientes) 
                                   $('#cantidad_pacientes_text').text(`Cantidad de pacientes sin asignar: ${pacientes.cantidad_pacientes}`)
                                });

                                $('div[name="hidden"]').attr('hidden', false)
                            break;
                        
                            case '!found':
                                $('div[name="hidden"]').attr('hidden', true)
                                Swal.fire(
                                    'Mensaje!',
                                    `No se encontraron pacientes disponibles para el proceso seleccionado`,
                                    'info'
                                )
                            break;

                            case '!found_usuarios':
                                $('div[name="hidden"]').attr('hidden', true)
                                Swal.fire(
                                    'Mensaje!',
                                    `No se encontraron usuarios con el rol seleccionado (${asignacion})`,
                                    'info'
                                )
                            break;
                        }
                    }
                });
            }else{
                Swal.fire(
                    'Error!',
                    'Campo proceso de asignacion es obligatorio',
                    'warning'
                )

                $('div[name="hidden"]').attr('hidden', true)
            }
        })

        $('#asignar').on('click', function(e){
            e.preventDefault()

            let id_usuario = $('#id_usuario').val()
            let cantidad_pacientes = $('#cantidad_pacientes').val()
            let proceso = $('#asignacion').val()
            
            if (id_usuario != '' && cantidad_pacientes != '') {
                $.ajax({
                    type: "post",
                    url: "asignacion2.php",
                    data: {id_usuario,cantidad_pacientes,proceso},
                    success: function (response) {
                        let result = JSON.parse(response)
                        console.log(result);

                        switch (result[0]) {
                            case 'ok':
                                let cantidad_pacientes = result[1]
                                Swal.fire(
                                    'Tarea realizada!',
                                    'Pacientes asignados exitosamente',
                                    'success'
                                )

                                $('#cantidad_pacientes').attr('max',cantidad_pacientes) 
                                $('#cantidad_pacientes').val('') 
                                $('#cantidad_pacientes_text').text(`Cantidad de pacientes sin asignar: ${cantidad_pacientes}`)
                            break;
                        
                            default:
                                break;
                        }
                    }
                });
            }else{
                Swal.fire(
                    'Error!',
                    'Campo todos los campos son obligatorio',
                    'warning'
                )
            }
        })
    });
</script>
</html>