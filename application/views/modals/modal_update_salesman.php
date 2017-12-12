<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Salesman</h3>

  <form id="form-update-salesman" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataSalesman->Kode; ?>">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Kode; ?>" readonly>
      </div>

      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Nama; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-road"></i>
        </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Alamat; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-road"></i>
        </span>
      <input type="text" class="form-control" placeholder="Kota" name="kota" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Kota; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-phone-alt"></i>
        </span>
      <input type="text" class="form-control" placeholder="Telepon" name="telepon" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Telepon; ?>">
    </div>

 <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-print"></i>
        </span>
      <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Fax; ?>">
    </div>

 <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-phone"></i>
        </span>
      <input type="text" class="form-control" placeholder="Handphone" name="hp" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->HP; ?>">
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-envelope"></i>
        </span>
      <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataSalesman->Email; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
