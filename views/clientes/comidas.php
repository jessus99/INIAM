<?php
?>
<div class="card bg-secondary mb-3 mx-auto" style="width:50%">
  <div class="card-header">Agregar Comida</div>
  <div class="card-body">
      <form id="form_registro_comidas" action="" method="POST" >
            <input type="hidden" name="action" value="insertar">
            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
            <div class="modal-body">
                            
                                <div class="form-group">
                                     <label for="nombre">Nombre: </label>
                                        <input type="text" id="nombre" class="form-control" name="nombre" required="required" pattern="[A-Za-z ]+"  placeholder="Nombre del alimento">
                                </div>
                                <div class="form-group">
                                     <label for="cantidad">Cantidad: </label>
                                        <input type="number" id="cantidad" class="form-control" name="cantidad" required="required" pattern="[A-Za-z ]+"  placeholder="Cantidad en gramos">
                                </div>
             
                        <div class="form-group">
                            <label for="calorias">Calorías:</label>
                            <input type="number" class="form-control" id="" name="calorias" required="required" placeholder="Cantidad de calorías">
                         
                        </div> 
                        
                <div class="form-group">
      <label for="exampleSelect2">Tipo de Alimento:</label>
      <select  class="form-select" name="tipo" id="exampleSelect2">
        <option value="1">Carbohidratos</option>
        <option value="2">Proteínas</option>
        <option value="3">Grasas</option>
      </select>
    </div>
                        
                <div id="mensajes_ok_comidas" style="display:none">
        <div class="alert alert-dismissible alert-success">
  <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
  <p id="txt_mensaje_comida"></p>
</div>
    </div>
                <div id="mensajes_error_comidas" style="display:none">
        <div class="alert alert-dismissible alert-danger">
  <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
  <p id="txt_mensaje_comida_error"></p>
</div>
    </div>
 
                
            </div>
                <div class="">
              
                        <input type="submit"  id="btn_regist" value="Registrar" class="btn btn-primary">
                </div>
        </form>
   </div>
</div>
<div class="container">
    
</div>

