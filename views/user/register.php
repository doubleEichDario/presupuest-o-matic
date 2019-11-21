<?php session_start(); ?>
<?php error_reporting(E_ALL); ?>
<?php require_once '../../config/parameters.php' ?>
<?php require_once '../../helpers/Utils.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/user-control-styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Presupuest-o-matic | Registro</title>
  </head>
  <body>
    <div id="loading" class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <?php require_once '../includes/session_message.php'; ?>
    <div class="container">
      <h1 class="title">Registrate en Presupuest-o-matic</h1>
      <div class="row">
        <div class="offset-l2 offset-m2 offset-s1 col m8 l8 s10">
          <div class="card">
            <div class="card-content">
              <?php include '../../views/includes/session_message.php' ?>
              <form action="<?= BASE_URL ?>Usuario/save" method="POST">

                <div class="row">
                  <div class="col s12">
                    <label for="nombre">Nickname</label>
                    <input id="nickname" type="text" name="nombre" class="browser-default form-input" required>
                    <span class="is-invalid">Solo letras y números. De 6 a 24 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="pass">Contraseña</label>
                    <input id="pass" type="password" name="pass" class="browser-default form-input">
                    <span class="is-invalid">Solo letras y números. De 8 a 12 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="permisos">Permisos</label>
                    <select class="browser-default form-input" name="rol" readonly>

                      <option value="ROLE_USER" <?php echo isset($_SESSION['user']) &&
                      $_SESSION['user'] -> rol == 'ROLE_ADMIN' ? 'selected' : '' ?>>User</option>

                      <?php if(isset($_SESSION['user']) && $_SESSION['user'] -> rol == 'ROLE_WEBMASTER'): ?>
                        <option value="ROLE_ADMIN">Admin</option>
                      <?php endif;?>

                    </select>
                  </div>
                </div>
                <div class="row f-row">
                  <div class="col s12">
                    <button type="submit" class="waves-effect waves-light btn green full">GUARDAR</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php require_once '../includes/back_link.php'; ?>
      <?php require_once '../includes/forms_footer.php'; ?>
    </div>
    <?php require_once '../includes/materialize_js_scripts.php'; ?>
    <script src="assets/js/register.js" type="module" charset="utf-8"></script>
  </body>
</html>
