<?php error_reporting(0); ?>
<?php require_once '../../config/parameters.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user-control-styles.css">
  </head>
  <body>
    <div class="container">
      <div class="row t-center">
        <div class="col s12">
          <h1 class="title">Destinatario</h1>
        </div>
      </div>
      <div class="row">
        <div class="col s10 offset-s1">
          <div class="card">
            <div class="card-content">
              <form action="<?= BASE_URL ?>send_pdf.php" method="POST">
                <label for="recipient">Correo Electrónico</label>
                <input type="mail" name="recipient" class="form-input" autofocus>
                <input type="text" name="sender" value="<?= $_SESSION['user'] -> nombre ?>" hidden>
                <button type="submit" class="mt-1 waves-effect waves-light btn-small green" name="button">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row t-center">
        <div class="offset-l2 offset-m2 offset-s1 col l8 m8 s10 back-link">
          <a href="<?= BASE_URL ?>"><i class="tiny material-icons">arrow_back</i><span>Regresar</span></a>
        </div>
      </div>
      <?php require_once '../includes/forms_footer.php'; ?>
    </div>
  </body>
</html>
