<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <title>Crear Fondo</title>
    </head>
    <body>
      <div class="container">
        <br>
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Crear nuevo Fondo</h5>
                <?php
                  if(isset($OPT)){
                    switch($OPT){
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
                          El nombre ya existe
                        </div>
                        <?php
                        break;
                    }
                  }
                ?>
                <form method="post">
                  <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name">
                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                  <label for="currency">Moneda:</label>
                    <select id="currency" name="currency">
                      <option value="ars">ARS</option>
                      <option value="usd">USD</option>
                      <option value="brl">BRL</option>
                      <option value="eur">EUR</option>
                      <option value="gbp">GBP</option>
                      <option value="btc">BTC</option>
                      <option value="eth">ETH</option>
                      <option value="xrp">XRP</option>
                    </select>
                    <?php echo form_error('currency', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary button">Crear</button>
                  <a href="<?php echo site_url("funds"); ?>" class="btn btn-success">Volver</a></td></a>
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
