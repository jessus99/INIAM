<?php
?>
<div id="card_principal" class="row mx-auto overflow-hidden" style="border-radius:15px; background:#bee5eb; height:0px">
    
        <div id="card_info" class="col-lg-5 card text-white bg-primary mx-auto mb-3" style="margin:10px; max-height:500px;">
  <div class="card-header">Usuario Cliente</div>
  <div class='card-body'>
    <h4 class='card-title' id='nombre_title'>Nombre de Usuario</h4>
    <h5 id='id_title'>Id</h5>
    <div class='col-lg-6 float-left mx-auto'><img src='./images/users/usuario.png' alt='alt' style='border-radius:50%;width:200px;height:200px'/></div>
    <div>
        <button class='btn btn-info mt-3' style="min-width:200px" onclick='fn_mensajes()'> Mensajes</button><br/>
        <button class='btn btn-success mt-3' style="min-width:200px" onclick='fn_carreras()'> Carreras</button><br/>
 </div>
    </div>
        </div> <div class="col-lg-5" id="loads">
            
        </div>
   
</div>
<div id="content" class='content overflow-auto col-lg-10 mx-auto'style='margin:20px'>
    <h4>Listado de Clientes</h4>
    <div class="overflow-auto">
<table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
  <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
    <tr>
      
      <th class='size' scope="col">Id</th>
      <th class='size'  scope="col">Nombre</th>
      <th class='size'  scope="col">Apellidos</th>
      <th class='ajust' scope="col">Email</th>
      <th class='ajust' scope="col">Perfil</th>
      <th class='ajust' scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody>
      <?php
    
   
    foreach ($respuesta_clientes as $a) {
       if($a['perfil']=='Cliente'){
       
                    ?>
           
    <tr class="table-primary" style="height:10%;">
      
      <td class='size'><?php echo $a['id']; ?></td>
        <td class='size' id='id_model' ><?php echo $a['name']; ?></td>
      <td class='size' ><?php echo $a['lastname']; ?></td>
      <td class='ajust'><?php echo $a['email']; ?></td>
      <td class='ajust'><?php echo $a['perfil']; ?></td>
      <td class='ajust'><button class='btn btn-primary' onclick='fn_cargar(<?php echo json_encode($a)?>)'> Ver detalles</button></td>
    </tr>
    <?php 
       }
            }?> 
  </tbody>
</table>
</div>
</div>

