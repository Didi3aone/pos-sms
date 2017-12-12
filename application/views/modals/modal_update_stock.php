<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Stock</h3>

  <form id="form-update-stock" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataStock->ID; ?>">
   
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Kode; ?>" readonly>
      </div>
    
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="brand" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataStock->KodeBrand;?>"><?php echo $dataStock->Merk; ?></option>
      <?php foreach ($dataBrand as $brand) { ?>
      <option value="<?php echo $brand->Kode;?>">
        <?php echo $brand->Keterangan; ?></option>
      <?php } ?>
      
    </select>
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="supplier" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataStock->KodeSupp;?>"><?php echo $dataStock->Supplier; ?></option>
      <?php foreach ($dataSupplier as $supplier) { ?>
      <option value="<?php echo $supplier->Kode;?>">
        <?php echo $supplier->Nama; ?></option>
      <?php } ?>
    </select>
    </div>

<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="sat1" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataStock->KodeSat1;?>"><?php echo $dataStock->Satuan1; ?></option>
      <?php foreach ($dataSatuan as $satuan) { ?>
      <option value="<?php echo $satuan->Kode;?>">
        <?php echo $satuan->Keterangan; ?></option>
      <?php } ?>
      </select>
    </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-print"></i>
      </span>
      <select class="form-control" name="sat2" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataStock->KodeSat2;?>"><?php echo $dataStock->Satuan2; ?></option>
      <?php foreach ($dataSatuan as $satuan) { ?>
      <option value="<?php echo $satuan->Kode;?>">
        <?php echo $satuan->Keterangan; ?></option>
      <?php } ?>
      </select>
      <input type="text" class="form-control" placeholder="Jumlah Satuan 1" name="jml1" aria-describedby="sizing-addon2" value="<?php echo $dataStock->JmlSat1; ?>">
      </div>
    
   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <select class="form-control" name="sat3" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataStock->KodeSat3;?>"><?php echo $dataStock->Satuan3; ?></option>
      <?php foreach ($dataSatuan as $satuan) { ?>
      <option value="<?php echo $satuan->Kode;?>">
        <?php echo $satuan->Keterangan; ?></option>
      <?php } ?>
      </select>
      <input type="text" class="form-control" placeholder="Jumlah Satuan 2" name="jml2" aria-describedby="sizing-addon2" value="<?php echo $dataStock->JmlSat2; ?>">
      </div>
    
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Kecil (S)" name="small" aria-describedby="sizing-addon2" value="<?php echo $dataStock->S; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Sedang (M)" name="medium" aria-describedby="sizing-addon2" value="<?php echo $dataStock->M; ?>">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Besar (L)" name="large" aria-describedby="sizing-addon2" value="<?php echo $dataStock->L; ?>">
    </div>

   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Minimal" name="min" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Min; ?>">
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Maksimal" name="max" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Max; ?>">
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" onClick="window.location.reload('stock/home')"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
