<?php


?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <a class="navbar-brand" href="" style="max-height:100px;">Administración</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="./">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./?pagina=mensajes">Mensajes</a>
      </li>

      <li class="nav-item">
        <a class="nav-link span" href="./controllers/userController.php?action=logout">Cerrar Sesión</a>
      </li>

    </ul>

  </div>
</nav>