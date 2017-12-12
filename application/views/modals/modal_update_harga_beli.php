<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Harga Beli</h3>

  <form id="form-update-harga-beli" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataHargaBeli->ID; ?>">
    <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Supplier" name="supplier" aria-describedby="sizing-addon2" value="<?php echo $dataHargaBeli->Supplier; ?>">
      </div>-->

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="supplier" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataHargaBeli->KodeSupp;?>"><?php echo $dataHargaBeli->Supplier; ?></option>
      <?php foreach ($dataSupplier as $supplier) { ?>
      <option value="<?php echo $supplier->Kode;?>">
        <?php echo $supplier->Nama; ?></option>
      <?php } ?>
      
    </select>
    </div>
	  
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="kode" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataHargaBeli->KodeBarang;?>"><?php echo $dataHargaBeli->Barang; ?></option>
      <?php foreach ($dataStock as $stock) { ?>
      <option value="<?php echo $stock->Kode;?>">
        <?php echo $stock->Nama; ?></option>
      <?php } ?>
      
    </select>
    </div>
	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Beli Small" name="hjs" aria-describedby="sizing-addon2" value="<?php echo $dataHargaBeli->HJS; ?>">
      </div>
	 

  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Beli Medium" name="hjm" aria-describedby="sizing-addon2" value="<?php echo $dataHargaBeli->HJM; ?>">
      </div>


  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Beli Large" name="hjl" aria-describedby="sizing-addon2" value="<?php echo $dataHargaBeli->HJL; ?>">
      </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
