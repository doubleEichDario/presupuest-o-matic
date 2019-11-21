<?php
  namespace DBManager;

  class database {


    public static function connect() {

      $connection = new \mysqli('localhost', 'root', '', 'presupuest-o-matic');
      $connection -> query("SET NAMES 'utf8'");

      return $connection;
    }

  }

?>
