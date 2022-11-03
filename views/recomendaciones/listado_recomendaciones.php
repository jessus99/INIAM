<?php

?>
<div id="content" class='content overflow-auto'style='margin:10px 10px; min-width:600px; max-width:600px;'>
    <h4>Listado de Recomendaciones</h4>
    <div class="overflow-auto">
<table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
  <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
    <tr>
      
      <th class='size' scope="col">Id</th>
      <th class='size'  scope="col">Tipo</th>
      <th class='size'  scope="col">Estado</th>
      <th class='ajust' scope="col">Titulo</th>
      <th class='ajust' scope="col">Asunto</th>
      <th class='ajust' scope="col">Fecha</th>
      <th class='ajust' scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody>
      <?php
     $position=0;  
     
   if($respuesta_recomendaciones){
    foreach ($respuesta_recomendaciones as $a) {
       
       
                    ?>
           
    <tr class="table-primary" style="height:10%;">
      
      <td class='size'><?php echo $a['id']; ?></td>
        
      <td class='size' ><?php echo $a['tipo']; ?></td>
      <td class='ajust'><?php echo $a['estado']; ?></td>
      <td class='ajust'><?php echo $a['titulo']; ?></td>
      <td class='ajust'><?php echo $a['asunto']; ?></td>
      <td class='ajust'><?php echo $a['fecha']; ?></td> 
      <td class='ajust'><input type="button" class="btn btn-danger" onclick="fn_eliminar_recomendacion(<?=$a['id']?>)" value="Eliminar"></td>
    </tr>
    <?php $position++;
            }
            
    }?> 
  </tbody>
</table>
      <?php
      if(!$respuesta_recomendaciones){
          echo"<div style='color:red'> No hay datos que mostrar</div>";
      }
      ?>
</div>
</div>
