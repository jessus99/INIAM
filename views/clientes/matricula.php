<?php
?>
<div class="card bg-light mb-3 mx-auto" style="width:50%">
        <div class="card-header">Registrar Materia</div>
        <div class="card-body">
                <form id="form_registro_carreras" action="" method="POST">
                        <input type="hidden" name="action" value="insertar">
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                        <div class="modal-body">

                        <div class="form-group">
                                <label for="exampleSelect2">Seleccione</label>
                                <select  class="form-select" name="nombre_carrera" id="exampleSelect2">
                                        <option value="3">Excel</option>
                                        <option value="4">word</option>
                                        <option value="5">ofimatica</option>
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

                                <input type="submit" id="btn_regist" value="Registrar" class="btn btn-outline-success">
                        </div>
                </form>
        </div>
</div>
<div class="container">

</div>