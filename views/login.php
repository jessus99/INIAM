    <?php
?>
<div class="mx-auto col-lg-6 " style="margin-top:150px;">
    <div id='img_logo'>
           
    <img src="images/logo/INIAM.png" style="border-radius: 0%; width:650px;height:200px; " class="mx-auto d-block" alt="...">
           
        </div>
<div class="card m-2">
<div class="card-header" style="background-color: darkgreen; color: white;" >Ingrese aquí: </div>
<div class="card-body col-lg-10 mx-auto" style=''>
<form class=""  id="formindex" action="" method="POST">
    <input type="hidden" name="action" value="login">
       <div id='img_user'>
           
      <img src="images/users/usuario.png" style="border-radius:50%; width:200px;height:200px; " class="mx-auto d-block" alt="...">
    
           </div>       
           <div class="form-group">
                    <label for="email">Correo electrónico: </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email_inicio">
                  </div>
                    <div class="form-group">
                    <label for="pwd">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" id="pass_inicio">
                    </div>

             
        <div class='container'>
            <input type="submit" id="" class="btn btn-success" style=" " value='Ingresar'>
            <button type="button" id="btnregistro" value="registrar" class="btn btn-secondary" data-toggle="modal" data-target="#modalregistro" >Registrarse</button>
        </div>
    
</form>
    <div id="mensajeserror" style="display:none">
        <div class="alert alert-dismissible alert-danger">
  <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
  <p id="txt_mensaje"></p>
</div>
    </div>
    <div id="mensajesok" style="display:none">
        <div class="alert alert-dismissible alert-success">
  <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
  <p id="txt_mensaje"></p>
</div>
    </div>
</div>     

</div>

</div>
<script src="./js/script_usuarios3.js"></script>
