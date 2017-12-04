<div class="box">
  <div class="box-header">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="formReturPenjualan" action="<?=base_url()?>ReturReturPenjualan/simpan" method="post">
    <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <input type="hidden" name="user" value="<?php echo $getUser[0]->name; ?>">
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl_beli" placeholder="Tanggal" value=<?php echo date("Y-m-d"); ?> name="tgl_pembelian" style="width:150px;">
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
                    <!-- /.input group -->
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </span>
                    <select id="faktur_beli" name="faktur_beli" onchange="terimainputCombox2()" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
                      <option value="">- Pilih Faktur Penjualan -</option>
                        <?php
                        foreach ($dataFakturRetur as $fakturRetur) {
                          ?>
                          <option value="<?php echo $fakturRetur->Faktur; ?>">
                            <?php echo $fakturRetur->Faktur; ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                  </div>

  <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-shopping-cart"></i>
    </span>
    <select id="customer" name="customer" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Customer -</option>
        <?php
        foreach ($dataSupplier as $supplier) {
          ?>
          <option value="<?php echo $supplier->Kode; ?>">
            <?php echo $supplier->Nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
      <input id="kd_supplier" type="text" class="form-control" placeholder="Kode" name="kd_supplier" style="width:60px;" readonly>
  </div>
  <script>
  function terimainputCombox(){
         var input=document.forms['formReturPenjualan']['supplier'].value;
         var outputKode = document.getElementById("kd_supplier");
         outputKode.value = input;
}
  </script>
<div class="input-group form-group">
  <span class="input-group-addon">
    <i class="glyphicon glyphicon-option-horizontal"></i>
  </span>
<textarea name="keterangan" id="text" cols="50" rows="5" placeholder="Keterangan" class="form-control" style="width:300px;"></textarea>
</div>
</form>

<form id="formTambah" action="" method="post" name="inputTabel">
<div class="input-group form-group">
  <!-- <?php
    $i = 1; ?>
    <?php foreach ($dataTemp as $temp) {
    $i++; } ?> -->
<input type="text" class="form-control" value="" name="noUrut" id="noUrut" style="width:50px;">

<select id="kode_beli" name="kode_beli" class="form-control select2" aria-describedby="sizing-addon2" style="width:80px;">
  <option value=""></option>
   <?php
   foreach ($dataStock as $stock) {
     ?>
     <option value="<?php echo $stock->Kode; ?>">
       <?php echo $stock->Kode; ?>
     </option>
     <?php
     }
    ?>
  </select>

  <select id="nama_barang" name="nama_barang" class="form-control select2" aria-describedby="sizing-addon2" style="width:175px;">
    <option value=""></option>
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

    <input type="text" class="form-control" value="1" name="qty" id="qty" style="width:50px;">

    <select id="satuan" name="satuan" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
      <option value=""></option>
      <option>CRT</option>
      <option>PAC</option>
      <option>PCS</option>
      </select>

      <input type="text" class="form-control" value="0" name="harga" id="harga" style="width:90px;" readonly>
      <input type="text" class="form-control" value="0.00" name="disc_1" id="disc_1" style="width:65px;">
      <input type="text" class="form-control" value="0.00" name="disc_2" id="disc_2" style="width:65px;">
      <input type="text" class="form-control" value="0.00" name="disc_3" id="disc_3" style="width:65px;">
      <input type="text" class="form-control" value="0" name="disc_Rp" id="disc_Rp" style="width:90px;">
      <input type="text" class="form-control" value="0" name="total" id="total" style="width:90px;" readonly>
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
      <th>Harga</th>
      <th>Disc 1</th>
      <th>Disc 2</th>
      <th>Disc 3</th>
      <th>Total</th>
      <th>Gdg</th>
    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataTempRetur as $tempRetur) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $tempRetur->kode; ?></td>
          <td><?php echo $tempRetur->nama; ?></td>
          <td><?php echo $tempRetur->qty; ?></td>
          <td><?php echo $tempRetur->satuan; ?></td>
          <td><?php echo $tempRetur->harga; ?></td>
          <td><?php echo $tempRetur->disc1; ?></td>
          <td><?php echo $tempRetur->disc2; ?></td>
          <td><?php echo $tempRetur->disc3; ?></td>
          <td><?php echo $tempRetur->total; ?></td>
          <td><?php echo $tempRetur->gudang; ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>
</table>
</div>
<hr>
<button class="btn btn btn-success btn-block" onClick="terimaInputTambah()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
<button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
</form>
<br />

<hr />
<form action="" method="post" name="frmTotal">
<div class="input-group form-group">
  <span class="input-group-addon">
    <label>Sub Total</label>
  </span>
  <div id="sub_tot">
  <input type="text" class="form-control" value=<?php if($dataSTotal[0]->s_total != NULL) { echo $dataSTotal[0]->s_total; } else echo "0"; ?> name="sub_total" id="sub_total" style="width:200px;" readonly>
  </div>
</div>
<div class="input-group form-group">
  <span class="input-group-addon">
    <label>Disc %</label>
  </span>
  <input type="text" class="form-control" value="0.00" name="disc" id="disc" style="width:55px;">
  <span class="input-group-addon">
    <label>Rp</label>
  </span>
  <div id="diskon">
    <input type="text" class="form-control" value="0" name="disc_rp" id="disc_rp" style="width:150px;" readonly>
</div>
</div>
  <button class="btn btn" onClick="hitungDiskon()" type="button"><i class="glyphicon glyphicon-cog"></i> Hitung</button><a id="ackDiskon"></a>
</form>
<hr />

<script>
function hitungDiskon(){
  var diskonRp, diskon = $("#disc").val();
  var setDiskonRp = document.getElementById("disc_rp");
  var updateTotal, total = document.getElementById("g_total");

      $.ajax({
      url: "<?php echo site_url('ReturPenjualan');?>",
      type: 'POST',
      cache: false,
      success: function(html) {
      $("div#ackDiskon").html(html);
      }
      });

      $("#sub_tot").load( "<?php echo base_url('ReturPenjualan')?> #sub_tot" );
      diskonRp = Number($("#sub_total").val()*diskon);
      setDiskonRp.value = diskonRp;
      updateTotal = (document.forms['frmTotal']['sub_total'].value)-diskonRp;
      total.value = updateTotal;
      return false;
}
</script>


<label>Grand Total</label>
<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<div id="tot">
<input type="text" class="form-control" value=<?php if($dataSTotal[0]->s_total != NULL) { echo $dataSTotal[0]->s_total; } else echo "0"; ?> name="g_total" id="g_total" style="width:200px;" readonly>
</div>
</div>
<hr />

<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>ReturPenjualan/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
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

<script>
function simpanTransaksi(){

      $.ajax({
      url: "<?php echo site_url('ReturPenjualan/save');?>",
      type: 'POST',
      cache: false,
      success: function(html) {
      $("div#ackDiskon").html(html);
      }
      });
      return false;
}
</script>


<!-- Modal Pencarian -->
<div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:485px">
                    <div class="modal-body">
                      <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="display:block; text-align:center;">Cari Retur Penjualan</h3>
                        <form id="formReturPenjualan" name="formReturPenjualan" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <select id="fakturCari" name="fakturCari" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Faktur -</option>
                                <?php
                                foreach ($dataFakturRetur as $fakturRetur) {
                                  ?>
                                  <option value="<?php echo $fakturRetur->Faktur; ?>">
                                    <?php echo $fakturRetur->Faktur; ?>
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

<div id="tempat-modalEdit"></div>
<div id="tempat-modalCari"></div>

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable();
    });
</script>

<script>
function cariFaktur(){

      $.ajax({
      url: "<?php echo site_url('ReturPenjualan/pencarianRetur');?>",
      type: 'POST',
      cache: false,
      data: {
      "fakturCari": $("#fakturCari").val()},
      success: function(data) {
      $('#tempat-modalCari').html(data);
      $('#modalCari').modal('hide');
      $('#cari-retur-beli').modal('show');
      }
      });

}
</script>

  </div>
  <!-- /.box-header -->

</div>
