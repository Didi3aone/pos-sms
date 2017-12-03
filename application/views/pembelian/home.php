<div class="box">
  <div class="box-header">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="formPembelian" action="<?=base_url()?>Pembelian/simpan" method="post">
    <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <input type="hidden" name="user" value="<?php echo $getUser[0]->name; ?>">
    <input type="hidden" class="form-control" value=<?php if(count($looping) == '0') { echo "1"; } else echo $looping[0]->id; ?> name="idLooping" id="idLooping" style="width:150px;">
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
  <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-shopping-cart"></i>
    </span>
    <select id="supplier" name="supplier" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Supplier -</option>
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
         var input=document.forms['formPembelian']['supplier'].value;
         var outputKode = document.getElementById("kd_supplier");
         outputKode.value = input;
}
  </script>
  <div class="input-group form-group">
    <span class="input-group-addon">
      <i class="glyphicon glyphicon-qrcode"></i>
    </span>
    <?php
    foreach ($this->M_pembelian->last_record() as $row) {
      $faktur = $row->Faktur;
      $cutCharFaktur = substr($faktur, 2);
      $cutCharFaktur2 = substr($faktur,0,2);
      $convFaktur = (int)$cutCharFaktur+1;
     ?>
  <input type="text" class="form-control" value="<?php echo $cutCharFaktur2.$convFaktur; ?>" name="faktur_beli" style="width:200px;" readonly>
  <?php
}
?>
  <span class="input-group-addon">
    <i class="glyphicon glyphicon-barcode"></i>
  </span>
