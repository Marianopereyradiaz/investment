<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Recuperar Contraseña</title>
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<h1 style="text-align:center">Recuperar Contraseña</h1>
				<br>
				<?php
          if(isset($OP)){
            switch($OP){
              case "INVALID":
                ?>
                <div class="alert alert-danger" role="alert">
                  La cuenta de email no corresponde a un usuario, vuelva a intentarlo
                </div>
                <?php
                break;
            }
          }
        ?>
				<form method="post">
					<div class="form-group">
						<p>Ingrese su cuenta de correo y le enviaremos un email para reestablecer su contraseña</p>
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email">
						<?php echo form_error("email", "<small class='text-danger'>", "</small>")?>
					</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
          <a href="<?php echo site_url("auth"); ?>"><button type="button" class="btn btn-primary">Volver</button></a>
				</form>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>
