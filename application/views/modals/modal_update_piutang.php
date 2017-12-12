<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Piutang</h3>

  <form id="form-update-piutang" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataPiutang->ID; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->Kode; ?>" readonly>
      </div>

      <!--<div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-th-list"></i>
        </span>
      <input type="text" class="form-control" placeholder="Tanggal" id="tgl_piutang" name="tanggal" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->Tanggal; ?>">
    </div>-->
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_piutang_update" placeholder="Tanggal Piutang" name="tanggal" value="<?php echo $dataPiutang->Tanggal; ?>">
                    </div>
                     
                  </div>
<script>
$(function() {
   $("#tgl_piutang_update").datepicker({
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
        <i class="glyphicon glyphicon-tasks"></i>
      </span>
      <input type="text" class="form-control" placeholder="Faktur" name="faktur" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->Faktur; ?>">
      </div>

      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="customer" aria-describedby="sizing-addon2">
      <option value="<?php echo $dataPiutang->KodeCus;?>"><?php echo $dataPiutang->Customer; ?></option>
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
      <input type="text" class="form-control" placeholder="Faktur Asli" name="fakasli" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->FakturAsli; ?>">
      </div>
    
   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-bookmark"></i>
      </span>
      <input type="text" class="form-control" placeholder="Piutang" name="piutang" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->Piutang; ?>">
      </div>
    
    <!--<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
      </span>
      <input type="text" class="form-control" placeholder="Status" name="status" aria-describedby="sizing-addon2" value="<?php echo $dataPiutang->Status; ?>">
      </div>
   <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cd"></i>
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
          <input type="radio" name="status" value="Belum Bayar" id="BB" class="minimal" <?php if($dataPiutang->Status == "Belum Bayar"){echo "checked='checked'";} ?>>
      <label for="BB">Belum Bayar</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="Belum Lunas" id="BL" class="minimal" <?php if($dataPiutang->Status == "Belum Lunas"){echo "checked='checked'";} ?>>
      <label for="BL">Belum Lunas</label>
        </span>
         <span class="input-group-addon">
          <input type="radio" name="status" value="Lunas" id="L" class="minimal" <?php if($dataPiutang->Status == "Lunas"){echo "checked='checked'";} ?>>
      <label for="L">Lunas</label>
        </span>
</div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary" > <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