<input type="text" class="form-control" placeholder="Faktur Supplier" name="faktur_supplier" style="width:200px;">
  </div>
  <div class="form-group">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="tgl_tempo" name="jatuh_tempo" placeholder="Jatuh Tempo" style="width:150px;">
                  </div>
                  <!-- /.input group -->
                </div>
                <script>
                $(function() {
 $("#tgl_tempo").datepicker({
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
  <span class="input-group-addon">
    <i class="glyphicon glyphicon-option-horizontal"></i>
  </span>
<textarea name="keterangan" id="text" cols="50" rows="5" placeholder="Keterangan" class="form-control" style="width:300px;"></textarea>
</div>
</form>
<script>
function simpanTransaksi() {
    document.getElementById("formPembelian").submit();
}
</script>

<form id="formTambah" action="" method="post" name="inputTabel">
<div class="input-group form-group">
  <?php
    $i = 1; ?>
    <?php foreach ($dataTemp as $temp) {
    $i++; } ?>
<input type="text" class="form-control" value=<?= $i ?> name="noUrut" id="noUrut" style="width:50px;">

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
      <div class="input-group date">
        <input type="text" class="form-control" id="exp_date" name="exp_date" style="width:115px;">
        <select id="gudang" name="gudang" class="form-control select2" aria-describedby="sizing-addon2" style="width:65px;">
          <option value=""></option>
            <?php
            foreach ($dataGudang as $gudang) {
              ?>
              <option value="<?php echo $gudang->Kode; ?>">
                <?php echo $gudang->Kode; ?>
              </option>
              <?php
            }
            ?>
          </select>
      </div>

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
      <th>Kode</th>
      <th>Nama</th>
      <th>Qty</th>
      <th>Sat</th>
      <th>Harga</th>
      <th>Disc 1</th>
      <th>Disc 2</th>
      <th>Disc 3</th>
      <th>Disc Rp</th>
      <th>Total</th>
      <th>Exp Date</th>
      <th>Gdg</th>
    </tr>
    <thead>
    <?php
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
        ?>
</table>
</div>
<hr>
<button class="btn btn btn-success btn-block" onClick="terimaInputTambah()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
<button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
</form>
<br />
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


<form action="" method="post">
  <label>Kouta Retur</label>
<div class="input-group form-group">
  <span class="input-group-addon">
    <i class="glyphicon glyphicon-link"></i>
  </span>
<input type="text" class="form-control" placeholder="0.00" name="retur_persen" id="retur_persen" style="width:100px;">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-large"></i>
</span>
<input type="text" class="form-control" name="retur_nilai" id="retur_nilai" style="width:200px;" readonly>
</div>
<button class="btn btn btn-info" onClick="hitungRetur()" type="button"><i class="glyphicon glyphicon-cog"></i> Hitung</button><a id="ackRetur"></a>
</form>

<script>
function hitungRetur(){
  var returRp, retur = $("#retur_persen").val();
  var setReturRp = document.getElementById("retur_nilai");

      $.ajax({
      url: "<?php echo site_url('Pembelian/index');?>",
      type: 'POST',
      cache: false,
      success: function(html) {
      $("div#ackRetur").html(html);
      //$("#diskon").load( "<?php echo base_url('Pembelian')?> #diskon" );
      }
      });
      $("#grand_tot").load( "<?php echo base_url('Pembelian')?> #grand_tot" );
      returRp = Number($("#grand_total").val()*retur);
      setReturRp.value = returRp;
      //window.alert(diskonRp);
      return false;
      //setInterval(function(){realoadTabel()},1000);
}
</script>

<hr />
<label>Grand Total</label>
<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<div id="grand_tot">
<input type="text" class="form-control" value=<?php if($dataTotal[0]->g_total != NULL) { echo $dataTotal[0]->g_total; } else echo "0"; ?> name="grand_total" id="grand_total" style="width:200px;" readonly>
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

<!-- Modal Cari -->
      <div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="width:900px">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Cari Data Pembelian</h4>
                          </div>
                          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Faktur</th>
                                          <th>Tgl</th>
      									                  <th>Kode</th>
                                          <th>Harga</th>
                                          <th>Qty</th>
                                          <th>Satuan</th>
      									                  <th>Total</th>
                                          <th>Gudang</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-beli">
                                    <?php
                                      foreach ($dataPembelian as $pembelian) {
                                        ?>
                                        <tr>
                                          <td><?php echo $pembelian->Faktur; ?></td>
                                          <td><?php echo $pembelian->Tgl; ?></td>
                                          <td><?php echo $pembelian->Kode; ?></td>
                                          <td><?php echo $pembelian->Harga; ?></td>
                                          <td><?php echo $pembelian->Qty; ?></td>
                                          <td><?php echo $pembelian->Satuan; ?></td>
                                          <td><?php echo $pembelian->Jumlah; ?></td>
                                          <td><?php echo $pembelian->gudang; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataBeli" data-id="<?php echo $pembelian->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                              <button class="btn btn-danger konfirmasiHapus-beli" data-id="<?php echo $pembelian->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
                                          </td>
                                        </tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
<!-- End Modal -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<div id="tempat-modalEdit"></div>

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable();
    });
</script>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPinSup', 'Anda yakin menghapus data ini?', 'Ya'); ?>

<script type="text/javascript">

function effect_msg_form() {
  // $('.form-msg').hide();
  $('.form-msg').show(1000);
  setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
}

function effect_msg() {
  // $('.msg').hide();
  $('.msg').show(1000);
  setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
}

var MyTable = $('#lookupCari').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

function refresh() {
  MyTable = $('#lookupCari').dataTable();
  $("#table_content_cari").load( "<?php echo base_url('Pembelian')?> #table_content_cari" );
}

var id_beli;
$(document).on("click", ".konfirmasiHapus-beli", function() {
  id_beli = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataBeli", function() {
  var id = id_beli;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Pembelian/deleteTransaksi'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    window.alert("Data Berhasil Dihapus");
    location.reload();
    // refresh();
    // $('#modalCari').modal('show');
    //$('#lookupCari').dataTable().ajax.reload();

  })
})

$(document).on("click", ".update-dataBeli", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Pembelian/updateTransaksi'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    //$('#modalCari').modal('hide');
    $('#update-beli').modal('show');
  })
})

$(document).on('submit', '#form-update-beli', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('Pembelian/prosesUpdateTransaksi'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-beli").reset();
      $('#update-beli').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();
      // MyTable.fnDestroy();
      // refresh();
      // $('#modalCari').modal('show');

      //refresh();
      //$('#lookupCari').dataTable().ajax.reload();
  })

  e.preventDefault();
});

</script>

  </div>
  <!-- /.box-header -->

</div>
