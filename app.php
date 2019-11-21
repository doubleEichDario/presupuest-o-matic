<?php require_once 'views/layout/head.php'; ?>
<?php require_once 'views/layout/navigation.php'; ?>
<?php require_once 'config/parameters.php'; ?>
<?php require_once 'helpers/Utils.php'; ?>
<?php require_once 'vendor/autoload.php'; ?>
<?php ob_start() ?>
<!-- <div id="loading" class="loader-wrapper">
  <div class="loader"></div>
</div> -->

<?php include 'views/includes/session_message.php'; ?>
<div class="container">

  <div class="row">
    <div class="col s12">
      <h1 class="main-title t-center">Genera un presupuesto</h1>
    </div>
  </div>

  <form method="POST" action="<?= BASE_URL?>Concepto/add">

    <!-- descripción -->
    <div class="row">
      <div class="col s10 offset-s1">
        <?php $lista_de_conceptos = Helpers\Utils::fillSelectList();?>

        <label for="id">Descripción</label>
        <select class="browser-default form-input" name="id">

          <option disabled selected>Selecciona el concepto</option>

          <?php while($concepto = $lista_de_conceptos -> fetch_object()): ?>
            <option value="<?= $concepto -> id ?>"><?= $concepto -> id ?> | <?= $concepto -> familia ?> | <?= substr($concepto -> descripcion, 0, 50).'...' ?> | <?= $concepto -> unidad_medida ?> | $<?= $concepto -> precio_unitario ?></option>
          <?php endwhile; ?>

        </select>
      </div>
    </div>

    <!-- cantidad -->
    <div class="row">
      <div class="col s10 offset-s1">
        <label for="cantidad">Cantidad</label>
        <input id="cantidad" class="form-input" type="notext" name="cantidad" required>
        <span class="is-invalid">Solo números, no más de dos decimales</span>
      </div>
    </div>

    <!-- Concepto action buttons -->
    <div class="row">
      <div class="col s10 offset-s1">

        <button id="add-concepto" class="btn waves-effect waves-light btn-small green presupuesto-custom-button" type="submit">AGREGAR</button>
        <div id="links-menu-group" class="button-group">
          <span class="button expand-button gunmetal t-white" role="button"><i class="material-icons">expand_more</i></span>
          <button class="button groupable gunmetal t-white" type="button">CONCEPTO</button>
        </div>
        <div id="concepto-links" class="button-group-links">
          <button type="submit" formaction="<?= BASE_URL ?>Concepto/delete">ELIMINAR</button>
          <a href="<?= BASE_URL ?>crear_concepto">CREAR <i class="tiny material-icons">open_in_new</i></a>
        </div>
      </div>
    </div>

  </form>

  <!-- show FAB only on mobile devices -->
  <?php if(Helpers\Utils::isMobile()): ?>
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">insert_drive_file</i>
      </a>
      <ul>
        <li><a href="<?= BASE_URL ?>recipient" class="btn-floating"><i class="material-icons">email</i></a></li>
        <li><a href="<?= BASE_URL ?>download" class="btn-floating"><i class="material-icons">file_download</i></a></li>
      </ul>
    </div>
  <?php endif; ?>
</div>

<?php require_once 'front_loader.php'; ?>
<?php require_once 'views/layout/footer.php'; ?>
