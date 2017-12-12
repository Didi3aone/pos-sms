<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Detail Data Stock</h3>

  <form id="form-detail-stock" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataStock->ID; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i> SMALL
      </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" placeholder="Jumlah Kecil (S)" name="small" aria-describedby="sizing-addon2" value="<?php echo $dataStock->S;?>" readonly>
    </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Satuan1;?>" readonly>
    </span>
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i> MEDIUM
      </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" placeholder="Jumlah Sedang (M)" name="medium" aria-describedby="sizing-addon2" value="<?php echo $dataStock->M;?>" readonly>
    </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Satuan2;?>" readonly>
    </span>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag" ></i> LARGE
      </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" placeholder="Jumlah Besar (L)" name="large" aria-describedby="sizing-addon2" value="<?php echo $dataStock->L;?>" readonly>
    </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Satuan3;?>" readonly>
    </span>
    </div>

<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i> MIN
      </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" placeholder="Jumlah Minimum" name="min" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Min;?>" readonly>
    </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Satuan1;?>" readonly>
    </span>
    </div>

<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i> MAX
      </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" placeholder="Jumlah Maximum" name="max" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Max;?>" readonly>
    </span><span class="input-group-addon" id="sizing-addon2">
      <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $dataStock->Satuan1;?>" readonly>
    </span>
    </div>
        
    <!-- <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Simpan Data</button>
      </div>
    </div> -->
  </form>
</div>
  