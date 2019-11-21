<?php
  require_once 'vendor/autoload.php';

  use Controllers\ErrorController;
  use Controllers\UsuarioController;
  use Controllers\ConceptoController;

  function showError() {
    $error = new ErrorController();
    $error-> index();
  }

  if(isset($_GET['controller'])) {

    $controller_name = $_GET['controller'].'Controller';

  } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

      $controller_name = DEFAULT_CONTROLLER;

  } else {

      showError();
      echo "3";

  }

  if(class_exists('Controllers\\'.$controller_name)) {

      $instance = 'Controllers\\'.$controller_name;

      $controller = new $instance();

      if(isset($_GET['action']) && method_exists($controller, $_GET['action'])) {

          $action = $_GET['action'];
          $controller -> $action();

      } elseif(!isset($_GET['controller']) && !isset($_GET['action'])) {

          $default_action = DEFAULT_ACTION;
          $controller -> $default_action();

      } else {
          showError();
          echo "1";
      }

  } else {
      showError();
      echo "2";
  }
