<?php
namespace Controllers;

require_once 'config/parameters.php';

use Models\Usuario;
use Helpers\Utils;

  class UsuarioController {

      /**
       * Process post data to save new user on database
       *
       * @return void
       *
       */
       public function save() {

         $nombre = trim($_POST['nombre']) ?? false;
         $pass = trim($_POST['pass']) ?? false;
         $rol = trim($_POST['rol']) ?? false;

         if(!preg_match('/^\w{6,24}$/', $nombre)) {

           $_SESSION['error-message'] = 'Solo letras, números y guiones bajos. De 6 a 24 caracteres';
           header('Location: '.BASE_URL.'register');
           exit;

         } elseif(!preg_match('/^[a-zA-Z0-9]{8,12}$/', $pass)) {

           $_SESSION['error-message'] = 'Solo letras y/o números. De 8 a 12 caracteres';
           header('Location: '.BASE_URL.'register');
           exit;

         } else {

           $user = new Usuario();

           $user -> setNombre($nombre);
           $user -> setPass($pass);
           $user -> setRole($rol);

           $result = $user -> flush();

           if(!$result) {

             $error = $user -> db -> error;

             $_SESSION['error-message'] = $error;
             header('Location: '.BASE_URL.'register');
             exit;

           } else {

             $current_user = $user -> getLast('usuarios');

             $_SESSION['user'] = $current_user;
             $_SESSION['message'] = 'Se ha guardado el usuario exitosamente';
             header('Location: '.BASE_URL);

           }

         }

       }

      /**
       * Process data from login form
       *
       * @return void
       *
       */
       public function login() {
           if(isset($_POST['nombre']) && isset($_POST['pass'])) {

               $user = new Usuario();

               $user -> setNombre($_POST['nombre']);
               $user -> setPass($_POST['pass']);

               $user -> authenticate();

               header("Location: ".BASE_URL);

        }

       }

      /**
       * Unsets user object and destroys session
       *
       * @return void
       *
       */
       public function logout() {

           Utils::deleteSession('user');
           session_destroy();

           header('Location: '.BASE_URL);

       }

  }
