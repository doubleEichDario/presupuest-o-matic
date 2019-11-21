
<!-- This snippet shows a resulting message from database operations  -->
<?php if(isset($_SESSION['message'])): ?>

  <div class="row">
    <div class="col s12 alert-container">
      <div class="alert success-alert">
        — <?= $_SESSION['message'] ?>
      </div>
      <a class="dismisser-btn" href="#"><i class="tiny material-icons">close</i></a>
    </div>
  </div>

  <?php elseif(isset($_SESSION['error-message'])): ?>

  <div class="row">
    <div class="col s12 alert-container down">
      <div class="alert warning-alert">
        — <?= $_SESSION['error-message'] ?>
      </div>
      <a class="dismisser-btn" href="#"><i class="tiny material-icons">close</i></a>
    </div>
  </div>

<?php endif; ?>
<?php Helpers\Utils::deleteSession('message') ?>
<?php Helpers\Utils::deleteSession('error-message') ?>
