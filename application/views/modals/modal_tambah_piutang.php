
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Piutang</h3>

  <form id="form-tambah-piutang" method="POST">

    <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-qrcode"></i>
    </span>
    <?php 
    foreach ($this->M_piutang->last_record() as $row) {
      $kode = $row->Kode;
      $convKode = (int)$kode+1;
     ?>
  <input type="text" class="form-control" value="<?php echo $convKode; ?>" name="kode" aria-describedby="sizing-addon2" readonly>
  <?php
}
?>
  </div>


    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_piutang" placeholder="Tanggal Piutang" name="tanggal">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_piutang").datepicker({
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
        <i class="glyphicon glyphicon-tasks"></i>
      </span>
      <input type="text" class="form-control" placeholder="Faktur" name="faktur" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="customer" aria-describedby="sizing-addon2">
      <option>Customer</option>
      <?php foreach ($dataCustomer as $customer) { ?>
      <option value="<?php echo $customer->Kode;?>">
        <?php echo $customer->Nama; ?></option>
      <?php } ?>
      
    </select>
    </div>
    

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tasks"></i>
      </span>
      <input type="text" class="form-control" placeholder="Faktur Asli" name="fakasli" aria-describedby="sizing-addon2">
    </div>
  
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-bookmark"></i>
      </span>
      <input type="text" class="form-control" placeholder="Piutang" name="piutang" aria-describedby="sizing-addon2">
    </div>

  
 <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        
      <input type="radio"  name="status" value="Belum Bayar" checked>Belum Bayar
      <input type="radio"  name="status" value="Belum Lunas" checked>Belum Lunas
      <input type="radio"  name="status" value="Lunas" checked>Lunas
    </span>
    </div>-->
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="  glyphicon glyphicon-option-horizontal"></i>
      </span>
    <span class="input-group-addon">
          <input type="radio" name="status" value="Belum Bayar" id="BB" class="minimal">
      <label for="BB">Belum Bayar</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="Belum Lunas" id="BL" class="minimal">
      <label for="BL">Belum Lunas</label>
        </span>
         <span class="input-group-addon">
          <input type="radio" name="status" value="Lunas" id="L" class="minimal">
      <label for="L">Lunas</label>
        </span>
</div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" onClick="window.location.reload('piutang/home')"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
