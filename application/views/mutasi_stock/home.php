<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan').click(function() {
       toastr.success('Data piutang karyawan berhasil disimpan.');
    });
});
</script>

<div class="box">
  <div class="box-header">
    <form id="formMutasi" action="" method="post">
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

                <label>Gudang Asal</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon">
                      <i class="fa fa-building-o"></i>
                    </span>
                    <select id="gudang_asal" name="gudang_asal" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:145px;">
                      <option value="">- Pilih Gudang -</option>
                        <?php
                        foreach ($dataGudang as $gudang) {
                          ?>
                          <option value="<?php echo $gudang->Kode; ?>,<?php echo $gudang->Keterangan; ?>">
                            <?php echo $gudang->Kode; ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                      <input id="nm_gudang_asal" type="text" class="form-control" placeholder="Kode" name="nm_gudang_asal" style="width:200px;" readonly>
                  </div>
                  <label>Gudang Tujuan</label>
                                <div class="input-group form-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                  </span>
                                  <select id="gudang_tujuan" name="gudang_tujuan" onchange="terimainputCombox2()" class="form-control select2" aria-describedby="sizing-addon2" style="width:145px;">
                                    <option value="">- Pilih Gudang -</option>
                                    <?php
                                    foreach ($dataGudang as $gudang) {
                                      ?>
                                      <option value="<?php echo $gudang->Kode; ?>,<?php echo $gudang->Keterangan; ?>">
                                        <?php echo $gudang->Kode; ?>
                                      </option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                    <input id="nm_gudang_tujuan" type="text" class="form-control" placeholder="Kode" name="nm_gudang_tujuan" style="width:200px;" readonly>
                                </div>
                  <script>
                  function terimainputCombox(){
                         var input=document.forms['formMutasi']['gudang_asal'].value;
                         var outputNama = document.getElementById("nm_gudang_asal");
                         var hasil = input.split(",");
                         outputNama.value = hasil[1];
                }
                function terimainputCombox2(){
                       var input2=document.forms['formMutasi']['gudang_tujuan'].value;
                       var outputNama2 = document.getElementById("nm_gudang_tujuan");
                       var hasil2 = input2.split(",");
                       outputNama2.value = hasil2[1];
              }
                  </script>
                  <label>Keterangan</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-option-horizontal"></i>
                    </span>
                  <textarea name="keterangan" id="keterangan" cols="50" rows="5" class="form-control" style="width:300px;"></textarea>
                  </div>

<form id="formTambah" action="" method="post" name="tabelInput">
                  <div class="input-group form-group">
                    <!-- <?php
                      $i = 1; ?>
                      <?php foreach ($dataTempGiro as $tempGiro) {
                      $i++; } ?> -->
                      <input type="text" class="form-control" value=<?= $i ?> name="nomor" id="nomor" style="width:50px;">

                      <input type="text" class="form-control" placeholder="Kode" name="no_bukti" id="no_bukti" style="width:150px;" readonly>
                      <select id="bank" name="bank" class="form-control select2" aria-describedby="sizing-addon2" style="width:250px;">
                        <option value="">- Pilih Nama Barang -</option>
                        <?php
                        foreach ($dataStock as $stock) {
                          ?>
                          <option value="<?php echo $stock->Nama; ?>">
                            <?php echo $stock->Nama; ?>
                          </option>
                          <?php
                        }
                        ?>
                        </select>
                      <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="0" style="width:203px;">
                      <select id="bank" name="bank" class="form-control select2" aria-describedby="sizing-addon2" style="width:203px;">
                        <option value="">- Pilih Satuan -</option>
                        <option>CRT</option>
                        <option>PAC</option>
                        <option>PCS</option>
                        </select>
                      </div>

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Qty</th>
      <th>Satuan</th>
    </tr>
    <thead>
    <!-- <?php
      $no = 1;
      foreach ($dataTempGiro as $tempGiro) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $tempGiro->no_bukti; ?></td>
          <td><?php echo date("d-m-Y", strtotime($tempGiro->jatuh_tempo)); ?></td>
          <td><?php echo $tempGiro->jumlah; ?></td>
          <td><?php echo $tempGiro->bank; ?></td>
        </tr>
         <?php
        $no++;
        }
        ?> -->
</table>
</div>
<hr>
<button class="btn btn btn-success btn-block" onClick="inputTambah()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
<button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
</form>
<hr />

<div class="col-md-4 text-left">
  <a href="<?php echo base_url();?>PiutangKaryawan/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
<hr />
</div>
<div class="col-md-4 text-right">
  <button type="button" id="simpan" onClick="save()" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Simpan</button><a id="ack"></a>
<hr />
</div>
</form>
<div class="col-md-4 text-left">
  <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button>
<hr />
</div>

<script>
function save(){

    $.ajax({
    url: "<?php echo site_url('PiutangKaryawan/prosesSimpan');?>",
    type: 'POST',
    cache: false,
    data: {
    "faktur": $("#faktur").val(), "today": $("#today").val(), "user": $("#user").val(),
    "tgl": $("#tgl").val(), "kd_karyawan": $("#kd_karyawan").val(), "jumlah": $("#jumlah").val()},
     success: function(data) {
     $("div#ack").html(data);
     window.message('tes');
     }
    });

}
</script>

<!-- Modal Pencarian -->
<div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:485px">
                    <div class="modal-body">
                      <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="display:block; text-align:center;">Cari Piutang Karyawan</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="fa fa-gears"></i>
                            </span>
                            <select id="fakturCari" name="fakturCari" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Faktur -</option>
                                <?php
                                foreach ($dataPiutangKaryawan as $piutangKaryawan) {
                                  ?>
                                  <option value="<?php echo $piutangKaryawan->faktur; ?>">
                                    <?php echo $piutangKaryawan->faktur; ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnCari" onclick="cariPiuKar()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Cari</button><a id="ackCariPinSup"></a>
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

<div id="tempat-modalTampil"></div>
<div id="tempat-modalEdit"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPiuKar', 'Anda yakin menghapus data ini?', 'Ya'); ?>

<script>
function cariPiuKar(){

      $.ajax({
      url: "<?php echo site_url('PiutangKaryawan/pencarianPiutangKar');?>",
      type: 'POST',
      cache: false,
      data: {
      "fakturCari": $("#fakturCari").val()},
      success: function(data) {
      $('#tempat-modalTampil').html(data);
      $('#modalCari').modal('hide');
      $('#cari-piukar').modal('show');
      }
      });

}
</script>



  </div>
  <!-- /.box-header -->

</div>
