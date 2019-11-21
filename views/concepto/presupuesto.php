<!-- Presupuesto -->
<div class="card">
    <div class="card-content presupuesto">
        <table>
            <tr>
              <th>Id</th>
              <th>Descripción</th>
              <th>Unidad</th>
              <th>Cantidad</th>
              <th>P. Unitario</th>
              <th>Importe</th>
              <th>Acciones</th>
            </tr>
            <?php $i = 1 ?>
            <?php $total = 0 ?>
            <?php foreach($_SESSION['conceptos'] as $concepto): ?>
              <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $concepto -> descripcion ?></td>
                <td><?= $concepto -> unidad_medida ?></td>
                <td><?= $concepto -> cantidad ?></td>
                <td><?= number_format( $concepto -> precio_unitario, 2, ".", ",") ?></td>
                <td><?= number_format($importe = $concepto -> precio_unitario * $concepto -> cantidad, 2, ".", ",") ?></td>
                <td>
                  <a href="<?= BASE_URL ?>Concepto/remove&item=<?= $i-1 ?>">
                    <i class="small material-icons">delete</i>
                  </a>
                </td>

              </tr>
              <?php $total += $importe ?>
            <?php endforeach; ?>
            <tr>
                <th scope="row" colspan="5" style="text-align: right">Total</td>
                <td><?= number_format($total, 2, ".", ",") ?></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
