<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Pelunasah Hutang</h3>
<br />
<form id="form-update-hutang" method="POST">
  <input type="hidden" name="id" value="<?php echo $dataPelunasanHtg->ID; ?>">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-cd"></i>
    </span>
    <input type="text" class="form-control" name="faktur" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Faktur; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" id="tgl1" name="tgl" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Tgl; ?>">
    </div>
  <script>
    $(function() {
    $("#tgl1").datepicker({
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
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="fakturBeli" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Fkt; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="stat" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Status; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="htg" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Hutang; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="byr" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Bayar; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="spl" aria-describedby="sizing-addon2" value="<?php echo $dataPelunasanHtg->Supplier; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
