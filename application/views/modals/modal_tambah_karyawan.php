<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Karyawan</h3>

  <form id="form-tambah-karyawan" method="POST">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2">
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
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="jabatan" aria-describedby="sizing-addon2">
      <option>Jabatan</option>
      <?php foreach ($dataJabatan as $jabatan) { ?>
      <option value="<?php echo $jabatan->Kode;?>">
        <?php echo $jabatan->Keterangan; ?></option>
      <?php } ?>
      
    </select>
    </div>

    <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-king"></i>
      </span>
    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-heart"></i>
      </span>
    <input type="text" class="form-control" placeholder="Tanggal Lahir" name="lahir" aria-describedby="sizing-addon2">
    </div>-->
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_lahir" placeholder="Tanggal Lahir" name="lahir">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_lahir").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
</script>

    <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-star"></i>
      </span>
    <input type="text" class="form-control" placeholder="Tanggal Kerja" name="kerja" aria-describedby="sizing-addon2">
    </div>-->
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_kerja" placeholder="Tanggal Kerja" name="kerja">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_kerja").datepicker({
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
        <i class="  glyphicon glyphicon-option-horizontal"></i>
      </span>
    <span class="input-group-addon">
          <input type="radio" name="jenkel" value="L" id="L" class="minimal">
      <label for="L">Laki</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="jenkel" value="P" id="P" class="minimal">
      <label for="P">Perempuan</label>
        </span>
</div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
