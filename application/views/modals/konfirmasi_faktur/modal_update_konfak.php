<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Konfirmasi Faktur</h3>
<br />
<form id="form-update-konfak" method="POST">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Faktur</label>
    </span>
  <input type="text" class="form-control" id="faktur" name="faktur" aria-describedby="sizing-addon2" value="<?php echo $dataKonfirmasi->Faktur; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Tanggal</label>
    </span>
  <input type="text" class="form-control" id="tanggal" name="tanggal" aria-describedby="sizing-addon2" value="<?php echo $dataKonfirmasi->Tanggal; ?>">
  </div>
  <script>
  $(function() {
  $("#tanggal").datepicker({
  autoclose: true,
  format: "yyyy-mm-dd",
  todayHighlight: true,
  orientation: "down auto",
  todayBtn: true,
  todayHighlight: true,
  });
  });
  </script>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Customer</label>
    </span>
  <input type="text" class="form-control" id="customer" name="customer" aria-describedby="sizing-addon2" value="<?php echo $dataKonfirmasi->Customer; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Draft</label>
    </span>
  <input type="text" class="form-control" name="draft" id="draft" aria-describedby="sizing-addon2" value="<?php echo $dataKonfirmasi->Draft; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Total</label>
    </span>
  <input type="text" class="form-control" name="total" id="total" aria-describedby="sizing-addon2" value="<?php echo $dataKonfirmasi->Total; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
