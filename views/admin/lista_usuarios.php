<?php

?>
<div id="content" class='content overflow-auto' style='margin:50px 50px;'>
  <h4>Lista de Usuarios</h4>
  <div id="msj"></div>
  <input type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalregistro" value="Agregar">

  <div class="overflow-auto">
    <table id='tbl_product' class="table table-hover table-bordered table-responsive-md">
      <thead style='background-color: #1672D9; color:white; font-weight: 500'>
        <tr>
          <th class='size' scope="col">Id</th>
          <th class='size' scope="col">Nombre</th>
          <th class='size' scope="col">Apellidos</th>
          <th class='size' scope="col">Email</th>
          <th class='size' scope="col">Contraseña</th>
          <th class='ajust' scope="col">Perfil</th>
          <th class='ajust' scope="col">Acciones</th>

        </tr>
      </thead>
      <tbody id="tbody">
        <?php

        if (isset($respuestaUsuarios)) {
          foreach ($respuestaUsuarios as $a) {


        ?>

            <tr class="table-primary" style="height:10%;">
              <td class='size'><?php echo $a['id']; ?></td>
              <td class='size'><?php echo $a['name']; ?></td>
              <td class='size' id='id_model'><?php echo $a['lastname']; ?></td>
              <td class='size'><?php echo $a['email']; ?></td>
              <td class='size'><?php echo $a['password']; ?></td>
              <td class='ajust'><?php echo $a['perfil']; ?></td>
              <td class='ajust'><input type="button" class="btn btn-outline-danger" onclick="fn_eliminar_usuario(<?= $a['id'] ?>)" value="Eliminar">
                <button class="btn btn-outline-success" onclick='fn_edit_user(<?php echo json_encode($a) ?>)' data-toggle="modal" data-target="#modalmodificar">Modificar</button>
              </td>
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>