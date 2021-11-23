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
    <title>Cotizaciones</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
			    <h1 style="text-align:center">Cotizaciones</h1>		
			</div>
		</div>
      <div class="row">
        <div class="col col-md-6 offset-md-3">
          <iframe src="https://es.widgets.investing.com/live-currency-cross-rates?theme=darkTheme&roundedCorners=true&pairs=1505,1608,1729,2090" width="100%" height="300" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"></div>	
        </div>
		  </div>
      <div class="row">
        <div class="col col-md-6 offset-md-3">
        <iframe src="https://es.widgets.investing.com/crypto-currency-rates?theme=darkTheme&pairs=945629,997650,1010776,1118146" width="100%" height="300" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"><a href="https://es.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=CRYPTO_CURRENCY_RATES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow"></a></div>
        </div>
		</div>
	</div>
  <?php $this->load->view("components/footer"); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>