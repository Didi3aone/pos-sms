<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Saldo Awal</h3>

  <form id="form-tambah-saldo-awal" method="POST">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <select class="form-control" placeholder="Nama Barang" name="kode" aria-describedby="sizing-addon2">
      <option>Kode</option>
      <?php foreach ($dataStock as $stock) { ?>
      <option value="<?php echo $stock->Kode;?>">
        <?php echo $stock->Nama; ?></option>
      <?php } ?>
    </select>
  </div>
    <?php if( isset($_POST['kode'])) { ?>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-th-large"></i>
      </span>
      <span class="input-group-addon">
    <input type="text" class="minimal" placeholder="Jumlah Satuan Dalam (S)" name="small" aria-describedby="sizing-addon2" value="<?php echo $dataStock->JmlSat1;?>"></span>
    </span>
    <span class="input-group-addon">
    <input type="text" class="minimal" placeholder="Jumlah Satuan Dalam (S)" name="jml1" aria-describedby="sizing-addon2" value="<?php echo $dataStock->JmlSat1;?>"></span>
    </div> 

    <?php } 
    else { echo "Masukkan Barang Dulu"; } ?>
   


    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
