<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Brand</h3>

  <form id="form-update-brand" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBrand->ID; ?>">
   
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataBrand->Kode; ?>" readonly>
      </div>
	  
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-th-large"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBrand->Keterangan; ?>">
    </div>
	
	<!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-credit-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="Supplier" name="supp" aria-describedby="sizing-addon2" value="<?php echo $dataBrand->Supplier; ?>">
      </div>-->
	 
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="supp" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataBrand->KodeJenis;?>"><?php echo $dataBrand->Supplier; ?></option>
      <?php foreach ($dataSupplier as $supplier) { ?>
      <option value="<?php echo $supplier->Kode;?>">
        <?php echo $supplier->Nama; ?></option>
      <?php } ?>
      
    </select>
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" onClick="window.location.reload('brand/home')"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
