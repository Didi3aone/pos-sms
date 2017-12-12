<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan').click(function() {
       toastr.success('Data pinjaman supplier berhasil disimpan.');
    });
});
</script>

<div class="box">
  <div class="box-header">
    <form id="formPembelian" action="" method="post">

      <input type="hidden" name="today" id="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <input type="hidden" name="user" id="user" value="<?php echo $getUser[0]->name; ?>">
      <label>Tanggal</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl" value=<?php echo date("Y-m-d"); ?> name="tgl" style="width:150px;">
                    </div>
                    <!-- /.input group -->
                  </div>
    <label>Nomor Kendaraan</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon">
                      <i class="fa fa-automobile"></i>
                    </span>
                    <input id="no_kendaraan" type="text" class="form-control" name="no_kendaraan" style="width:150px;">
                  </div>
      <label>Keterangan</label>
      <div class="input-group form-group">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
      <textarea name="keterangan" id="keterangan" cols="50" rows="5" class="form-control" style="width:300px;"></textarea>
      </div>

 <script>
  $(function() {
    $("#tgl").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
  </script>
<hr />

  <div class="col-md-4">
    <button type="button" id="btnLoad" onclick="loadBarang()" class="btn btn-primary btn-block"><i class="fa fa-hourglass-start"></i> Load Faktur Penjualan</button><a id="ack"></a>
  </div>

</form>
<br /><br /><br />

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th style="text-align: center; vertical-align: middle;">No</th>
      <th style="text-align: center; vertical-align: middle;">Faktur</th>
      <th style="text-align: center; vertical-align: middle;">Tanggal</th>
      <th style="text-align: center; vertical-align: middle;">Customer</th>
    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataLoading as $loading) {
        ?>
        <tr>
          <td style="text-align: center; vertical-align: middle;"><?php echo $no; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loading->faktur; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo date("d-m-Y", strtotime($loading->tanggal)); ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loading->customer; ?></td>
        </tr>
         <?php
        $no++;
        }
        ?>
</table>
</div>
<hr />
<h3 style="text-align: center;">LIST LOADING BARANG </h3>
<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
        <th rowspan="2" style="text-align: center; vertical-align: middle;" >No</th>
        <th rowspan="2" style="text-align: center; vertical-align: middle;">Kode</th>
        <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama</th>

        <th colspan="3" style="text-align: center; vertical-align: middle;">Quantity</th>
    </tr>
    <tr>
        <th style="text-align: center;">L</th>
        <th style="text-align: center;">M</th>
        <th style="text-align: center;">S</th>

    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataLoadBarang as $loadBarang) {
        ?>
        <tr>
          <td style="text-align: center; vertical-align: middle;"><?php echo $no; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loadBarang->kode; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loadBarang->nama; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loadBarang->L; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loadBarang->M; ?></td>
          <td style="text-align: center; vertical-align: middle;"><?php echo $loadBarang->S; ?></td>

        </tr>
         <?php
        $no++;
        }
        ?>
</table>
</div>
<hr />

<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>LoadingBarang/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Tambah Baru</a>
<hr />
</div>
<div class="col-md-4 text-left">
  <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button>
<hr />
</div>
<div class="col-md-4 text-right">
<button onclick="simpanTransaksi()" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
<hr />
</div>

<!-- Modal Pencarian -->
<div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:485px">
                    <div class="modal-body">
                      <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="display:block; text-align:center;">Cari Loading Barang</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <select id="ketCari" name="ketCari" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Customer -</option>
                                <?php
                                foreach ($dataLoadingCus as $loadingCus) {
                                  ?>
                                  <option value="<?php echo $loadingCus->Keterangan; ?>">
                                    <?php echo $loadingCus->Keterangan; ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnCari" onclick="cariLoading()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Cari</button><a id="ackCariPinSup"></a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
            </div>
        </div>
<!-- End Modal -->


<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<div id="tempat-modalLoad"></div>
<div id="tempat-modalCari"></div>

<script>
function loadBarang(){

      $.ajax({
      url: "<?php echo site_url('LoadingBarang/load');?>",
      type: 'POST',
      cache: false,
      data: {
      "keterangan": $("#keterangan").val()},
      success: function(data) {
      $('#tempat-modalLoad').html(data);
      $('#load-barang').modal('show');
      }
      });

}

function cariLoading(){

      $.ajax({
      url: "<?php echo site_url('LoadingBarang/pencarianLoading');?>",
      type: 'POST',
      cache: false,
      data: {
      "ketCari": $("#ketCari").val()},
      success: function(data) {
      $('#tempat-modalCari').html(data);
      $('#modalCari').modal('hide');
      $('#cari-load-barang').modal('show');
      }
      });

}
</script>



  </div>
  <!-- /.box-header -->

</div>
