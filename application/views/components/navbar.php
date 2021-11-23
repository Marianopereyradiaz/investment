<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top">
  <a class="navbar-brand" href="<?php echo site_url("funds")?>"><i class="bi bi-piggy-bank-fill text-warning"></i> Mis Inversiones</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if ($role == "admin"){ ?>
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("admin")?>"><i class="bi bi-people-fill text-success"></i> Ver Usuarios <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
      <li class="nav-item active">
      <a class="nav-link" href="<?php echo site_url("users/quotations")?>"><i class="bi bi-coin text-warning"></i> Cotizaciones <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("forum")?>"><i class="bi bi-chat-left-dots-fill text-primary"></i> Foro <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown dropdown-menu-right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-person-fill"></i> <?php echo $logged_user; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url("users")?>">Cambiar Contraseña</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("home")?>">Salir</a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal" text="danger">Eliminar Cuenta</a>
        </div>
      </li>
    </ul> 
  </div>
          	<!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h1>ATENCION</h1>
          <p>¿Seguro desea eliminar el usuario?</p>
          <p>Se eliminará toda su información y sera redirigido al inicio</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="<?php echo site_url("users/delete"); ?>" class="btn btn-danger">Confirmar</a></td>
        </div>
      </div>
    </div>
  </div>
</nav>
<br>