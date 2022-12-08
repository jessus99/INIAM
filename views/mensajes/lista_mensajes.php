<?php

?>
<div id="content" class='content overflow-auto col-md-12'style='margin:10px 10px; min-width:400px; max-width:400px;'>
    <h3>Conversaciones</h3>
    <div class="overflow-auto">
<table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
  <thead style='background-color: #38b6ff; color:white; font-weight: 500'>
    <tr>
      
      <th class='size' scope="col">Asunto</th>
      <th class='size'  scope="col">Emisor</th>
      <th class='size'  scope="col">Receptor</th>
      <th class='ajust' scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody>
      <?php
     $position=0;  
   if($respuesta_mensajes){
    foreach ($respuesta_mensajes as $a) {
       
       
                    ?>
           
    <tr class="table-secondary" style="height:10%;">
      
      <td class='size'><?php echo $a['nombre']; ?></td>
        
      <td class='size' ><?php echo $a['emisor']; ?></td>
      <td class='ajust'><?php echo $a['receptor']; ?></td>
      <td class='ajust'><input type="button" class="btn btn-outline-info" onclick="fn_ver(<?=$a['id']?>)" value="Ver"></td>
    </tr>
    <?php $position++;
   }}?> 
  </tbody>
</table>
      
</div>
</div>

