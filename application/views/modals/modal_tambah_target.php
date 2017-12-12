<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Target</h3>

  <form id="form-tambah-target" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <select class="form-control" placeholder="kode" name="kode" id="kode" aria-describedby="sizing-addon2">
      <option>Kode</option>   
      <?php foreach ($dataSalesman as $salesman) { ?>
      <option value="<?php echo $salesman->Kode;?>,<?php echo $salesman->Nama;?>,<?php echo $salesman->Alamat;?>" >
        <?php echo $salesman->Nama; ?> </option>
       <?php } ?>

    </select>
  </div>
  <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-bullhorn"></i>
      </span>
    <input type="text" class="form-control" placeholder="Keterangan" name="ket" aria-describedby="sizing-addon2">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-check"></i>
    </span>
    <span class="input-group-addon">
          <input type="radio" name="jenis" value="UT" id="UT" class="minimal">
      <label for="UT">Target Utama</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="jenis" value="BS" id="BS" class="minimal">
      <label for="BS">Target BS</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="jenis" value="LN" id="LN" class="minimal">
      <label for="LN">Target Lain</label>
        </span>
      </div>-->
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
