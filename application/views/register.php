<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <title>Hola!</title>
    <style>
      body{
        background: rgb(82,0,221);
        background: linear-gradient(90deg, rgba(82,0,221,1) 13%, rgba(236,155,68,1) 89%);
        margin: 2%
      }
      h5, form.button, button, a{
        align-items: center;
        text-align: center;
      }
    </style>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="card">
            <img src="<?php echo base_url("assets/img/logo.png"); ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Registro</h5>
                <?php
                  if(isset($OP)){
                    switch($OP){
                      case "WRONG":
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Complete los datos del formulario
                        </div>
                        <?php
                        break;
                        case "INVALID_EMAIL":
                          ?>
                          <div class="alert alert-danger" role="alert">
                            El mail ya se encuentra registrado
                          </div>
                          <a href="<?php echo site_url("auth/register")?>" class="btn btn-primary">Volver</a>
                          <?php
                          break;
                          case "INVALID_USERNAME":
                            ?>
                            <div class="alert alert-danger" role="alert">
                              Nombre de usuario ya existente
                            </div>
                            <a href="<?php echo site_url("auth/register")?>" class="btn btn-primary">Volver</a>
                            <?php
                            break;
                        case "CORRECT":
                          ?>
                          <div class="alert alert-success" role="alert">
                            Contraseña cambiada con éxito, será redirigido al Login
                          </div>
                          <a href="<?php echo site_url("auth/exit")?>" class="btn btn-primary">Aceptar</a>
                          <?php
                          break;
                    }
                  }else{
                ?>
                <form method="post">
                  <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control" name="user" placeholder="Ingresa tu nombre de usuario">
                    <?php echo form_error('user', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="user">Contraseña:</label>
                    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="confirmpassword">Repetir Contraseña:</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Repite tu contraseña">
                    <?php echo form_error('confirmpassword', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Mail:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu email"/>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary button" >Aceptar</button>
                  <a href="<?php echo site_url("auth")?>" class="btn btn-primary">Volver</a>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>       
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>
