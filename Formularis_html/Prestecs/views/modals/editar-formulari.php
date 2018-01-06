<?php
$dataActual = date('Y-m-j');
?>
<!-- ID -->
<div class="form-group">
  <input type="hidden" name="id" value="<?= $dada["ID_Prestec"]; ?>" class="form-control" id="prestecID" required>
</div>

<!-- Data devolució (actual) -->
<div class="form-group">
  <input type="hidden" name="dataRealDevolucio" value="<?= $dataActual; ?>" class="form-control" id="prestecDataDevolucio" required>
</div>
