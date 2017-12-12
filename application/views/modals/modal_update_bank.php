<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Bank</h3>

  <form id="form-update-bank" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBank->ID; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataBank->Kode; ?>">
      </div>
	  
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-briefcase"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBank->Nama; ?>">
    </div>
	
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Atas Nama" name="an" aria-describedby="sizing-addon2" value="<?php echo $dataBank->AN; ?>">
      </div>
	  
	 <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-credit-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="Rekening" name="rek" aria-describedby="sizing-addon2" value="<?php echo $dataBank->Rek; ?>">
      </div>
	  
	 <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-link"></i>
      </span>
      <input type="text" class="form-control" placeholder="Akuntansi" name="akun" aria-describedby="sizing-addon2" value="<?php echo $dataBank->Akun; ?>">
      </div>
	 
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
