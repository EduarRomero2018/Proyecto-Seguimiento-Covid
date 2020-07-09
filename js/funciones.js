
//alert = 'hola desde funciones.js';
//console.log('funciones.js');


function muestra_oculta(id){
  if (document.getElementById){ //se obtiene el id
  var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
  el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
  }

}
  window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
  muestra_oculta('contenido');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
  }

  function muestra_oculta_tres(id){
    if (document.getElementById){ //se obtiene el id
    var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
    el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
    }

  }
    window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
      muestra_oculta_tres('contenido');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
    }

  function busqueda() {
    var texto = document.getElementById("txtnom").value;
    var parametros = {
      "texto" : texto
    };
    $.ajax({
      data: parametros,
      url: "../listar_pacientes.php",
      type: "POST",
      success: function (response) {
        $("#dtBasicExample").html(response);
      }
    });

  }

//CAMBIOS DE AHORA
  function listar_seguimientos(numero_documento){
    //MySql=''
    $.ajax({
      type: "GET",
      url: '../historial_pacientes.php?numero_documento=' + numero_documento,
      contentType: "application/json; charset=utf-8",
      crossDomain: true,
      cache: false,
      success: function (data) {
        //console.log('Succes: ' + data);
        if (data == 'ERROR') {
          console.log('No posee ningun seguimiento ' + data);
          swal({
            allowOutsideClick: false,
            type: 'warning',
            title: 'Atencion',
            text: 'El paciente no posee Seguimiento.. Verifique',
            // footer: '<a href="caminosips.com/faq"></a>'
          }).then((result) => {
            if (result) {
              //location.reload();
            }
          });
          //

        } else {

          $('#Seguimiento_content').html(data);

        }

      },

      error: function (xmlHttpRequest, textStatus, errorThrown) {
        alert("error: " + xmlHttpRequest.responseText);
        location.reload();
      }
    });
  }
