<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <title>Validar</title>
  </head>
  <body>
  <br>
	<div class="container">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<h1 style="text-align:center">Validar</h1>
      </div>
    </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h3>Ingrese el código que le hemos enviado por mail</h3>
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
                    case "INVALID":
                      ?>
                      <div class="alert alert-danger" role="alert">
                        Codigo Invalido
                      </div>
                      <?php
                      break;
                  }
                }
              ?>
              <form method="post">
                <div class="form-group">
                  <label for="name">Código de validación:</label>
                  <input type="text" class="form-control" name="code">
                  <?php echo form_error('code', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary button">Aceptar</button>
                <a href="<?php echo site_url("auth/exit"); ?>" class="btn btn-success">Cancelar</a></td></a>
              </form>
            </div>
          </div>
        </div>
      </div>       
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>