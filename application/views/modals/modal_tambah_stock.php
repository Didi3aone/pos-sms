<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Stock</h3>

  <form id="form-tambah-stock" method="POST">
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2">
      </div>
    
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" >
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select class="form-control" name="brand" aria-describedby="sizing-addon2">
      <option>-- PILIH BRAND --</option>
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
      <option>--PILIH SUPPLIER--</option>
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
      <select onchange="terimainputCombox()" class="form-control" id="sat1" name="sat1" aria-describedby="sizing-addon2">
      <option>--PILIH SATUAN--</option>
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
      <select onchange="terimainputCombox()" class="form-control" id="sat2" name="sat2" aria-describedby="sizing-addon2">
      <option>--PILIH SATUAN--</option>
      <?php foreach ($dataSatuan as $satuan) { ?>
      <option value="<?php echo $satuan->Kode;?>">
        <?php echo $satuan->Keterangan; ?></option>
      <?php } ?>
      </select>
      <input type="text" class="form-control" placeholder="Jumlah Satuan 1" name="jml1" aria-describedby="sizing-addon2">
      </div>
    
   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <select onchange="terimainputCombox()" class="form-control" id="sat3" name="sat3" aria-describedby="sizing-addon2">
      <option>--PILIH SATUAN--</option>
      <?php foreach ($dataSatuan as $satuan) { ?>
      <option value="<?php echo $satuan->Kode;?>">
        <?php echo $satuan->Keterangan; ?></option>
      <?php } ?>
      </select>
      <input type="text" class="form-control" placeholder="Jumlah Satuan 2" name="jml2" aria-describedby="sizing-addon2">
      </div>
    
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Kecil (S)" name="small" aria-describedby="sizing-addon2">
      <span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="minimal" aria-describedby="sizing-addon2" name="viewSat1" id="viewSat1" readonly>
    </span>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Sedang (M)" name="medium" aria-describedby="sizing-addon2">
      <span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="minimal" aria-describedby="sizing-addon2" name="viewSat2" id="viewSat2" readonly>
    </span>
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Besar (L)" name="large" aria-describedby="sizing-addon2">
      <span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="minimal" aria-describedby="sizing-addon2" name="viewSat3" id="viewSat3" readonly>
    </span>
    </div>

   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Minimal" name="min" aria-describedby="sizing-addon2">
<span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="minimal" aria-describedby="sizing-addon2" name="viewSat1_1" id="viewSat1_1" readonly>
    </span>
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Maksimal" name="max" aria-describedby="sizing-addon2">
      <span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="minimal" aria-describedby="sizing-addon2" name="viewSat1_2" id="viewSat1_2" readonly>
    </span>
    </div>
  
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" onClick="window.location.reload('stock/home')"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  function terimainputCombox(){
           var satuan1=document.forms['form-tambah-stock']['sat1'].value;
           var satuan2=document.forms['form-tambah-stock']['sat2'].value;
           var satuan3=document.forms['form-tambah-stock']['sat3'].value;
           var outputSatuan1 = document.getElementById("viewSat1");
           var outputSatuan2 = document.getElementById("viewSat2");
           var outputSatuan3 = document.getElementById("viewSat3");
           var outputSatuan1_1 = document.getElementById("viewSat1_1");
           var outputSatuan1_2 = document.getElementById("viewSat1_2"); 
           outputSatuan1.value = satuan1;
           outputSatuan2.value = satuan2;
           outputSatuan3.value = satuan3;
           outputSatuan1_1.value = satuan1;
           outputSatuan1_2.value = satuan1;  
            
}
</script>
