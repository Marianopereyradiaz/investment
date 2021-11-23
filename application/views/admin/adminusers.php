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
  <title>Inversion</title>
  </head>
  <body>
  <?php $this->load->view("components/navbar");?>
	<div class="container">
    <h1>Administrar Usuarios</h1>
		<div class="row">
			<div class="col-md-10">
			<br>
			<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Ultimo Ingreso</th>
                    <th>Estado</th>
                    <th>Acción</th>
                    <th>Rol</th>
                </tr>
					<?php foreach($users as $u){ ?>
					<tr>
						<td><?php echo $u["user"];?> </td>
						<td><?php echo $u["email"];?> </td>
            <td><?php echo $u["lastlogin"];?> </td>
            <?php if($u["state"]==1){ ?>
              <td>activo</td>
              <td class="text-center col-sm-1"><a href="<?php echo site_url("admin/ban/".$u["id_user"]); ?>" class="text-danger" title="Bloquear"><i class="bi bi-lock-fill"></i></a></td>
            <?php } else { ?> 
              <td>bloqueado</td>
              <td class="text-center col-sm-1"><a href="<?php echo site_url("admin/permit/".$u["id_user"]); ?>" class="text-success" title="Permitir"><i class="bi bi-unlock-fill"></i></a></td>
            <?php } ?> 
            <td><?php echo $u["role"];?> 
                <?php if($u["role"]=="client"){ ?>
                  <a href="<?php echo site_url("admin/set_admin/".$u["id_user"]); ?>" class="text-info" title="Convertir en Admin"><i class="bi bi-gear-fill"></i></a>
                <?php } else { ?> 
                  <a href="<?php echo site_url("admin/set_client/".$u["id_user"]); ?>" class="text-warning" title="Convertir en Cliente"><i class="bi bi-people-fill"></i></a>
                <?php } ?>
            </td>	
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