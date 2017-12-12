<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Karyawan</h3>

  <form id="form-update-karyawan" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataKaryawan->ID; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->Kode; ?>">
      </div>

      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->Nama; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-road"></i>
        </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->Alamat; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="jabatan" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataKaryawan->KodeJab; ?>"><?php echo $dataKaryawan->Jabatan; ?></option>
      <?php foreach ($dataJabatan as $jabatan) { ?>
      <option value="<?php echo $jabatan->Kode;?>">
        <?php echo $jabatan->Keterangan; ?></option>
      <?php } ?>
      
    </select>
    </div>

    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_lahir_update" placeholder="Tanggal Lahir" name="lahir" value="<?php echo $dataKaryawan->Lahir; ?>">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_lahir_update").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd ",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
</script>

    <!--<div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-heart"></i>
        </span>
      <input type="text" class="form-control" placeholder="Tanggal Lahir" name="lahir" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->tgllahir; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-star"></i>
        </span>
      <input type="text" class="form-control" placeholder="Tanggal Kerja" name="kerja" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->tglkerja; ?>">
    </div>-->
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_kerja_update" placeholder="Tanggal Kerja" name="kerja" value="<?php echo $dataKaryawan->Kerja; ?>">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_kerja_update").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd ",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
</script>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
      <!--<input type="text" class="form-control" placeholder="Jenis Kelamin" name="jenkel" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->jk; ?>">
    </div>-->
    <span class="input-group-addon">
              <input type="radio" name="jenkel" value="L" id="L" class="minimal" <?php if($dataKaryawan->JK == "L"){echo "checked='checked'";} ?>>
          <label for="L">Laki</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="jenkel" value="P" id="P" class="minimal" <?php if($dataKaryawan->JK == "P"){echo "checked='checked'";} ?>>
          <label for="P">Perempuan</label>
            </span>
</div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
