<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
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
  <title>Foro</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">
        <div class="row">
			<div class="col-md-10">
                <h1>FORO</h1>
            </div>
        </div>
        <br>
        <div class="row">
			<div class="col-md-10">
            <a href="<?php echo site_url("forum/add_topic"); ?>" class="btn btn-success">Nuevo</a>
            </div>
        </div>
        <br>
		<div class="row">
			<div class="col-md-10">
                <h2>Temas: </h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <th>Creado por:</th>
                            </tr>
                            <?php foreach($topics as $t){ ?>
                            <tr>
                                <td><?php echo $t["date"];?> </td>
                                <td><?php echo $t["name"];?> </td>
                                <td><?php echo $t["user"];?> </td>
                                <td><a href="<?php echo site_url("forum/go_to_topic/".$t["id_topic"]); ?>" class="btn btn-success">Ir</a></td>
                                <?php if($role=="admin"){ ?>
                                <td><a href="<?php echo site_url("forum/delete_topic/".$t["id_topic"]); ?>" class="btn btn-danger">Eliminar</a></td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
			    </div>
			</div>
		</div>
	</div>
  <?php $this->load->view("components/footer"); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>