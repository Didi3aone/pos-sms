<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
<div class="form-msg"></div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 style="display:block; text-align:center;">Update Data Retur Penjualan</h3>
<br />
<form id="form-update-returpjl" method="POST">
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Kode</label>
    </span>
  <input type="text" class="form-control" id="kode1" name="kode1" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->Kode; ?>" readonly>
</div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Nama</label>
    </span>
    <select id="nama_barang" name="nama_barang" onchange="terimainputComboxUpdate()" class="form-control select2" aria-describedby="sizing-addon2">
      <?php
      foreach ($dataStock as $stock) {
        ?>
        <option value="<?php echo $stock->Nama; ?>,<?php echo $stock->Kode; ?>"<?php if($stock->Nama == $dataReturUpdate->Nama){echo "selected"; } ?>>
          <?php echo $stock->Nama; ?>
        </option>
        <?php
      }
      ?>
      </select>
         </div>

      <script>
         function terimainputComboxUpdate(){
                var input=document.forms['form-update-returpjl']['nama_barang'].value;
                var outputKode = document.getElementById("kode1");
                var hasil = input.split(",");
                outputKode.value = hasil[1];
       }
      </script>

  <div class="input-group form-group">
    <span class="input-group-addon">
      <label>Qty</label>
    </span>
    <select id="qty" name="qty" class="form-control select2" aria-describedby="sizing-addon2">
      <?php
      for($i=1; $i<=100; $i++) {
        ?>
        <option value="<?= $i ?>">
          <?php echo $i; ?>
        </option>
        <?php
      }
      ?>
      </select>
    </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Satuan</label>
    </span>
    <select id="satuan" name="satuan" class="form-control select2" aria-describedby="sizing-addon2">
      <?php
      foreach ($dataSatuan as $satuan) {
        ?>
        <option value="<?php echo $satuan->Kode; ?>"<?php if($satuan->Kode == $dataReturUpdate->Satuan){echo "selected"; } ?>>
          <?php echo $satuan->Kode; ?>
        </option>
        <?php
      }
      ?>
      </select>
      </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Harga</label>
    </span>
  <input type="text" class="form-control" name="harga" id="harga" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->Harga; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Disc 1</label>
    </span>
  <input type="text" class="form-control" name="disc1" id="disc1" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->Discount; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Disc 2</label>
    </span>
  <input type="text" class="form-control" name="disc2" id="disc2" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->Discount2; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Disc 3</label>
    </span>
  <input type="text" class="form-control" name="disc3" id="disc3" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->DiscRp; ?>">
  </div>
  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <label>Total</label>
    </span>
  <input type="text" class="form-control" name="total" id="total" aria-describedby="sizing-addon2" value="<?php echo $dataReturUpdate->Jumlah; ?>">
  </div>
  <div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
    </div>
  </div>
</form>
</div>
