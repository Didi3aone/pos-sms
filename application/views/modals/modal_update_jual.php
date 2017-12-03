<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Penjualan</h3>
<br />
<form id="form-update-jual" method="POST">
  <input type="hidden" name="id" value="<?php echo $dataPenjualan->ID; ?>">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-cd"></i>
    </span>
    <input type="text" class="form-control" name="faktur" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Faktur; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" id="tgl" name="tgl" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Tgl; ?>">
  </div>
  <script>
  $(function() {
  $("#tgl").datepicker({
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
  <input type="text" class="form-control" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Kode; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="harga" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Harga; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="qty" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Qty; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="sat" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Satuan; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="jml" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->Jumlah; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
  <input type="text" class="form-control" name="gdg" aria-describedby="sizing-addon2" value="<?php echo $dataPenjualan->gudang; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
