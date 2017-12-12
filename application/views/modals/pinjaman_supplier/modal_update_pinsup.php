<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Pembelian</h3>
<br />
<form id="form-update-pinsup" method="POST">
  <input type="hidden" name="id" value="<?php echo $dataPinjamanSup->id; ?>">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Tanggal</label>
    </span>
  <input type="text" class="form-control" id="tanggal" name="tanggal" aria-describedby="sizing-addon2" value="<?php echo $dataPinjamanSup->tgl; ?>">
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
      <label>Supplier</label>
    </span>
    <select id="nama_supplier" name="nama_supplier" onchange="terimainputComboxUpdate()" class="form-control select2" aria-describedby="sizing-addon2" style="width:240px;">
        <?php
        foreach ($dataSupplier as $supplier) {
          ?>
          <option value="<?php echo $supplier->Kode; ?>"<?php if($supplier->Kode == $dataPinjamanSup->supplier){echo "selected"; } ?>>
            <?php echo $supplier->Nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
      <input id="kode_supplier" value="<?php echo $dataPinjamanSup->supplier ?>" type="text" class="form-control" name="kode_supplier" style="width:60px;" readonly>
</div>
<script>
function terimainputComboxUpdate(){
       var input=document.forms['form-update-pinsup']['nama_supplier'].value;
       var outputKode = document.getElementById("kode_supplier");
       outputKode.value = input;
}
</script>
  <div class="input-group form-group">
    <span class="input-group-addon">
      <label>Keterangan</label>
    </span>
  <textarea name="keterangan" id="text" cols="50" rows="5" class="form-control" style="width:355px;"><?php echo $dataPinjamanSup->keterangan; ?></textarea>
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Penerima</label>
    </span>
  <input type="text" class="form-control" name="penerima" aria-describedby="sizing-addon2" value="<?php echo $dataPinjamanSup->penerima; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Jumlah</label>
    </span>
  <input type="text" class="form-control" name="jumlah" aria-describedby="sizing-addon2" value="<?php echo $dataPinjamanSup->jumlah; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
