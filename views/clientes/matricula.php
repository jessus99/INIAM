<?php
?>
<div class="card bg-light mb-3 mx-auto" style="width:50%">
        <div class="card-header">Matricular Carrera</div>
        <div class="card-body">
                <form id="form_registro_carreras" action="" method="POST">
                        <input type="hidden" name="action" value="insertar">
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                        <div class="modal-body">

                        

                        


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

                                <input type="submit" id="btn_regist" value="Registrar" class="btn btn-outline-success">
                        </div>
                </form>
        </div>
</div>
<div class="container">

</div>