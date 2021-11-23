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
		#amounts_list{
			overflow:scroll;
			overflow-x: hidden;
			height:400px;
			width:auto;
			margin-top: 5%;
		}	
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
	
	<title>Inversion</title>
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
				<h1>Estado del Fondo <?php echo $fund_name; ?></h1>
			</div>
		</div>
		<div class="row">
			<br>
			<div class="col col-md-6 offset-md-3">
			<form class="form-inline" method="post" action="">
				<label for="amount" class="my-1 mr-2">Monto: </label>
				<div class="input-group mb-2 mr-sm-2">
					<div class="input-group-prepend">
					<div class="input-group-text">$</div>
					</div>
					<input type="text" class="form-control" id="amount" placeholder="0.00" name="amount">	
				</div>
				<button type="submit" class="btn btn-primary mb-2">Actualizar</button>
				</form>
				<?php echo form_error("amount","<small class=\"text-danger\">","</small>")?>
			</div>
		</div>
		<div class="row" id="amounts_list">
			<br>
			<div class="col col-md-6 offset-md-3">
			<br>
			<?php if(count($amounts)>0){?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tbody>
							<?php foreach($amounts as $a){ ?>
							<tr>
								<td><?php echo $a["date"];?> </td>
								<td class="text-right">$<?php echo $a["amount"];?></td>
								<td class="text-right">
									<?php if($a["diff"]){?>
										<?php echo $a["diff"];?>
										<?php if($a["diff"]<=0){?>
											<i class="bi bi-caret-down-fill text-danger"></i>
										<?php }else{ ?>
											<i class="bi bi-caret-up-fill text-success"></i>
										<?php } ?>
									<?php } else {
										echo 0; }
									?>
								</td>
								<td class="text-right">
									<?php if($a["perc"]){?>			
										<?php if($a["diff"]<=0){?>
											<i class="bi bi-caret-down-fill text-danger"></i>
										<?php }else{ ?>
											<i class="bi bi-caret-up-fill text-success"></i>
										<?php } ?>
										<?php echo $a["perc"];?>%	
									<?php } else {
										echo 0; }
									?>	
								</td>
								<td class="text-center col-sm-1"><a href="<?php echo site_url("amounts/delete/".$a["id_amount"]); ?>" class="text-danger"><i class="bi bi-x-circle"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<br>
			<br>
			<div class="col col-md-6 offset-md-3">
				<h4>Total acumulado desde el principio <strong>$<?php echo $accumulated; ?></strong></h4>
			</div>
		</div>
		<?php } else{?>
			<p>No existen montos</p>
		<?php } ?>
		<?php if($chart_array){?>
		<div class="row">
			<br>
			<div class="col col-md-12 col-sm-8">
				<div id="GoogleLineChart" style="height: auto; width: 100%"></div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<br>
			<div class="col col-md-12 col-sm-8">
				<div id="columnchart_material" style="height:auto; width: 100%"></div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<a href="<?php echo site_url("amounts/return"); ?>"><button class="btn btn-primary">Volver</button></a></td>&nbsp;
				<a href="<?php echo site_url("pdf")?>" target="_blank"><button class="btn btn-warning"><i class="bi bi-download"></i> Descargar</button></a>
			</div>
		</div>
	</div>
	<?php $this->load->view("components/footer"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			google.charts.load('current', {'packages':['corechart', 'bar']});
			google.charts.setOnLoadCallback(drawLineChart);
			google.charts.setOnLoadCallback(drawBarChart);

            // Line Chart
			function drawLineChart() {
				var data = google.visualization.arrayToDataTable([
					['Fecha', 'Monto'],
						<?php 
							foreach ($chart_array as $ca){
								echo "['".$ca['date']."',".$ca['amount']."],";
						} ?>
				]);

				var options = {
					title: 'Rendimiento por fecha',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				};
				var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
				chart.draw(data, options);
			}
		</script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['bar']});
			google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
					['Fecha', '%'],
					<?php 
							foreach ($chart_array_perc as $ca){
								echo "['".$ca['date']."',".$ca['perc']."],";
						} ?>
					]);

					var options = {
					chart: {
						title: 'Rendimiento por Porcentajes',
					}
					};

					var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

					chart.draw(data, google.charts.Bar.convertOptions(options));
				}
		</script>
	</body>
</html>