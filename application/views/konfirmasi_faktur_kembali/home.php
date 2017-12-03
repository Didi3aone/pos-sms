<div class="box">
  <div class="box-header">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="formPembelian" action="<?=base_url()?>Pembelian/simpan" method="post">
      <label>Tanggal</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl_beli" placeholder="Tanggal" value=<?php echo date("Y-m-d"); ?> name="tgl_pembelian" style="width:150px;">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <script>
                  $(function() {
   $("#tgl_beli").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
  </script>

<form id="formTambah" action="" method="post" name="inputTabel">
<div class="input-group form-group">
  <!-- <?php
    $i = 1; ?>
    <?php foreach ($dataTemp as $temp) {
    $i++; } ?> -->
<input type="text" class="form-control" value=<?= $i ?>  name="noUrut" id="noUrut" style="width:55px;">

    <input type="text" class="form-control" placeholder="Faktur" name="qty" id="qty" style="width:203px;">
    <input type="text" class="form-control" id="exp_date" name="exp_date" placeholder="Tanggal" style="width:203px;">
      <input type="text" class="form-control" name="harga" id="harga" placeholder="Customer" style="width:203px;">
      <input type="text" class="form-control" placeholder="Draft" name="disc_1" id="disc_1" style="width:203px;">
      <input type="text" class="form-control" placeholder="Total" name="disc_2" id="disc_2" style="width:203px;">
</div>

<script>
$(function() {
$("#exp_date").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Faktur</th>
      <th>Tanggal</th>
      <th>Customer</th>
      <th>Draft</th>
      <th>Total</th>
    </tr>
    <thead>
    <!-- <?php
      $no = 1;
      foreach ($dataTemp as $temp) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $temp->Kode; ?></td>
          <td><?php echo $temp->Nama; ?></td>
          <td><?php echo $temp->Qty; ?></td>
          <td><?php echo $temp->Sat; ?></td>
          <td><?php echo $temp->Harga; ?></td>
          <td><?php echo $temp->Disc1; ?></td>
          <td><?php echo $temp->Disc2; ?></td>
          <td><?php echo $temp->Disc3; ?></td>
          <td><?php echo $temp->DiscRp; ?></td>
          <td><?php echo $temp->Total; ?></td>
          <td><?php echo date("d-m-Y", strtotime($temp->ExpDate)); ?></td>
          <td><?php echo $temp->Gdg; ?></td>
        </tr>
        <?php
        $no++;
        }
        ?> -->
</table>
</div>
<hr>
<button class="btn btn btn-success btn-block" onClick="terimaInputTambah()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
<button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
</form>
<hr />
<script>
function terimaInputTambah(){

  var i, j;
  var loopingNo = document.getElementById("noUrut");

      $.ajax({
      url: "<?php echo site_url('Pembelian/prosesTambah');?>",
      type: 'POST',
      cache: false,
      data: {
      "kode_beli": $("#kode_beli").val(), "nama_barang": $("#nama_barang").val(), "qty": $("#qty").val(),
      "satuan": $("#satuan").val(), "harga": $("#harga").val(), "disc_1": $("#disc_1").val(),
      "disc_2": $("#disc_2").val(), "disc_3": $("#disc_3").val(), "disc_Rp": $("#disc_Rp").val(),
      "total": $("#total").val(), "exp_date": $("#exp_date").val(), "gudang": $("#gudang").val()},
       success: function(data) {
       $("div#ack").html(data);
       //document.getElementById("table_content").innerHTML=data;
       //$("#table_content").html(data);
       $("#table_content").load( "<?php echo base_url('Pembelian')?> #table_content" );
       $("#grand_tot").load( "<?php echo base_url('Pembelian')?> #grand_tot" );
       $("#idLooping").load( "<?php echo base_url('Pembelian')?> #idLooping" );
       }
      });

      j=Number(document.forms['inputTabel']['noUrut'].value)+1;
      //window.alert(j);
      for(i=1; i<=j; i++) {
        loopingNo.value = i;
      }

      return false;
      //setInterval(function(){realoadTabel()},1000);

}
</script>

<script>
function hapusInput(){

  var setNum, num = document.getElementById("noUrut");
  var r = confirm("Anda yakin menghapus data pembelian terakhir?");
  if (r == true) {
    $.ajax({
    url: "<?php echo site_url('Pembelian/delete');?>",
    type: 'POST',
    cache: false,
     success: function(html) {
     $("div#ackDel").html(html);
     $("#table_content").load( "<?php echo base_url('Pembelian')?> #table_content" );
     $("#grand_tot").load( "<?php echo base_url('Pembelian')?> #grand_tot" );
     }
    });

    setNum = Number(document.forms['inputTabel']['noUrut'].value)-1;
    num.value = setNum;
    return false;

    }
}
</script>

<style type="text/css">
.form-control {
    display: inline-block;
}
</style>

<label>Grand Total</label>
<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<div id="grand_tot">
<input type="text" class="form-control" value="" name="grand_total" id="grand_total" style="width:200px;" readonly>
</div>
</div>
<hr />
<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>Pembelian/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
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
                        <h3 style="display:block; text-align:center;">Cari Konfirmasi Faktur</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="fa fa-gears"></i>
                            </span>
                            <select id="fakturCari" name="fakturCari" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Faktur -</option>
                                <?php
                                foreach ($dataKonfirmasi as $konfir) {
                                  ?>
                                  <option value="<?php echo $konfir->faktur; ?>">
                                    <?php echo $konfir->faktur; ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnCari" onclick="cariFaktur()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Cari</button><a id="ackCariPinSup"></a>
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

<div id="tempat-modalCari"></div>
<div id="tempat-modalEdit"></div>

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable();
    });
</script>

<script>
function cariFaktur(){

      $.ajax({
      url: "<?php echo site_url('KonfirmasiFakturKembali/pencarianFakturKembali');?>",
      type: 'POST',
      cache: false,
      data: {
      "fakturCari": $("#fakturCari").val()},
      success: function(data) {
      $('#tempat-modalCari').html(data);
      $('#modalCari').modal('hide');
      $('#cari-konf-faktur').modal('show');
      }
      });

}
</script>



  </div>
  <!-- /.box-header -->

</div>
