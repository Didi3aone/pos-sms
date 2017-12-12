<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Piutang Karyawan</h3>
<br />
<form id="form-update-piukar" method="POST">
  <input type="hidden" name="id" value="<?php echo $dataPiutang->id; ?>">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Tanggal</label>
    </span>
  <input type="text" class="form-control" id="tanggal" name="tanggal" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->tgl; ?>">
  </div>
  <script>
  $(function() {
  $("#tanggal").datepicker({
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
      <label>Nama</label>
    </span>
    <select id="nama_karyawan" name="nama_karyawan" onchange="terimainputComboxUpdate()" class="form-control select2" aria-describedby="sizing-addon2" style="width:240px;">
        <?php
        foreach ($dataPegawai as $pegawai) {
          ?>
          <option value="<?php echo $pegawai->nama; ?>,<?php echo $pegawai->kode; ?>,<?php echo $pegawai->jabatan; ?>"<?php if($pegawai->nama == $dataKaryawan->nama){echo "selected"; } ?>>
            <?php echo $pegawai->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
      <input id="nama" type="hidden" class="form-control" name="nama" style="width:60px;" readonly>
      <input id="kode_karyawan" value="<?php echo $dataKaryawan->kode ?>" type="text" class="form-control" name="kode_karyawan" style="width:60px;" readonly>
     </div>
  <div class="input-group form-group">
    <span class="input-group-addon">
      <label>Jabatan</label>
    </span>
    <input type="text" class="form-control" name="jbt" id="jbt" aria-describedby="sizing-addon2" value="<?php echo $dataKaryawan->jabatan; ?>">
  </div>
  <script>
  function terimainputComboxUpdate(){
         var input=document.forms['form-update-piukar']['nama_karyawan'].value;
         var outputNama = document.getElementById("nama");
         var outputKode = document.getElementById("kode_karyawan");
         var outputJabatan = document.getElementById("jbt");
         var hasil = input.split(",");
         outputNama.value = hasil[0];
         outputKode.value = hasil[1];
         outputJabatan.value = hasil[2];
}
  </script>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Jumlah</label>
    </span>
  <input type="text" class="form-control" name="jumlah" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->jumlah; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
