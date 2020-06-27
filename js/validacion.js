$(document).ready(function (){
    $('#consultar_paciente').on('click',function() {
        console.log('validaciones.js funciona')
        let documento = $('#documento')[0].innerText
        // console.log($('#documento'))
        // console.log(documento)
        $.ajax({
            type: 'POST',
            url: 'validacion.php',
            data: {documento},
            success: function (res){
                let resultado = JSON.parse(res)
                switch (resultado[0]) {
                    case 0:
                        muestra_oculta('contenido')
                        break;

                    case 1:
                        swal({
                            type: 'error',
                            title: "ERROR",
                            text: resultado[1],
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