<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Brand</h3>

  <form id="form-tambah-brand" method="POST">
    <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2">
    </div>-->
    <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-tag"></i>
    </span>
    <?php
    foreach ($this->M_brand->last_record() as $row) {
      $kode = $row->Kode;
      $convKode = (int)$kode+1;
     ?>
  <input type="text" class="form-control" value="<?php echo $convKode; ?>" name="kode" aria-describedby="sizing-addon2" readonly>
  <?php
}
?>
  </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-th-large"></i>
      </span>
    <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
    </div>
	
	<!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-credit-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="Supplier" name="supp" aria-describedby="sizing-addon2">
    </div>-->

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="  glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="supp" aria-describedby="sizing-addon2">
      <option>Supplier</option>
      <?php foreach ($dataSupplier as $supplier) { ?>
      <option value="<?php echo $supplier->Kode;?>">
        <?php echo $supplier->Nama; ?></option>
      <?php } ?>
      
    </select>
    </div>
	
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" onClick="window.location.reload('brand/home')"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
