$(document).ready(function () {
    $('#complemento').on('click', function () {
        let paciente_id = $('#paciente_id').val()

        $.ajax({
            type: "post",
            url: "validacion_progMuestra.php",
            data: {
                paciente_id
            },
            success: function (response) {
                let res = JSON.parse(response)
                console.log(res);
                switch (res[0]) {
                    case 'ok':
                            res[1].forEach(element => {
                                $('#f_programacion').val(element.fecha_programacion)
                            });

                            $('#contenido').attr("hidden",true);
                            $('#trescampos').attr("hidden",false);
                        break;
                    case '!found':
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
                            text: 'Este paciente ya tiene una fecha de realizacion ingresada',
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
        
        let paciente_id = $('#paciente_id').val()
        let fecha_realizacion = $('#fecha_realizacion').val()
        let visita_exitosa = $('#visita_exitosa').val()
        let observacion = $('#observacion').val()

        let datos = {
            paciente_id,
            fecha_realizacion,
            visita_exitosa,
            observacion
        }

        $.ajax({
            type: "post",
            url: "ingreso_progMuestra_complemento.php",
            data: datos,
            success: function (response) {
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

                        $('#trescampos').attr("hidden",true);
                        $('#form-TM-2')[0].reset()
                        break;
                    case 'bad':
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: 'Ha este paciente ya ',
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    default:
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
                        break;
                }
            }
        });

    })
});
