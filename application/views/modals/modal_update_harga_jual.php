<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Harga Jual</h3>

  <form id="form-update-harga-jual" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataHargaJual->ID; ?>">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="jenisUsaha" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataHargaJual->KodeJenis;?>"><?php echo $dataHargaJual->JenisUsaha; ?></option>
      <?php foreach ($dataJenisUsaha as $jenisUsaha) { ?>
      <option value="<?php echo $jenisUsaha->Kode;?>">
        <?php echo $jenisUsaha->Keterangan; ?></option>
      <?php } ?>
      
    </select>
    </div>
	  
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="kode" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataHargaJual->KodeBarang;?>"><?php echo $dataHargaJual->Barang; ?></option>
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
      <input type="text" class="form-control" placeholder="Harga Jual Small" name="hjs" aria-describedby="sizing-addon2" value="<?php echo $dataHargaJual->HJS; ?>">
      </div>
	 

  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Jual Medium" name="hjm" aria-describedby="sizing-addon2" value="<?php echo $dataHargaJual->HJM; ?>">
      </div>


  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Jual Large" name="hjl" aria-describedby="sizing-addon2" value="<?php echo $dataHargaJual->HJL; ?>">
      </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
