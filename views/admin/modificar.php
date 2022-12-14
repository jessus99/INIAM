  <div class="modal fade secondary" id="modalmodificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_modificar" action="" method="POST">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="id" value="" id="idu">
          <div class="modal-body">

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" id="nombreu" class="form-control" name="nombre" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
              <label for="apellidos">Apellidos: </label>
              <input type="text" id="apellidosu" class="form-control" name="apellidos" required="required" pattern="[A-Za-z ]+" placeholder="Ingrese su nombre">
            </div>

            <div class="form-group">
              <label for="email">Correo Electrónico: </label>
              <input type="email" class="form-control" id="emailu" name="email" required="required" placeholder="Ingrese su correo electrónico">

            </div>



            <div class="form-group">
              <label for="exampleSelect2">Seleccione</label>
              <select class="form-select" name="perfil" id="perfilu">
                <option value="3">Administrador</option>
                <option value="1">Cliente</option>
                <option value="2">Digitador</option>
                <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 1) { ?>
                  <option value="1">Administrador</option>
                <?php } ?>
              </select>
            </div>

            <div id="mensajesokregistro" style="display:none">
              <div class="alert alert-dismissible alert-success">
                <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
                <p id="txt_mensaje_registro"></p>
              </div>
            </div>
            <div id="mensajeserrorregistro" style="display:none">
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="" id="btnmensaje" data-bs-dismiss="alert">X</button>
                <p id="txt_mensaje_registro_error"></p>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" id="btn_regist" value="Registrar" class="btn btn-secondary">
          </div>
        </form>
      </div>
    </div>
  </div>