$(document).ready(function () {
    $('#buscar3').on('click', function (e) {
        e.preventDefault()
        let identificacion = $('#documento-3').val()

        $.ajax({
            type: "post",
            url: "validacion_progMuestra.php",
            data: {
                identificacion
            },
            success: function (response) {
                console.log(response);
                let res = JSON.parse(response)
                switch (res[0]) {
                    case 'ok':
                            let plantilla
                            res[1].forEach(element => {
                                $('#f_programacion').val(element.fecha_programacion)
                                $('#fecha_realizacion').attr('min',element.fecha_programacion)
                                fecha_realizacion
                                $('#paciente_id_3').val(element.id)
                                plantilla += `
                                    <tr>
                                        <td>${element.primer_nombre}</td>
                                        <td>${element.numero_documento}</td>
                                    </tr>
                                `
                            });
                            $('#tablePaciente3').attr('hidden',false)
                            $('#tbody-3').html(plantilla)
                            $('#contenido').attr("hidden",true);
                            $('#form-body-3').attr("hidden",false);
                        break;
                    case '!found':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Paciente no encontrado',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 'found':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Este paciente ya tiene una ingresada la fecha de realizacion de la toma de muestra',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 'err':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Ha ocurrido un error de consulta',
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
                            text: 'Ha este paciente aun no tiene asignada una fecha de programacion',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 'empty':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Debe ingresar un numero de documento para realizar una busqueda',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                }
            }
        });

    })

    $('#fecha_realizacion').on('change',function() {
        
        let fecha_realizacion = $('#fecha_realizacion').val()
        let f_programacion = $('#f_programacion').val()

        if(f_programacion > fecha_realizacion){
            swal({
                type: 'error',
                title: "ERROR",
                text: 'La fecha de realizacion no puede ser menor a la fecha de programacion',
                button: "Aceptar",
                icon: "error",
                button: "Aceptar",
                animation: false,
                customClass: 'animated heartBeat'
            })

            $('#guardar-complemento').attr('disabled',true)
        }else{
            $('#guardar-complemento').attr('disabled',false)

        }

    })

    $('#guardar-complemento').on('click',function (e) {
        e.preventDefault()

        let paciente_id = $('#paciente_id_3').val()
        let fecha_realizacion = $('#fecha_realizacion').val()
        let visita_exitosa = $('#visita_exitosa').val()
        let tipo_prueba = $('#tipo_prueba').val()
        let observacion = $('#observacion').val()

        let datos = {
            paciente_id,
            fecha_realizacion,
            visita_exitosa,
            tipo_prueba,
            observacion
        }

        console.log(datos);

        $.ajax({
            type: "post",
            url: "ingreso_progMuestra_complemento.php",
            data: datos,
            success: function (response) {
                console.log(response);
                let res = JSON.parse(response)

                switch (res[0]) {
                    case 'ok':
                        swal({
                            type: 'success',
                            title: "Exito",
                            text: 'Datos guardados exitosamente',
                            button: "Aceptar",
                            icon: "success",
                            button: "Aceptar",
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        
                        $('#form-body-3').hide()
                        $('#tablePaciente3').attr('hidden',true)
                        $('#modalFechaRealizacion').modal('hide')
                        $('#form-container-3')[0].reset()
                        break;
                    case 'bad':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Ha este paciente ya se la ha ingresado una fecha de realizacion',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 'empty':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Todos los campos son obligatorios',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                }
            }
        });
    })
});
