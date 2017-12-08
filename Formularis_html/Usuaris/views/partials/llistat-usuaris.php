<div class="table-responsive">
  <table id="myTable" class="table table-condensed table-hover">
    <tr>
      <th>#</th>
      <th>DNI</th>
      <th>Nom</th>
      <th>Cognom</th>
      <th>Adreça</th>
      <th>Població</th>
      <th>Província</th>
      <th>Nacionalitat</th>
      <th>Adreça electrònica</th>
      <th>Telèfon</th>
      <th>Data naixement</th>
      <th width="100%">Acció</th>
    </tr>
    <?php foreach ($dades as $dada): ?>
      <tr>
        <td><?= $dada["ID_Usuari"]; ?></td>
        <td><?= $dada["DNI"]; ?></td>
        <td><?= $dada["Nom"]; ?></td>
        <td><?= $dada["Cognom"]; ?></td>
        <td><?= $dada["Adreca"]; ?></td>
        <td><?= $dada["Poblacio"]; ?></td>
        <td><?= $dada["Provincia"]; ?></td>
        <td><?= $dada["Nacionalitat"]; ?></td>
        <td><?= $dada["Adreca_electronica"]; ?></td>
        <td><?= $dada["Telefon"]; ?></td>
        <td><?= $dada["Data_naixement"]; ?></td>
        <td width="100%">
          <div class="btn-group" role="group" aria-label="...">
            <!-- Editar -->
            <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editarUsuariModal">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            <!-- Eliminar -->
            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarUsuariModal">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </div>
          <!-- Accions Editar-Eliminar -->
          <!-- Editar -->
          <form class="" action="index.html" method="post">
            <?php include_once("modals/editar.php"); ?>
          </form>
          <!-- Eliminar -->
          <form class="" action="index.html" method="post">
            <?php include_once("modals/eliminar.php"); ?>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
