$(document).ready(function () {

    $('#cerrar').on('click', function () {
        $('#tablePaciente2').attr('hidden', true)
        $('#form-body-2').attr('hidden', true)
    })

    $('#fecha_toma').on('change', function () {
        let fecha_toma = $('#fecha_toma').val()
        let fecha_programacion = $('#fecha_programacion').val()
        if (fecha_toma < fecha_programacion) {
            $('#guardarResultado').attr('disabled', true)
            swal({
                type: 'error',
                title: "ERROR",
                text: "La fecha de realizacion de la toma de muestra debe ser mayor o igual a la fecha de programacion",
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                timer: 7000,
                animation: false,
                customClass: 'animated heartBeat'
            })
        } else {
            $('#guardarResultado').attr('disabled', false)
        }
    })

    $('#guardarResultado').on('click', function (e) {
        e.preventDefault()
        let paciente_id_2 = $('#paciente_id_2').val()
        let fecha_toma = $('#fecha_toma').val()
        let resultadoControl = $('#resultadoControl').val()
        if ($('#defaultUnchecked-2').is(':checked') == true) {
            notificado = 'SI'

        }

        $.ajax({
            type: 'POST',
            url: 'ingreso_resultado_control.php',
            data: {
                paciente_id_2,
                fecha_toma,
                resultadoControl,
                notificado
            },
            success: function (res) {
                alert(res)
                let resultado = JSON.parse(res)
                switch (resultado) {
                    case 'empty':
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
                        $('#tablePaciente2').attr('hidden', true)
                        $('#modalTomaMuestraControl').modal('hide')
                        $('#form-body-2').attr('hidden', true)
                        break;
                }
            }
        })
    })
    $('#buscar').on('click', function (e) {
        e.preventDefault()
        let identificacion = $('#documento-2').val()

        $.ajax({
            type: 'post',
            url: 'modal_toma_muestra_resultado.php',
            data: {
                identificacion
            },
            success: function (res) {
                alert()
                alert(res)
                console.log(res);
                let resultado = JSON.parse(res)
                let plantilla = ''
                let id = ''
                let numero_telefono = 0
                
                switch (resultado) {
                    case 'empty':
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
                        $('#tablePaciente2').attr('hidden', true)
                        break;
                    case 1:
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Este paciente ya tiene sus resultados ingresados",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#tablePaciente2').attr('hidden', true)
                        $('#form-body-2').attr('hidden', true)
                        break;
                    case 'null':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Ha este paciente no se le ha programado una fecha para el control toma de muestra",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#tablePaciente2').attr('hidden', true)
                        $('#form-body-2').attr('hidden', true)
                        break;
                    case 0:
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Este documento no esta registrado",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form-body-2').attr('hidden', true)
                        $('#tablePaciente2').attr('hidden', true)
                        break;
                    case 'err':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: "Este paciente ya tiene sus resultados",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form-body-2').attr('hidden', true)
                        $('#tablePaciente2').attr('hidden', true)
                        break;
                    default:
                        resultado.forEach(element => {
                            id = element.id
                            fecha_programacion = element.fecha_programacion
                            numero_telefono = element.telefono
                            plantilla += `
                                <tr>
                                    <td>${element.primer_nombre}</td>
                                    <td>${element.numero_documento}</td>
                                </tr>
                            `
                        })
                        $('#guardarResultado').attr('disabled', true)
                        $('#paciente_id_2').attr('value', id)
                        $('#fecha_programacion').attr('value', fecha_programacion)
                        $('#defaultUnchecked-2').on('click', function () {
                            if ($('#defaultUnchecked-2').is(':checked') == true) {
                                $('#guardarResultado').attr('disabled', false)
                            } else {
                                $('#guardarResultado').attr('disabled', true)
                            }
                        })
                        $('#form-body-2').attr('hidden', false)
                        $('#tablePaciente2').attr('hidden', false)
                        $('label[name=check-label]')[1].innerText = `¿El paciente ha sido notificado? (Numero telefonico del paciente: ${numero_telefono})`
                        $('#tbody-2').html(plantilla)
                        break;
                }
            }
        })
    })
});