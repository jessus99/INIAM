<?php
session_start();
?>
<div class="card text-white bg-primary mb-3 mx-auto" style="width:100%">
  <div class="card-header"><button class="btn btn-danger" onclick="cerrar_conver()">Cerrar</button></div>
  <div class="card-body overflow-auto" style="max-height: 400px;">
    <?php 
    foreach ($mensajes as $mensaje) {
        
    if($mensaje['idemisor']==$_SESSION['id']){
    ?>
    <p class="card-text ml-0" style="min-height:50px;padding:10px;border-radius:10px; background-color:white; color:black;width:80%;"><?=$mensaje['mensaje']?><p><?= $mensaje['fecha']?></p></p>
    <?php
    
    } else {
        ?>
                <p class="card-text ml-5" style="min-height:50px;padding:10px; border-radius:10px; background-color:gray; color:black;width:80%;"><?=$mensaje['mensaje']?><p><?= $mensaje['fecha']?></p></p>

            <?php
    }
    }
    ?>
  </div>
</div>

