<?php

?>
<div class="ml-3"> <h2>Bienvenid@, <?= $_SESSION['name']?></h2></div>

<div class="container mx-auto" id="diario">
    <h1>Recomendaciones diarias y adicionales</h1>
    <div class="container row">
    <?php 
    if($respuesta!=false){
    $i=0;
    
    if(isset($respuesta)){
        
     foreach ($respuesta AS $respuestan) {
         if($respuestan['estado']=='pendiente'){
     ?>
    
    <div class="card text-white bg-primary mb-3 mt-5 mx-auto col-lg-3" style="min-width:500px">
  <div class="card-header"><?= $respuestan['titulo']?> <div class="name">Name: <?= $respuestan['name']?></div></div>
  <div class="card-body">
    <h4 class="card-title">Tipo: <?= $respuestan['perfil']?> </h4>
    <h4 class="card-title">De: <?= $respuestan['emisor']?> </h4>
    <p class="card-text"><?= $respuestan['mensaje']?></p>
  </div>
  <select class="form-select mx-auto mb-5" id="seleccionado" style="width:50%" onchange="fn_cambio(<?=$respuestan['id']?>)">
       
        <option value="1" selected='selected'>Pendiente</option>
        <option value="2">Aprobada</option>
        
      </select>
</div>
         <?php $i++;}} } if($i==0){?>
        <h4 class="center" style="color:red;">No tiene Carreras pendientes</h4>
         <?php }?>
</div>
    </div>
<div class="container mx-auto" id="diario">
    <h3>Todas las Carreras</h3>
    <div class="container row">
    <?php if(isset($respuesta)){
        $i=0;
     foreach ($respuesta AS $respuestan) {
         if($respuestan['estado']=='aprobada'){
     ?>
    
    <div class="card text-white bg-success mb-3 mt-5 mx-auto col-lg-3" style="min-width:500px">
  <div class="card-header"><?= $respuestan['titulo']?> <div class="name">Name: <?= $respuestan['name']?></div></div>
  <div class="card-body">
    <h4 class="card-title">Tipo: <?= $respuestan['perfil']?> </h4>
    <h4 class="card-title">De: <?= $respuestan['emisor']?> </h4>
    <p class="card-text"><?= $respuestan['mensaje']?></p>
  </div>
  
</div>
         <?php $i++; }} } if($i==0){?>
        <h4 class="center" style="color:red;">No tiene carreras pendientes</h4>
         <?php }
         
    }?>
</div>
    </div>

<script src="./js/script_inicio.js"></script>