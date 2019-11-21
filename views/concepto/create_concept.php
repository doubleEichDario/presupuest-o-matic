<?php session_start(); ?>
<?php require_once '../../config/parameters.php'; ?>
<?php require_once '../../vendor/autoload.php'; ?>
<?php error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user-control-styles.css">
    <title>Crear concepto</title>
  </head>
  <body>
    <div id="loading" class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <?php require_once '../includes/session_message.php'; ?>
    <div class="container">
      <h1 class="title">Introduce un nuevo concepto</h1>
      <div class="row">
        <div class="offset-l2 offset-m2 offset-s1 col m8 l8 s10">
          <div class="card">
            <div class="card-content">
              <form action="<?= BASE_URL ?>Concepto/insert" method="POST">

                <div class="row">
                  <div class="col s12">
                    <label for="familia">Familia</label>
                    <input id="familia" type="text" name="familia" class="form-input browser-default" autofocus required>
                    <span class="is-invalid">Solo letras y números. De 6 a 40 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="5" cols="100" class="browser-default form-input" required></textarea>
                    <span class="is-invalid">Solo letras y números. De 12 a 250 caracteres</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="unidad_medida">Unidad de medida</label>
                    <input id="u-medida" id type="text" name="unidad_medida" class="browser-default form-input" required>
                      <span class="is-invalid">Aceptados: PIEZA, LOTE, SERVICIO, M, M2, M3, TONELADA, KG, MILLAR y LITRO'</span><span class="counting-chars-box"></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <label for="precio_unitario">Precio Unitario</label>
                    <input id="p-unitario" type="number" name="precio_unitario" class="form-input browser-default" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <button id="create-concepto" type="submit" class="waves-effect waves-light btn green mt-1 full smaller-text">AGREGAR AL PRESUPUESTO</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php require_once '../includes/back_link.php'; ?>
      </div>
      <footer>
        <div class="row t-center">
          <div class="offset-l2 offset-m2 offset-s1 col l8 m8 s10 footer-options">
            <ul>
              <li>
                <a href="#">Breve teoría sobre los conceptos</a>
              </li>
              <li>
                <a href="#">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    <script src="assets/js/create_concept.js" type="module" charset="utf-8"></script>
  </body>
</html>
