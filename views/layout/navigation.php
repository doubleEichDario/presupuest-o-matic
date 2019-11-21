<?php require 'config/parameters.php'; ?>
<body>
    <body>
        <!-- navigation -->
        <nav>
            <div class="nav-wrapper gunmetal menu">
              <a href="<?= BASE_URL ?>" class="brand-logo text-logo">PRESUPUEST-O-MATIC</a>
              <div id="navigation-links" class="menu-links">

                <ul class"right">

                  <?php if(isset($_SESSION['conceptos']) && count($_SESSION['conceptos']) >= 1): ?>

                    <li><a href="<?= BASE_URL ?>recipient">Enviar por correo</a></li>
                    <li><a href="<?= BASE_URL ?>download_pdf">Descargar</a></li>

                  <?php endif; ?>

                  <?php if(isset($_SESSION['user'])): ?>

                    <li class="padding-lr flex">
                      <i class="left large material-icons account">account_circle</i><span class="left"><?= $_SESSION['user'] -> nombre ?></span>
                    </li>
                    <li>
                      <a href="<?= BASE_URL?>Usuario/logout">Cerrar Sesión</a>
                    </li>

                  <?php else: ?>

                    <li class="padding-lr flex"><i class="large material-icons">account_circle</i><span>Invitado</span></li>
                    <li><a href="<?= BASE_URL ?>access">Iniciar Sesión</a></li>
                    <li class="menu-links-register-button-box"><a class="btn transparent menu-links-register" role="button" href="<?= BASE_URL ?>register">Registrarse</a></li>

                  <?php endif; ?>
                </ul>
              </div>
              <a id="menu-trigger-icon" href="#" class="menu-icon">
                <i class="material-icons">menu</i>
              </a>
            </div>
        </nav>
