function fn_cambio(data){
    
    var parametros={
        "id":data,
        "action":"actualizar"
    }
    
    $.ajax({
            type: "POST",
            datatype: "html",
            data: parametros,
                        success: function (response) {
              alert(response);
                if (response==true) {
                    
                  window.setTimeout(function () {
                      
                            window.location.href = "./"
                        }, 1000);
                } 
            }



        });
}

