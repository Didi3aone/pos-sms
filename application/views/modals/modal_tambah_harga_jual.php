<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Harga Jual</h3>

  <form id="form-tambah-harga-jual" method="POST">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="jenisUsaha" aria-describedby="sizing-addon2">
      <option>Jenis Usaha</option>
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
      <option>Nama Barang</option>
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
      <input type="text" class="form-control" placeholder="Harga Jual Small" name="hjs" aria-describedby="sizing-addon2">
    </div>
	
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Jual Medium" name="hjm" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-usd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga Jual Large" name="hjl" aria-describedby="sizing-addon2">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
