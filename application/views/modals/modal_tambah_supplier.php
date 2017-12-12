<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Supplier</h3>

  <form id="form-tambah-supplier" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <?php
        $i = $dataKode[0]->Kode; ?>
        <?php foreach ($dataKode as $kode) {
        $i++; } ?>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?= $i ?>" readonly>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
    <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kota" name="kota" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="  glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Telepon" name="telepon" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama CP" name="nama" aria-describedby="sizing-addon2">
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat CP" name="alamat" aria-describedby="sizing-addon2">
      </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Telepon CP" name="telepon" aria-describedby="sizing-addon2">
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Fax CP" name="fax" aria-describedby="sizing-addon2" >
      </div>
    
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Email CP" name="email" aria-describedby="sizing-addon2">
      </div>
  
  
  
 <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenisUsaha" aria-describedby="sizing-addon2">
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="email" class="form-control" placeholder="E-mail" name="email" aria-describedby="sizing-addon2">
    </div> -->
  
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
