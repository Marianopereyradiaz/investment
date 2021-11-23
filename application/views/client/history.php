<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
	<title>Historial</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">	
        <div class="row">
			<div class="col col-md-8 offset-md-2">
            <h1>Historial de Fondos de Inversion</h1>
			<?php if(count($all_funds)>0){?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Moneda</th>
                                <th>Estado</th>
                                <th>Porcentaje</th>
                                <th>Total Acumulado</th>
                            </tr>
							<?php foreach($all_funds as $af){ ?>
							<tr>
								<td><?php echo $af["name"];?> </td>
                                <td><?php echo $af["currency"];?> </td>
                                <?php if($af["state"]==1){ ?>
                                    <td><i class="bi bi-archive-fill text-success"></i> Activo</td>
                                    <?php } else { ?> 
                                    <td><i class="bi bi-archive-fill text-danger"></i> Finalizado</td>
                                <?php } ?>
                                <td>
                                    <?php if($af["percentage"]<=0){?>
                                        <i class="bi bi-caret-down-fill text-danger"></i>
                                    <?php }else{ ?>
                                        <i class="bi bi-caret-up-fill text-success"></i>
                                    <?php } echo $af["percentage"];?>%
								</td>
                                <td>
                                    <?php if($af["total"]<=0){?>
                                        <i class="bi bi-caret-down-fill text-danger"></i>
                                    <?php }else{ ?>
                                        <i class="bi bi-caret-up-fill text-success"></i>
                                    <?php } ?>$<?php echo $af["total"];?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
                <?php } else { ?>
                    <h2>No hay fondos de inversión</h2>
                <?php } ?>
			</div>
		</div>
        <div class="row" style="text-align:center">
			<div class="col col-md-6 offset-md-3">
                <a href="<?php echo site_url("funds")?>" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
    <?php $this->load->view("components/footer"); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>