<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
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
	<title>Mis Fondos</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">	
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<h1>Mis Fondos:</h1>
			<br>
				<div>
					<a href="<?php echo site_url("funds/historic"); ?>"><button type="button" class="btn btn-success">Ver Historial</button></a>
				</div>
			<br>
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
							<h5>
								Acumulado: 
								<?php if($f["total"]<=0){?>
									<i class="bi bi-caret-down-fill text-danger"></i>
								<?php }else{ ?>
									<i class="bi bi-caret-up-fill text-success"></i>
								<?php } ?>
								$<?php echo $f["total"];?>							
							</h5>
							<h5>
								Porcentaje: 
								<?php if($f["percentage"]<=0){?>
									<i class="bi bi-caret-down-fill text-danger"></i>
								<?php }else{ ?>
									<i class="bi bi-caret-up-fill text-success"></i>
								<?php } echo $f["percentage"];?>%
							</h5>
							<a href="<?php echo site_url("funds/see_fund/".$f["id_fund"]); ?>" class="btn btn-primary">Ver</a>
							<a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteFundModal">Eliminar</a></td>						
						</div>
					</div>
				<?php } ?>
				<!-- Modal -->
				<div class="modal fade" id="deleteFundModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
	<?php $this->load->view("components/footer"); ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>