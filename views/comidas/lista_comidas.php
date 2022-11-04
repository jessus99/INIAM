<?php

if(isset($_GET['cargar'])){
    $resultado=json_decode($_POST['json']);
    
    
     $object =  json_decode( json_encode( $resultado),true);
     $respuesta_comidas=$object;
}
?>
<div id="content" class='content overflow-auto'style='margin:50px 50px;'>
    <h4>Lista de Carreras</h4>
    <div class="overflow-auto">
<table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
  <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
    <tr>
      
      <th class='size' scope="col">Nombre</th>
      <th class='size'  scope="col">Cantidad</th>
      <th class='size'  scope="col">Calorías</th>
      <th class='ajust' scope="col">Tipo</th>
       <th class='ajust' scope="col">Fecha</th>
      <th class='ajust' scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody id="tbody">
      <?php
     $position=0;  
   if(isset($respuesta_comidas)){
    foreach ($respuesta_comidas as $a) {
       
       
                    ?>
           
    <tr class="table-primary" style="height:10%;">
      
      <td class='size'><?php echo $a['nombre']; ?></td>
        <td class='size' id='id_model' ><?php echo $a['cantidad']; ?></td>
      <td class='size' ><?php echo $a['calorias']; ?></td>
      <td class='ajust'><?php echo $a['tipo']; ?></td>
      <td class='ajust'><?php echo $a['fecha']; ?></td>
      <td class='ajust'><input type="button" onclick="fn_eliminar({'id':'<?=$a['id']?>','action':'eliminar'})" value="Eliminar"></td>
    </tr>
    <?php $position++;
            }
   }?> 
  </tbody>
</table>
</div>
</div>
