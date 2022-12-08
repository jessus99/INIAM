function fn_cargar(datos){
  
  $("#nombre_title").text(datos['name']);
  $("#id_title").text(datos['id']);
  $("#card_principal").css("height","auto");
  
}
function fn_mensajes(){
    let div=document.getElementById('loads');
    div.style.color="white";
    let data={
    "hidden":"item"
    }
   
    $.ajax({
            url: "controllers/accesos.php?pagina=cargas",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
             
              
                if (response) {
                   div.innerHTML=response;
                } else {
                   
                }
            }



        });
}
function fn_carreras(){
    var id= $("#id_title").text();
   let div=document.getElementById('loads');
   div.style.color="white";
    let data={
    "action":"cargarTodas",
    "idUsuario":id
    }
   
    $.ajax({
            url: "controllers/accesos.php?pagina=carreras",
            type: "POST",
            datatype: "html",
            data: data,
                        success: function (response) {
              
              if(response!=false){
              let datos=JSON.parse(response);
              
              $.ajax({
            url: "views/carreras/lista_carreras.php?cargar=tabla",
            type: "POST",
            datatype: "json",
            data: {json: JSON.stringify(datos)},
                        success: function (response) {
             

              
                if (response) {
                   div.innerHTML=response;
                } else {
                   div.innerHTML="ERROR DE CARGA";
                }
            }

         });
         
                        }else {
                    div.innerHTML="Debe seleccionar un ID de la lista de usuarios";
                   div.style.color="red";
                   
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
       
                if (response==true) {
                    alert("Eliminado con exito");
                  window.setTimeout(function () {
                      
                           fn_carreras();
                        }, 1000);
                } else {
                   alert("Error al eliminar");
                }
            }



        });
}

function fn_cerrar_box(){
    let element =document.getElementById('box_mensajes');
    let elemento =document.getElementById('content');
    elemento.remove();
    element.remove();
}

