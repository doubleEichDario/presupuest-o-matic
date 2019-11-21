<?php

  namespace Controllers;

  use Models\Concepto;

  class ConceptoController {

    /**
    * --------------------------------------------------------------------------
    * DATABASE OPERATIONS
    * --------------------------------------------------------------------------
    *
    * This section holds those methods that perform operations directly on
    * database
    *
    */

    /**
    * Insert a new concepto record in database
    *
    * @return void
    *
    */
    public function insert() {

      $concepto = new Concepto();

      // assigning POST data if present
      $familia = trim($_POST['familia']) ?? false;
      $descripcion = trim($_POST['descripcion']) ?? false;
      $unidad_medida = trim($_POST['unidad_medida']) ?? false;
      $cantidad = trim(ltrim($_POST['cantidad'], "0x30")) ?? false;
      $precioUnitario = trim(ltrim($_POST['precio_unitario'], "0x30")) ?? false;

      // FAMILIA
      if($familia && \preg_match('/^[A-Z]{1,40}$/', $familia)) {
        $concepto -> setFamilia($familia);
      } else {
        $_SESSION['error-message'] = 'Familia: Introduce solo texto, sin espacios, hasta 40 caracteres';
        header("Location: ".BASE_URL."crear_concepto");
        exit;
      }

      // DESCRIPCIÓN
      if($descripcion && \preg_match('/.{12,250}/')) {
        $concepto -> setDescripcion($descripcion);
      } else {
        $_SESSION['error-message'] = 'Descripción: Introduce de 12 a 250 caracteres';
        header("Location: ".BASE_URL."crear_concepto");
        exit;
      }

      // UNIDAD DE MEDIDA
      if($unidad_medida && \preg_match('/^(?:PIEZA|LOTE|SERVICIO|M|M2|M3|TONELADA|KG|MILLAR|LITRO)$/', $unidad_medida)) {
        $concepto -> setUnidad($unidad_medida);
      } else {
        $_SESSION['error-message'] = 'Unidad de Medida: PIEZA, LOTE, SERVICIO, M, M2, M3, TONELADA, KG, MILLAR y LITRO';
        header("Location: ".BASE_URL."crear_concepto");
        exit;
      }

      // CANTIDAD Y PRECIO UNITARIO
      if($cantidad && $precioUnitario) {
        // Force float type and 2 digits after floating point before got them into database
        if(gettype($cantidad) == 'double' && gettype($cantidad) == 'double') {

          $concepto -> setCantidad(round($cantidad, 2));
          $concepto -> setPrecioUnitario(round($precio_unitario, 2));

        } elseif(gettype($cantidad) == 'integer' && gettype($cantidad) == 'integer') {

          $concepto -> setCantidad(floatval($cantidad));
          $concepto -> setPrecioUnitario(floatval($precioUnitario));

        }  else {
          $_SESSION['error-message'] = 'Cantidad|Precio Unitario: Solo números, enteros o con decimales';
          header("Location: ".BASE_URL."crear_concepto");
          exit;
        }

      } else {
        $_SESSION['error-message'] = 'Cantidad|Precio Unitario: Los campos están vacíos';
        header("Location: ".BASE_URL."crear_concepto");
        exit;
      }

        $result = $concepto -> save();

        if(!$result) {
          $_SESSION['error-message'] = $result -> db -> error;
          header("Location: ".BASE_URL."crear_concepto");
          exit;
        } else {
          $_SESSION['message'] = "Se insertó el concepto exitosamente";
          header("Location: ".BASE_URL);
        }

      }

      /**
      * Delete a concepto record in database
      *
      * @return void
      *
      */
      public function delete() {

          if(isset($_POST['id'])) {

              $id = $_POST['id'];

              $concepto = new Concepto();
              $delete_concepto = $concepto -> deleteOne('conceptos', $id);

              $delete_concepto ? $_SESSION['message'] = 'Concepto borrado exitosamente'
                               : $_SESSION['error-message'] = 'Error, no se pudo eliminar el concepto';
          }

          header("Location: ".BASE_URL);

      }

    /**
    * --------------------------------------------------------------------------
    * CURRENT PRESUPUESTO OPERATIONS
    * --------------------------------------------------------------------------
    *
    * Here goes methods that perform actions on current Presupuesto.
    *
    */

    /**
    * Requires Presupuesto view
    *
    * @return void
    *
    */
    public function presupuesto() {
      require_once 'views/concepto/presupuesto.php';
    }

    /**
    * Adds one item to presupuesto
    *
    * @return void
    *
    */
    public function add() {

      if(isset($_POST['id']) && isset($_POST['cantidad'])) {

        $id = $_POST['id'];

        // trim any space or non-desirable character
        $trimmedCantidad = ltrim($_POST['cantidad'], "0x30");
        $cantidad = $trimmedCantidad;

        // validates if cantidad is a number or a float
        if(!preg_match('/^\d+$|^\d+\.(?:\d{1,2})$/', $cantidad)) {

          $_SESSION['error-message'] = 'La CANTIDAD debe ser un número entero o con 1 o 2 decimales';

        } else {

          $concepto = new Concepto();

          $concepto -> setId($id);
          $concepto -> setCantidad($cantidad);
          $concepto -> addPresupuestoItem();

        }

      }

      header("Location: ".BASE_URL);

    }

    /**
    * Removes one item from presupuesto
    *
    * @return void
    *
    */
    public function remove() {

      if(isset($_GET['item'])) {

        $index = $_GET['item'];
        $concepto = new Concepto();

        $concepto -> deletePresupuestoItem($index);

      }

      header("Location: ".BASE_URL);

  }

}
