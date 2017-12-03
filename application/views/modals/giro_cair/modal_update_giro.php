<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Giro Cair</h3>
<br />
<form id="form-update-giro" method="POST">
  <input type="hidden" name="id" value="<?php echo $dataGiroCair->ID; ?>">
  <input type="hidden" name="kode" value="<?php echo $dataGiro->id; ?>">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>No Bukti</label>
    </span>
    <input type="text" class="form-control" name="no_bukti" aria-describedby="sizing-addon2" value="<?php echo $dataGiroCair->Kode; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Jatuh Tempo</label>
    </span>
  <input type="text" class="form-control" id="jth_tempo" name="jth_tempo" aria-describedby="sizing-addon2" value="<?php echo $dataGiro->JthTmp; ?>">
  </div>
  <script>
  $(function() {
  $("#jth_tempo").datepicker({
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
      <label>Jumlah</label>
    </span>
  <input type="text" class="form-control" name="jumlah" aria-describedby="sizing-addon2" value="<?php echo $dataGiro->Jumlah; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Bank</label>
    </span>
    <select id="bank" name="bank" onchange="terimainputComboxUpdate()" class="form-control select2" aria-describedby="sizing-addon2" style="width:336px;">
        <?php
        foreach ($dataBank as $bank) {
          ?>
          <option value="<?php echo $bank->Kode; ?>"<?php if($bank->Kode == $dataGiroCair->bank){echo "selected"; } ?>>
            <?php echo $bank->Nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
      <input id="kode_bank" value="<?php echo $dataGiroCair->bank ?>" type="text" class="form-control" name="kode_bank" style="width:60px;" readonly>
  </div>
  <script>
  function terimainputComboxUpdate(){
         var input=document.forms['form-update-giro']['bank'].value;
         var outputKode = document.getElementById("kode_bank");
         outputKode.value = input;
  }
  </script>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
