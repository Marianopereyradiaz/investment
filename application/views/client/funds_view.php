<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>Mis Fondos</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">
		<div class="row">
			<div class="col col-md-10 offset-md-1">
				<?php $this->load->view("components/currency_converter");?>
			</div>
		</div>
		<div class="row">
			<div class="col col-md-6 offset-md-3">
			<h1>Mis Fondos:</h1>
      			<div class="card bg-light mb-3">
					<div class="card-header">Agregar</div>
					<div class="card-body">
						<h5 class="card-title">Crear Nuevo Fondo de Inversión</h5>
						<a href="<?php echo site_url("funds/create"); ?>"><button type="button" class="btn btn-primary">Crear</button></a>
					</div>
				</div>
				<?php foreach($funds as $f){ ?>
					<div class="card bg-light mb-3">
						<div class="card-header"><?php echo $f["name"];?></div>
						<div class="card-body">
							<h5 class="card-title">Moneda: <?php echo $f["currency"];?></h5>
							<a href="<?php echo site_url("funds/see_fund/".$f["id_fund"]); ?>" class="btn btn-primary">Ver</a>
							<a href="<?php echo site_url("funds/delete/".$f["id_fund"]); ?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</a></td>						
						</div>
					</div>
				<?php } ?>
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
							<p>¿Seguro desea eliminar este fondo?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo site_url("funds/delete/".$f["id_fund"]); ?>" class="btn btn-danger">Eliminar</a></td>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>