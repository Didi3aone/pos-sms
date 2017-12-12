<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Customer</h3>

  <form id="form-update-customer" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataCustomer->Kode; ?>">
   
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Kode; ?>" readonly>
      </div>
	  
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Nama; ?>">
    </div>
	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Alamat; ?>">
      </div>
<script>
  

  function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57)&& (charCode > 45 || charCode < 45))

return false;
return true;
}


</script>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Telepon" name="telepon" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Telepon; ?>" >
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Fax; ?>" onkeypress="return isNumberKey(event)">
      </div>
	  
	 <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Area" name="kota" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->Kota; ?>" readonly>
      </div>
	  
	 
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="jenisUsaha" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataCustomer->KodeJenis;?>"><?php echo $dataCustomer->JenisUsaha; ?></option>
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
      <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataCustomer->EmailCP1; ?>">
      </div>
	  
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" > <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>

