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
                                <label for="exampleSelect2">nombre_carrera</label>
                                <select  class="form-select" name="nombre_carrera" id="exampleSelect1">
                                        <option value="Excel">Excel</option>
                                        <option value="word">word</option>
                                        <option value="ofimatica">ofimatica</option>
                                </select><br>
                                <label for="exampleSelect2">nombre_profesor</label>
                                <select  class="form-select" name="nombre_profesor" id="exampleSelect2">
                                        <option value="Jesus Hernandez">Jesus Hernandez</option>
                                        <option value="Carlos Valverde">Carlos Valverde</option>
                                </select>
                                </select><br>
                                <label for="exampleSelect2">Horario</label>
                                <select  class="form-select" name="horario" id="exampleSelect3">
                                        <option value="8:00 am">8:00 am</option>
                                        <option value="11:00 am">11:00 am</option>
                                        <option value="13:00 pm">13:00 pm</option>
                                        <option value="18:00 pm">18:00 pm</option>
                                </select>
                                </select><br>
                                <label for="exampleSelect2">Tipo</label>
                                <select  class="form-select" name="tipo" id="exampleSelect4">
                                        <option value="Diurna">Diurna</option>
                                        <option value="Nocturna">nocturna</option>
                                </select>
                                </div>
                                

                        


                                <div id="mensajes_ok_carreras" style="display:none">
                                        <div class="alert alert-dismissible alert-success">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_carrera"></p>
                                        </div>
                                </div>
                                <div id="mensajes_error_carreras" style="display:none">
                                        <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="" id="msj_cerrar" data-bs-dismiss="alert" onclick="fn_cerrar()">X</button>
                                                <p id="txt_mensaje_carrera_error"></p>
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