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
    <title>Bienvenido</title>
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
        .row{
            margin:5%;
        }
  </style>
    </head>
    <body>
      <br>
      <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h1>Bienvenido a Mis Inversiones</h1>
                <p>Un lugar para llevar tus fondos de inversión al dia, fácil de usar y con todas las herramientas necesarias!!</p>
                <img src="assets/img/logo.png">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="<?php echo site_url("home/login"); ?>" class="btn btn-success">Ingresar</a>
            </div>
        </div>   
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="<?php echo site_url("home/register"); ?>" class="btn btn-primary">Todavía no eres usuario?<br>REGISTRATE AQUI</a>
            </div>
        </div>      
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>