$(document).ready(function(){

$('#form_registro_carreras').submit(registrarCarrera);
 

});

  
function fn_cerrar(){
    
   $('#mensajes_error_carreras').css("display","none");
   $('#mensajes_ok_carreras').css("display","none");
}

function registrarCarrera(evento) {
        evento.preventDefault();
      alert("Registrando carrera");
        var datos = new FormData($('#form_registro_carreras')[0]);
      
        $.ajax({
            url: "controllers/carrerasController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
              alert(response)
                if (response==true) {
                    $('#mensajes_ok_carreras').css("display","block");
                    $('#txt_mensaje_carrera').text("Carrera registrada con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./?pagina=carreras"
                        }, 1000);
                } else {
                    $('#mensajes_error_carreras').css("display","block");
                    $('#txt_mensaje_carrera_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
    }
function fn_eliminar(data){
    
  
    $.ajax({
            url: "controllers/carrerasController.php",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
              alert(response)
                if (response==true) {
                    $('#mensajes_ok_carreras').css("display","block");
                    $('#txt_mensaje_carrera').text("Alimento registrado con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./?pagina=carreras"
                        }, 1000);
                } else {
                    $('#mensajes_error_carreras').css("display","block");
                    $('#txt_mensaje_carrera_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
}
