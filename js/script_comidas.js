$(document).ready(function(){

$('#form_registro_comidas').submit(registrarComida);
 

});

  
function fn_cerrar(){
    
   $('#mensajes_error_comidas').css("display","none");
   $('#mensajes_ok_comidas').css("display","none");
}

function registrarComida(evento) {
        evento.preventDefault();
      alert("Registrando comida");
        var datos = new FormData($('#form_registro_comidas')[0]);
      
        $.ajax({
            url: "controllers/comidasController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
              alert(response)
                if (response==true) {
                    $('#mensajes_ok_comidas').css("display","block");
                    $('#txt_mensaje_comida').text("Alimento registrado con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./?pagina=comidas"
                        }, 1000);
                } else {
                    $('#mensajes_error_comidas').css("display","block");
                    $('#txt_mensaje_comida_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
    }
function fn_eliminar(data){
    
  
    $.ajax({
            url: "controllers/comidasController.php",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
              alert(response)
                if (response==true) {
                    $('#mensajes_ok_comidas').css("display","block");
                    $('#txt_mensaje_comida').text("Alimento registrado con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./?pagina=comidas"
                        }, 1000);
                } else {
                    $('#mensajes_error_comidas').css("display","block");
                    $('#txt_mensaje_comida_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
}
