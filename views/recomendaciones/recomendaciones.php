<?php

?>
<div id="box_mensajes" class="card bg-secondary mb-3 mx-auto" style="margin-top:10px">
<div class="container" id="conversacion">
    
</div>


  <div class="card-header">Recomendaciones</div>
  <div class="card-body">
      <form id="form_recomendaciones" action="" method="POST" >
            <input type="hidden" name="action" value="insertar">
            <input type="hidden" name="idEmisor" value="<?=$_SESSION['id']?>">
            <div class="modal-body">
                            <p id="respuestaMensajes"></p>
                                <div class="form-group">
                                     <label for="titulo">Titulo:</label>
                                        <input type="text" id="titulo" class="form-control" name="titulo" required="required" pattern="[A-Za-z ]+"  placeholder="Asunto del mensaje">
                                </div>
                                <div class="form-group">
                                     <label for="asunto">Recomendación: </label>
 <textarea class="form-control" name="asunto" style="height:150px" id="asunto" rows="5"></textarea>                                </div>
             
                       
                        
                <div class="form-group">
      <label for="exampleSelect2">Enviar a:</label>
      <select  class="form-select" name="idReceptor" id="exampleSelect2">
          <?php
          foreach ($respuestaUsuarios as $respuesta) {
if($respuesta['perfil']=="Cliente"){
          ?>
          <option value="<?=$respuesta['id']?>"><?= $respuesta['name'].", ". $respuesta['perfil']?></option>
         <?php
          }
          }
         ?>
      </select>
    </div>
                            <div class="form-group">
      <label for="exampleSelect2">Tipo de recomendación:</label>
      <select  class="form-select" name="tipo" id="exampleSelect2">
          <option value="1">Diaria</option>
          <option value="2">Adicional</option>
          <option value="3">Anterior</option>
      </select>
    </div>
         
         
 
                
            </div>
                <div class="">
              
                        <input type="button"  id="" value="Enviar" onclick="fn_enviar_recomendacion()" class="btn btn-primary">
                        <input type="button"  id="" value="Cerrar" onclick="fn_cerrar_box()" class="btn btn-warning">
                </div>
        </form>
   </div>
</div>
