<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Contact Person 2</h3>

  <form id="form-detail-supplier" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataSupplier->Kode; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->Kode; ?>" readonly>
      </div>
    
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama CP" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->NamaCP1; ?>">
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat CP" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->AlamatCP1; ?>">
      </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Telepon CP" name="telepon" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->TelpCP1; ?>">
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Fax CP" name="fax" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->FaxCP1; ?>">
      </div>
    
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <input type="text" class="form-control" placeholder="Email CP" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->EmailCP1; ?>">
      </div>
   
    
  <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenisUsaha" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->JenisUsaha; ?>">
      </div>
    
   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->EmailCP1; ?>">
      </div> -->
    
    
  </form>
</div>
