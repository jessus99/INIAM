

  function fn_enviar_mensaje(){
      registrarComida();
  }


function registrarComida() {
       
    alert("ingresando mensaje");
        var datos = new FormData($('#form_profesionales_mensajes')[0]);
      
        $.ajax({
            url: "controllers/mensajesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
             
                if (response==true) {
                     
                  
                      $("#asunto").val(" ");
                      $("#respuestaMensajes").css("color","green");
                      $("#respuestaMensajes").text("Mensaje enviado...");
                       $("#mensaje").val(" ");
                           cerrar_conver();
                        
                } else {
                    $("#respuestaMensajes").css("color","red");
                      $("#respuestaMensajes").text("Error al enviar mensaje...");

                }
            }



        });
    }
function fn_ver(data){
    var param={
        "id":data,
        "action":"listar"
    }
    $.ajax({
            url: "controllers/mensajesController.php",
            type: "POST",
            datatype: "html",
            data: param,
            success: function (response) {
             
                var conversacion=document.getElementById('conversacion');
                
                conversacion.innerHTML=response;
            }



        });
}
function cerrar_conver(){
    
    var conversacion=document.getElementById('conversacion');
                
                conversacion.innerHTML=" ";
}
function fn_cerrar_mensaje(){
    let element =document.getElementById('box_mensajes');
    let elemento =document.getElementById('content');
    elemento.remove();
    element.remove();
}