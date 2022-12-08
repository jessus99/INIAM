$(document).ready(function(){

$('#form_registro').submit(registrar);
$('#form_modificar').submit(modificar);

});
function fn_eliminar_usuario(data){
    
  
    var param={
        "id":data,
        "action":"delete"
    }
    $.ajax({
            url: "controllers/userController.php",
            type: "POST",
            datatype: "html",
            data: param,
            success: function (response) {
            
             if(response==true  ){
                var msj=document.getElementById('msj');
                msj.style.color="green";
                msj.innerHTML="Usuario eliminado con éxito";
                window.setTimeout(function () {
                      
                            window.location.href = "."
                        }, 1000);
                    } else {
                        msj.style.color="red";
                msj.innerHTML="Error eliminando usuario, intente nuevamente";
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
    function modificar(evento) {
        evento.preventDefault();
     
        var datos = new FormData($('#form_modificar')[0]);
      
        $.ajax({
            url: "controllers/userController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
             
                if (response==true) {
                    msj.style.color="green";
                msj.innerHTML="Usuario modificado con éxito";
                    $('#modalmodificar').modal('hide');
                    
                      
                  window.setTimeout(function () {
                      
                            window.location.href = "./"
                        }, 2000);
                } else {
                      msj.style.color="red";
                msj.innerHTML="Error al modificar usuario";
                }
            }



        });
    }
  function fn_edit_user(data){
      var datos=['Cliente','Digitador','admin']
      let perfil;
      for(let i=0;i<=3;i++){
          if(datos[i]==data.perfil){
              perfil=i+1;
          }
          
      }
    
      console.log(data);
       $('#idu').val(data.id);
    $('#nombreu').val(data.name);
    $('#apellidosu').val(data.lastname);
    $('#emailu').val(data.email);
    $('#perfilu').val(perfil);
    

  }