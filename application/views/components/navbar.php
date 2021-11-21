<nav class="navbar fluid navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="bi bi-house-fill"></i> Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("funds")?>"><i class="bi bi-piggy-bank-fill text-warning"></i> Mis Inversiones <span class="sr-only">(current)</span></a>
      </li>
      <?php if ($role === "admin"){ ?>
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("admin")?>"><i class="bi bi-people-fill text-success"></i> Ver Usuarios <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown dropdown-menu-right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-person-fill"></i> <?php echo $logged_user; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <?php if ($role === "user"){ ?>
          <a class="dropdown-item" href="<?php echo site_url("users")?>">Cuenta</a>
          <div class="dropdown-divider"></div>
          <?php } ?>
          <a class="dropdown-item" href="<?php echo site_url("auth/exit")?>">Salir</a>
        </div>
      </li>
    </ul> 
  </div>
</nav>