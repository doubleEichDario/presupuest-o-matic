<?php error_reporting(E_ALL); ?>
<?php require_once '../../helpers/Utils.php'?>
<?php Helpers\Utils::authenticationExists(); ?>
<?php require_once '../../config/parameters.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user-control-styles.css">
    <title>Login</title>
  </head>
  <body>
    <div id="loading" class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <div class="container">
      <h1 class="title">Accede a Presupuest-o-matic</h1>
      <div class="row">
        <div class="offset-l2 offset-m2 offset-s1 col m8 l8 s10">
          <div class="card">
            <div class="card-content">
              <?php include '../../views/includes/session_message.php' ?>
              <form action="<?= BASE_URL ?>Usuario/login" method="POST">

                <div class="row">
                  <div class="col s12">
                    <label for="nombre">Nickname</label>
                    <input id="login-nick" type="text" name="nombre" class="browser-default form-input" required>
                    <span class="is-invalid">Solo letras y números. De 6 a 24 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="contraseña">Contraseña</label>
                    <input id="login-pass" type="password" name="pass" class="browser-default form-input" required>
                    <span class="is-invalid">Solo letras y números. De 8 a 12 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <button id="login-submit" type="submit" class="waves-effect waves-light full btn green">ENTRAR</button>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 small-text">
                    ¿No tienes cuenta? <span><a href="#">Crea una</a></span>
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
    <script src="assets/js/login.js" type="module" charset="utf-8"></script>
  </body>
</html>
