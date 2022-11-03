<?php

?>
<div id="box_mensajes" class="card bg-secondary mb-3 mx-auto" style="margin-top:10px">
<div class="container" id="conversacion">
    
</div>


  <div class="card-header">Mensaje</div>
  <div class="card-body">
      <form id="form_profesionales_mensajes" action="" method="POST" >
            <input type="hidden" name="action" value="insertar">
            <input type="hidden" name="idemisor" value="<?=$_SESSION['id']?>">
            <div class="modal-body">
                            <p id="respuestaMensajes"></p>
                                <div class="form-group">
                                     <label for="asunto">Asunto</label>
                                        <input type="text" id="asunto" class="form-control" name="asunto" required="required" pattern="[A-Za-z ]+"  placeholder="Asunto del mensaje">
                                </div>
                                <div class="form-group">
                                     <label for="cantidad">Mensaje: </label>
 <textarea class="form-control" name="mensaje" style="height:150px" id="mensaje" rows="5"></textarea>                                </div>
             
                       
                        
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
         
 
                
            </div>
                <div class="">
              
                        <input type="button"  id="" value="Enviar" onclick="fn_enviar_mensaje()" class="btn btn-primary">
                        <input type="button"  id="" value="Cerrar" onclick="fn_cerrar_mensaje()" class="btn btn-warning">
                </div>
        </form>
   </div>
</div>

