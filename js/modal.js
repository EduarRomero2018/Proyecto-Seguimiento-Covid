//alert ('hola mundo');


$(document).ready(function() {
    $('#buscarPaciente').on('click', function() {
        $('#error').attr('hidden', true)
    })
    $('#fecha_entrega_laboratorio').on('change', function() {
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        if (fecha_entrega_laboratorio != '') {
            $('#fecha_resultado').attr('disabled', false)
        }
        console.log(fecha_programacion)
    })
    $('#fecha_resultado').on('change', function() {
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        let fecha_resultado = $('#fecha_resultado').val()
        if (fecha_resultado < fecha_entrega_laboratorio) {
            swal({
                type: 'error',
                title: "ERROR",
                text: "La fecha de resultado no puede ser menor a la fecha de entrega de laboratorio",
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
    $('#guardar').on('click', function(e) {
        e.preventDefault()
        console.log(this);

        let id = $('#paciente_id').val()
        let fecha_entrega_laboratorio = $('#fecha_entrega_laboratorio').val()
        let fecha_resultado = $('#fecha_resultado').val()
        let resultado2 = $('#resultado').val()
        let notificado = ''
        if ($('#defaultUnchecked').is(':checked') == true) {
            notificado = 'SI'
        } else {
            notificado = 'NO'
        }
        let datos = {
            id,
            fecha_entrega_laboratorio,
            fecha_resultado,
            resultado2,
            notificado
        }
        console.log(datos);

        $.ajax({
            type: 'POST',
            url: 'resultadoTomaDeMuestra.php',
            data: datos,
            success: function(res) {
                console.log(res)
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
                    case 'error':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Ha ocurrido un error de consulta",
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

    $('#buscarPaciente').on('click', function(e) {
        e.preventDefault()
        let identificacion = $('#documento').val()
        $.ajax({
            type: 'post',
            url: 'buscarPaciente.php?buscar=' + identificacion,
            success: function(res) {
                console.log(res);
                let resultado = JSON.parse(res)
                let plantilla = ''
                let id = ''
                let numero_telefono = 0
                let resultado_prueba = ''
                let fecha_entrega_laboratorio = ''
                let fecha_resultado = ''
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
                            text: "Este Paciente aun no se le ha Programado una fecha para toma de Muestra",
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
                            fecha_entrega_laboratorio = element.fecha_entrega_labo
                            fecha_resultado = element.fecha_resultado
                            resultado_prueba = element.resultado
                            plantilla += `
                            <tr>
                                <td>${element.primer_nombre}</td>
                                <td>${element.numero_documento}</td>
                            </tr>
                        `
                            //plantilla += `<label>ID: ${element.id} Nombre: ${element.nombre} Identificacion: ${element.identificacion}</label>`
                        })
                        $('#paciente_id').attr('value', id)
                        if (fecha_entrega_laboratorio != null) {
                            $('#fecha_entrega_laboratorio').attr('value', fecha_entrega_laboratorio)
                            $('#fecha_resultado').attr('value', fecha_resultado)
                            if (resultado_prueba == 'negativo') {
                                $('#resultado')[0][0].innerText = resultado_prueba
                                $('#resultado')[0][0].value = resultado_prueba
                            } else {
                                $('#resultado')[0][0].innerText = resultado_prueba
                                $('#resultado')[0][0].value = resultado_prueba
                            }

                            $('#fecha_entrega_laboratorio').attr('disabled', true)
                            $('#fecha_resultado').attr('disabled', true)
                            $('#resultado').attr('disabled', true)
                            $('#guardar').attr('disabled', true)

                            $('#defaultUnchecked').on('click', function() {
                                if ($('#defaultUnchecked').is(':checked') == true) {
                                    $('#guardar').attr('disabled', false)
                                } else {
                                    $('#guardar').attr('disabled', true)
                                }
                            })
                        }
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