<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="<?php echo base_url();?>/logo.png" type="image/png">
    <style>
		body{
			background: linear-gradient(90deg, rgba(82,0,221,1) 13%, rgba(236,155,68,1) 89%);
		}
		.container{
			margin:auto;
			background-color: white;
			border-radius: 2%;
			text-align: center;
			padding: 2%;
		}
  </style>
    <title>Datos de Usuario</title>
    <style>
      h5{
        text-align: center;
      }
      form.button{
        text-align: center;
      }
    </style>
    </head>
    <body>
      <?php if(!$forgotpass){
        $this->load->view("components/navbar");
      }?>
      <div class="container">
      <h1>Cambiar Contraseña</h1>
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="card">
            <img src="<?php echo base_url("assets\img\changepass.png"); ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Ingrese su nueva contraseña:</h5>
                <form method="post">
                  <div class="form-group">
                    <label for="password">Nuevo Password:</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Ingresa nueva contraseña"/>
                    <?php echo form_error('newpassword', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="confirmpassword">Confirme Password:</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Repita nueva contraseña"/>
                    <?php echo form_error('confirmpassword', '<small class="text-danger">', '</small>'); ?>
                  </div>
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
                        case "INCORRECT":
                          ?>
                          <div class="alert alert-danger" role="alert">
                            Las contraseñas deben ser iguales
                          </div>
                          <button type="submit" class="btn btn-primary">Aceptar</button>  
                            <a href="<?php echo site_url("usuarios/principal")?>" class="btn btn-primary">Volver</a>
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
                  <button type="submit" class="btn btn-primary">Aceptar</button>
                  <?php if(!$forgotpass){ ?>
                    <a href="<?php echo site_url("funds")?>" class="btn btn-primary">Volver</a>
                  <?php } else{ ?>
                      <a href="<?php echo site_url("auth")?>" class="btn btn-primary">Cancelar</a>
                  <?php } ?>
                <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view("components/footer"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>