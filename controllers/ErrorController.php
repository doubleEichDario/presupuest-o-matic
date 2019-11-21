<?php

namespace Controllers;

class ErrorController {

    private $pageNotFound;

    public function __construct() {
      $this -> pageNotFound = '<h1 class="text-muted">Página no encontrada</h1>';
    }

    public function index() {

        echo $this -> pageNotFound;

    }
}
