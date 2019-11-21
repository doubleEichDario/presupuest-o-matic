<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Generador de presupuestos</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!-- navigation -->
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Presupuest-o-matic</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down nav-link">
                  <li><a href="#">Enviar por correo</a></li>
                  <li><a href="#">Descargar</a></li>
                  <li><a href="#"><i class="large material-icons">account_circle</i><span>Invitado<span></a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <!-- application -->
            <h1 class="centered">Genera un presupuesto</h1>
            <div class="row">
                <div class="col s12">
                    <form action="" method="POST">
                        <div class="input-field col l6 s8 offset-l2 offset-s2">
                            <select name="id">
                                <option value="" disabled selected>Selecciona el concepto</option>
                                <option value="">Something 1</option>
                                <option value="">Something 2</option>
                                <option value="">Something 3</option>
                                <option value="">Something 4</option>
                            </select>
                            <label for="id">Descripción</label>
                        </div>
                        <div class="input-field col l2 s8 offset-s2">
                            <input type="number" name="cantidad">
                            <label for="number">Cantidad</label>
                        </div>
                        <div class="input-field col s8 offset-s2">
                            <button class="btn waves-effect waves-light featured-color-btn" type="button" name="button">AGREGAR</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- presupuesto -->
            <div class="card">
                <div class="card-content">
                    <table>

                        <tr>
                          <th scope="col-lg-1">Id</th>
                          <th scope="col-lg-6">Descripción</th>
                          <th scope="col-lg-1">Unidad</th>
                          <th scope="col-lg-1">Cantidad</th>
                          <th scope="col-lg-1">P. Unitario</th>
                          <th scope="col-lg-1">Importe</th>
                          <th scope="col-lg-1">Acciones</th>
                        </tr>

                        <tr>
                            <th scope="row">1</th>
                            <td>Piso de concreto f'c = 150 kg/cm2 reforzado con malla electrosoldad 66-1010</td>
                            <td>M2</td>
                            <td>500</td>
                            <td>$ 156.77</td>
                            <td>$ 78,384.00</td>
                            <td>
                                <a href="#">
                                  <i class="small material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Enlúcido de yeso</td>
                            <td>M2</td>
                            <td>100</td>
                            <td>$ 100.00</td>
                            <td>$ 10,000.00</td>
                            <td>
                                <a href="#">
                                  <i class="small material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align: right">Total</td>
                            <td>$ 88,1384.00</td>
                        </tr>
                    </table>

                </div>
            </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/main.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
