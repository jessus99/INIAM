$(document).ready(function(){
$('#formindex').submit(Insertar_usuario);
$('#form_registro').submit(registrar);
$('#btnmensaje').click(cerrarventana);

});
function cerrarventana(){
   $('#mensajeserror').css("display","none");
   $('#mensajesok').css("display","none");
}
function Insertar_usuario(evento) {
    
        evento.preventDefault();
        var datos = new FormData($('#formindex')[0]);
      
        $.ajax({
            url: "controllers/userController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
              alert(response);
                if (response==true) {
                   window.location.href="./"
                } else {
                    $('#mensajeserror').css("display","block");
                    $('#txt_mensaje').text("La contraseña y usuario no coinciden");
                }
            }



        });
    }
    function registrar(evento) {
        evento.preventDefault();
      
        var datos = new FormData($('#form_registro')[0]);
      
        $.ajax({
            url: "controllers/userController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
              
                if (response==true) {
                    $('#mensajesokregistro').css("display","block");
                    $('#txt_mensaje_registro').text("Datos registrados con éxito");
                  window.setTimeout(function () {
                      
                            window.location.href = "./"
                        }, 2000);
                } else {
                    $('#mensajeserrorregistro').css("display","block");
                    $('#txt_mensaje_registro_error').text("Error al ingresar datos, verifique todos los espacios");
                }
            }



        });
    }
    
