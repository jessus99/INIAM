<?php

?>
<div class="card bg-secondary mb-3 mx-auto col-lg-7 col-md-12" style="margin-top:10px">
<div class="container" id="conversacion">
    
</div>


  <div class="card-header">Mensaje</div>
  <div class="card-body">
      <form id="form_registro_mensajes" action="" method="POST" >
            <input type="hidden" name="action" value="insertar">
            <input type="hidden" name="idemisor" value="<?=$_SESSION['id']?>">
            <div class="modal-body">
                            
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
if($respuesta['perfil']=="Digitador" ||$respuesta['perfil']=="Administrador"){
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
              
                        <input type="submit"  id="btn_regist" value="Enviar" class="btn btn-primary">
                </div>
        </form>
   </div>
</div>

