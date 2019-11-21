<?php
  namespace Models;

  require 'config/parameters.php';

  use Models\ModelBase as ModelBase;

  class Usuario extends ModelBase {

      /**
       * @var integer
      */
      private $id;

      /**
       * @var string
      */
      private $nombre;

      /**
       * @var string
      */
      private $pass;

      /**
       * @var string
      */
      private $rol;

      // id
      public function setId($id) {
        $this -> id = $id;
      }

      public function getId() {
          return $this -> id;
      }

      // nombre
      public function setNombre($nombre) {
          $this -> nombre = $this -> db -> real_escape_string($nombre);
      }

      public function getNombre() {
        return $this -> nombre;
      }

      // pass
      public function setPass($pass) {
          $this -> pass = $pass;
      }

      public function getPass() {
        return $this -> db -> real_escape_string(password_hash($this -> pass, PASSWORD_DEFAULT));
      }

      // role
      public function setRole($rol) {
        $this -> rol = $this -> db -> real_escape_string($rol);
      }

      public function getRole() {
        return $this -> rol;
      }

      /**
       * It saves new user on database
       *
       * @return void
       *
       */
       public function flush() {

         $sql = "INSERT INTO usuarios VALUES (NULL, '{$this -> getNombre()}', '{$this -> getPass()}', '{$this -> getRole()}');";

         $query = $this -> db -> query($sql);

         return $query;

       }

      /**
       * Verifies user credentials
       *
       * @return object|bool
       *
       */
       public function authenticate() {

            $sql = "SELECT * FROM usuarios WHERE nombre = '{$this -> nombre}'";
            $query = $this -> db -> query($sql);

            $user = $query -> fetch_object();

            if(password_verify($this -> pass, $user -> pass)) {

                $_SESSION['user'] = $user;
                return true;

            } else {

                $_SESSION['error-message'] = "No coinciden las credenciales";
                return false;
            }

       }

  }
