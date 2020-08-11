$(document).ready(function () {

    $('#entrega_kits').on('change',function () { 
        if (this.value == 'No') {
           $('#div-fecha_entrega_kits').attr('hidden', true)
        }else{
           $('#div-fecha_entrega_kits').attr('hidden', false)
        }
    })

    $('#oxigeno_terapia').on('change', function () {  
        if ($('#oxigeno_terapia').val() == 'Si') {
            $('#div-tipo_flujo').attr('hidden', false)
        } else {
            $('#div-tipo_flujo').attr('hidden', true)
        }
    })

    $('select[name="sintomas"]').on('change',function(){
        let sintomas = 0
        for (const iterator of $('select[name="sintomas"]')) {
            if(iterator.value == 'Si'){
                sintomas += 1
            }

            if(sintomas != 0){
                $('#asintomatico').val('No')
                $('#asintomatico').text('No')
            }else{
                $('#asintomatico').val('Si')
                $('#asintomatico').text('Si')
            }
        }
    })

    $('#antecedentes_viaje').on('change',function(){
        if($('#antecedentes_viaje').val() == 'NO'){
            $('#viaje').attr('hidden', true)
        }else{
            $('#viaje').attr('hidden', false)
        }
    })

    $('#continuar').on('click', function (e) {
        e.preventDefault()
        let paciente_id = $('#paciente_id').val()
        $.ajax({
            type: 'post',
            url: 'validarComplemento.php',
            data: {
                paciente_id
            },
            success: function (res) {
                let resultado = JSON.parse(res)
                console.log(res);

                switch (resultado[0]) {
                    case 'ok':
                        if ($('#form-seguimiento').is(':hidden') == true) {
                            $('#form-seguimiento').attr('hidden', false)
                            $('#contenido').attr('hidden',true)
                            $('#complemento_seg_id').attr('value', resultado[1])
                        }
                        else {
                            $('#form-seguimiento').attr('hidden', true)
                            console.log(resultado[1])
                        }
                        break;

                    case 'primera_vez':
                        $('#contenido').attr('hidden',false)
                        break;
                }
            }
        })
    })

    $('#guardarSeguimiento').on('click', function (e) {
        e.preventDefault()

        let complemento_seg_id = $('#complemento_seg_id').val()
        let paciente_id = $('#paciente_id').val()
        let asintomatico = $('#asintomatico').val()
        let fecha_sintomas = $('#f_sintomas').val()
        let fiebre_cuantificada = $('#fiebre_cuantificada').val()
        let tos = $('#tos').val()
        let dificultad_respiratoria = $('#dificultad_respiratoria').val()
        let odinofagia = $('#odinofagia').val()
        let fatiga_adinamia = $('#fatiga_adinamia').val()
        let cumple_criterio = $('#cumple_criterio').val()
        let comorbilidad = $('#comorbilidad').val()
        let entrega_kits = $('#entrega_kits').val()
        let fecha_entrega_kits = $('#fecha_entrega_kits').val()
        let oxigeno_terapia = $('#oxigeno_terapia').val()
        let tipo_flujo = $('#tipo_flujo').val()
        let ambito_atencion = $('#ambito_atencion').val()
        let saturacion_oxigeno = $('#saturacion_oxigeno').val()
        let id_usuario = $('#id_usuario').val()

        if (fecha_sintomas == '') {
            fecha_sintomas = 'NULL'
        }

        if(entrega_kits == 'No'){
            fecha_entrega_kits = 'NULL'
        }

        if(oxigeno_terapia == 'No'){
            tipo_flujo = 'NULL'
        }
        
        let datos = {
            complemento_seg_id,
            paciente_id,
            id_usuario,
            asintomatico,
            fecha_sintomas,
            fiebre_cuantificada,
            tos,
            dificultad_respiratoria,
            odinofagia,
            fatiga_adinamia,
            cumple_criterio,
            comorbilidad,
            entrega_kits,
            fecha_entrega_kits,
            oxigeno_terapia,
            tipo_flujo,
            ambito_atencion,
            saturacion_oxigeno
        }

        console.log(datos);


        $.ajax({
            type: 'post',
            url: 'ingresar_seguimiento.php',
            data: datos,
            success: function (res) {
                console.log(res)
                let resultado = JSON.parse(res)
                console.log(resultado)
                switch (resultado) {
                    case 'empty':
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Todos los campos son obligatorios",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                        case 'different':
                            swal({
                                type: 'error',
                                title: "Error",
                                text: "el campo Saturacion de oxigeno debe ser numerico",
                                button: "Aceptar",
                                icon: "error",
                                button: "Aceptar",
                                timer: 7000,
                                animation: false,
                                customClass: 'animated heartBeat'
                            })
                            break;
                    case 'ok':
                        swal({
                            type: 'success',
                            title: "Exito",
                            text: "Datos guardados correctamente",
                            button: "Aceptar",
                            icon: "success",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#form-seguimiento').attr('hidden', true)
                        $('#tbl_paciente').attr('hidden', true)
                        break;

                    case 'primera_vez':
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Ha ocurrido un error al intentar guardar los datos",
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
        })
    })

    $('#guardar').on('click', function (e) {
        e.preventDefault()

        let tipo_contacto = $('#tipo_contacto').val()
        let paises_ciudades = $('#paises_ciudades').val()
        let antecedentes_viaje = $('#antecedentes_viaje').val()
        let id_usuario = $('#id_usuario').val()
        let paciente_id = $('#paciente_id').val()
        let fecha_atencion_medica_domiciliaria = $('#fecha_atencion_medica_domiciliaria').val()
        let atencion_medica_domiciliaria = $('#atencion_medica_domiciliaria').val()
        let realizacion_hemograma = $('#realizacion_hemograma').val()

        let datos = {
            tipo_contacto,
            paises_ciudades,
            antecedentes_viaje,
            id_usuario,
            fecha_atencion_medica_domiciliaria,
            atencion_medica_domiciliaria,
            realizacion_hemograma,
            paciente_id
        }

    console.log(datos);

        $.ajax({
            type: 'post',
            url: 'ingreso_complemento.php',
            data: datos,
            success: function (res) {
                let resultado = JSON.parse(res)
                console.log(resultado)

                switch (resultado) {
                    case 'empty':
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Todos los campos son obligatorios",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })

                        break;
                    case 1:
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Ha este paciente ya se le han tomado estos datos",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        break;
                    case 2:
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Este paciente aun no tiene programada la toma de muestra",
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
                            title: "Error",
                            text: "Ha ocurrido un error al intentar guardar los datos",
                            button: "Aceptar",
                            icon: "error",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })

                        break;
                    case 'ok':
                        swal({
                            type: 'success',
                            title: "Exito",
                            text: "Datos guardados con exito",
                            button: "Aceptar",
                            icon: "success",
                            button: "Aceptar",
                            timer: 7000,
                            animation: false,
                            customClass: 'animated heartBeat'
                        })
                        $('#contenido').attr('hidden',true)
                        break;
                    default:
                        swal({
                            type: 'error',
                            title: "Error",
                            text: "Ha ocurrido un error en la consulta",
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
        })
    })
})