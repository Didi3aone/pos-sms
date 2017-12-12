<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Customer</h3>

<script type="text/javascript">
  function comboTarget(){
           var input=document.forms['form-tambah-customer']['kotaInput'].value;
           var outputArea = document.getElementById("kota");
                      
            var hasil = input.split(",");
           outputArea.value = hasil[1];   
  }

  function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57 ) && (charCode > 45 || charCode < 45))

return false;
return true;
}


</script>

  <form id="form-tambah-customer" method="POST">
    
    <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-tag"></i>
    </span>
    
    <select id="kotaInput" name="kotaInput" onchange="comboTarget()" class="form-control select2" aria-describedby="sizing-addon2" >
        <option>- Pilih Area -</option>
          <?php
          foreach ($dataKota as $kota) {
            ?>
            <option value="<?php echo $kota->Kode; ?>,<?php echo $kota->Keterangan; ?>">
              <?php echo $kota->Kode; ?>
            </option>
            <?php
          }
          ?>
        </select>
  
  
  
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
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Telepon" name="telepon" aria-describedby="sizing-addon2" onkeypress="return isNumberKey(event)">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2" onkeypress="return isNumberKey(event)">
    </div>
	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Area" name="kota" id="kota" aria-describedby="sizing-addon2" readonly>
    </div>
	
  

	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="  glyphicon glyphicon-briefcase"></i>
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
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="email" class="form-control" placeholder="E-mail" name="email" aria-describedby="sizing-addon2">
    </div>
	
    <div class="form-group">
      <div class="col-md-12">
         <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
