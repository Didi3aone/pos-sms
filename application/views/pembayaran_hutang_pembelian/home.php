
<div class="box">
  <div class="box-header">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="myForm" action="<?=base_url()?>PembayaranHutangPembelian/simpan" method="post">
      <?php
      foreach ($this->M_totPelunasanHutang->last_record() as $row) {
        $faktur = $row->Faktur;
        $cutCharFaktur = substr($faktur, 2);
        $cutCharFaktur2 = substr($faktur,0,2);
        $convFaktur = (int)$cutCharFaktur+1;
       ?>
    <input type="hidden" class="form-control" value="<?php echo $cutCharFaktur2.$convFaktur; ?>" name="faktur_bayar" style="width:200px;" readonly>
    <input type="hidden" class="form-control" name="total" id="total" style="width:200px;" align="right" readonly>
    <input type="hidden" name="user" value="<?php echo $getUser[0]->name; ?>">
    <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <input type="hidden" class="form-control" value=<?php if(count($looping) == '0') { echo "1"; } else echo $looping[0]->id; ?> name="idLooping" id="idLooping" style="width:150px;">
    <?php
  }
  ?>
    <label>Tanggal</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl_bayar" value=<?php echo date("Y-m-d"); ?> name="tgl_bayar" style="width:150px;">
                    </div>
                    <!-- /.input group -->
                  </div>
  </form>
                  <script>
                  $(function() {
   $("#tgl_bayar").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
  </script>

<script>
function save() {
    document.getElementById("myForm").submit();
}
</script>

<form action="" method="post" name="inputTabel">
<div class="input-group form-group">
  <?php
    $i = 1; ?>
    <?php foreach ($dataTemp as $temp) {
    $i++; } ?>
<input type="text" class="form-control" value=<?= $i ?>  name="noUrut" id="noUrut" style="width:50px;">

<select id="jenis_bayar" name="jenis_bayar" class="form-control select2" aria-describedby="sizing-addon2" style="width:190px;">
  <option value=""></option>
   <?php
   foreach ($dataJenisBayar as $jenisBayar) {
     ?>
     <option value="<?php echo $jenisBayar->Jenis; ?>">
       <?php echo $jenisBayar->Jenis; ?>
     </option>
     <?php
     }
    ?>
  </select>

  <select id="nama_bank" name="nama_bank" class="form-control select2" aria-describedby="sizing-addon2" style="width:270px;">
    <option value=""></option>
      <?php
      foreach ($dataBank as $bank) {
        ?>
        <option value="<?php echo $bank->Kode; ?>">
          <?php echo $bank->Nama; ?>
        </option>
        <?php
      }
      ?>
    </select>

    <input type="text" class="form-control" name="keterangan" id="keterangan" style="width:200px;">

    <div class="input-group date">
        <input type="text" class="form-control" id="jatuh_tempo" name="jatuh_tempo" style="width:180px;">
        <input type="text" class="form-control" name="jumlah" id="jumlah" style="width:180px;">
      </div>
</div>
<script>
$(function() {
$("#jatuh_tempo").datepicker({
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
      <th>Jenis Pembayaran</th>
      <th>Bank</th>
      <th>Keterangan</th>
      <th>Jatuh Tempo</th>
      <th>Jumlah</th>
    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataTemp as $temp) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $temp->Jenis; ?></td>
          <td><?php echo $temp->Bank; ?></td>
          <td><?php echo $temp->Keterangan; ?></td>
          <td><?php echo $temp->Jatuh_Tempo; ?></td>
          <td><?php echo $temp->Jumlah; ?></td>
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
  var totalUpdate = document.getElementById("total");

      $.ajax({
      url: "<?php echo site_url('PembayaranHutangPembelian/prosesTambah');?>",
      type: 'POST',
      cache: false,
      data: {
      "idLooping": $("#idLooping").val(),
      "tgl_bayar": $("#tgl_bayar").val(), "jenis_bayar": $("#jenis_bayar").val(), "nama_bank": $("#nama_bank").val(),
      "keterangan": $("#keterangan").val(), "jatuh_tempo": $("#jatuh_tempo").val(), "jumlah": $("#jumlah").val()},
       success: function(data) {
       $("div#ack").html(data);
       //document.getElementById("table_content").innerHTML=data;
       //$("#table_content").html(data);
       $("#table_content").load( "<?php echo base_url('PembayaranHutangPembelian')?> #table_content" );
       $("#idLooping").load( "<?php echo base_url('PembayaranHutangPembelian')?> #idLooping" );
       }
      });

      totalUpdate.value = document.forms['inputTabel2']['tot_bayar'].value;

      j=Number(document.forms['inputTabel']['noUrut'].value)+1;
      //window.alert($("#idLooping").val());
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
  var r = confirm("Anda yakin menghapus data pembayaran hutang terakhir?");
  if (r == true) {
    $.ajax({
    url: "<?php echo site_url('PembayaranHutangPembelian/delete');?>",
    type: 'POST',
    cache: false,
     success: function(html) {
     $("div#ackDel").html(html);
     $("#table_content").load( "<?php echo base_url('PembayaranHutangPembelian')?> #table_content" );
     }
    });

    setNum = Number(document.forms['inputTabel']['noUrut'].value)-1;
    num.value = setNum;
    return false;

    }
}
</script>


<form action="" method="post" name="inputTabel2">
<div class="input-group form-group">
  <?php
    $i = 1; ?>
    <?php foreach ($dataTemp2 as $temp2) {
    $i++; } ?>
<input type="text" class="form-control" value=<?= $i ?>  name="noUrut2" id="noUrut2" style="width:50px;">
<input type="hidden" class="form-control" value=<?php if(count($dataID) == '0') { echo "1"; } else echo $dataID[0]->id; ?> name="idLoop" id="idLoop" style="width:150px;">
<select id="status" name="status" class="form-control select2" aria-describedby="sizing-addon2" style="width:100px;">
  <option value=""></option>
    <?php
    foreach ($dataStatus as $status) {
      ?>
      <option value="<?php echo $status->STATUS; ?>">
        <?php echo $status->KETERANGAN; ?>
      </option>
      <?php
    }
    ?>
  </select>

  <select id="faktur" name="faktur" class="form-control select2" aria-describedby="sizing-addon2" style="width:170px;">
    <option value=""></option>
      <?php
      foreach ($dataFaktur as $faktur) {
        ?>
        <option value="<?php echo $faktur->Faktur; ?>">
          <?php echo $faktur->Faktur; ?>
        </option>
        <?php
      }
      ?>
    </select>

    <div class="input-group date">
        <input type="text" class="form-control" id="tgl" name="tgl" style="width:100px;">
        <input type="text" class="form-control" name="supplier" id="supplier" style="width:190px;" readonly>
        <input type="text" class="form-control" name="total" id="total" style="width:115px;" value="0.00" readonly>
        <input type="text" class="form-control" name="hutang" id="hutang" style="width:115px;" value="0.00" readonly>
        <input type="text" class="form-control" name="bayar" id="bayar" style="width:115px;" value="0.00" readonly>
        <input type="text" class="form-control" name="sisa" id="sisa" style="width:115px;" value="0.00" readonly>
      </div>
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

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content2">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Status</th>
      <th>Faktur</th>
      <th>Tanggal</th>
      <th>Supplier</th>
      <th>Total</th>
      <th>Hutang</th>
      <th>Bayar</th>
      <th>Sisa</th>
    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataTemp2 as $temp2) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $temp2->Status; ?></td>
          <td><?php echo $temp2->Faktur; ?></td>
          <td><?php echo $temp2->Tanggal; ?></td>
          <td><?php echo $temp2->Supplier; ?></td>
          <td><?php echo $temp2->Total; ?></td>
          <td><?php echo $temp2->Hutang; ?></td>
          <td><?php echo $temp2->Bayar; ?></td>
          <td><?php echo $temp2->Sisa; ?></td>

        </tr>
        <?php
        $no++;
        }
        ?>
</table>
</div>
<hr>

<button class="btn btn btn-success" onClick="terimaInputTambahBayar()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack2"></a>
<button class="btn btn-danger" onClick="hapusInputBayar()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel2"></a>

<br /> <br />

<label>Total Hutang</label>
<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<div id="hutang_tot">
<input type="text" class="form-control" value=<?php if($dataTotalHutang[0]->tot_hutang != NULL) { echo $dataTotalHutang[0]->tot_hutang; } else echo "0"; ?> name="tot_hutang" id="tot_hutang" style="width:200px;" align="right" readonly>
</div>
  <span class="input-group-addon">
    <label>Total Bayar</label>
  </span>
<div id="bayar_tot">
  <input type="text" class="form-control" value=<?php if($dataTotalHutang[0]->tot_hutang != NULL) { echo $dataTotalHutang[0]->tot_hutang; } else echo "0"; ?> name="tot_bayar" id="tot_bayar" style="width:200px;" align="right" readonly>
</div>
</div>
<hr />
</form>
<script>
function terimaInputTambahBayar(){

  var i, j;
  var loopingNo = document.getElementById("noUrut2");

      $.ajax({
      url: "<?php echo site_url('PembayaranHutangPembelian/prosesTambahBayar');?>",
      type: 'POST',
      cache: false,
      data: {
        "idLoop": $("#idLoop").val(),
      "status": $("#status").val(), "faktur": $("#faktur").val(), "tgl": $("#tgl").val(),
      "supplier": $("#supplier").val(), "total": $("#total").val(), "hutang": $("#hutang").val(),
      "bayar": $("#bayar").val(), "sisa": $("#sisa").val()},
       success: function(data) {
       $("div#ack2").html(data);
       //document.getElementById("table_content").innerHTML=data;
       //$("#table_content").html(data);
       $("#table_content2").load( "<?php echo base_url('PembayaranHutangPembelian')?> #table_content2" );
       $("#hutang_tot").load( "<?php echo base_url('PembayaranHutangPembelian')?> #hutang_tot" );
       $("#bayar_tot").load( "<?php echo base_url('PembayaranHutangPembelian')?> #bayar_tot" );
       $("#idLoop").load( "<?php echo base_url('PembayaranHutangPembelian')?> #idLoop" );

       }
      });

      j=Number(document.forms['inputTabel2']['noUrut2'].value)+1;
      //window.alert($("#idLoop").val());
      for(i=1; i<=j; i++) {
        loopingNo.value = i;
      }

      return false;
      //setInterval(function(){realoadTabel()},1000);

}
</script>

<script>
function hapusInputBayar(){

  var setNum, num = document.getElementById("noUrut2");
  var r = confirm("Anda yakin menghapus data pembayaran hutang terakhir?");
  if (r == true) {
    $.ajax({
    url: "<?php echo site_url('PembayaranHutangPembelian/deleteBayar');?>",
    type: 'POST',
    cache: false,
     success: function(html) {
     $("div#ackDel").html(html);
     $("#table_content2").load( "<?php echo base_url('PembayaranHutangPembelian')?> #table_content2" );
     $("#hutang_tot").load( "<?php echo base_url('PembayaranHutangPembelian')?> #hutang_tot" );
     $("#bayar_tot").load( "<?php echo base_url('PembayaranHutangPembelian')?> #bayar_tot" );

     }
    });

    setNum = Number(document.forms['inputTabel2']['noUrut2'].value)-1;
    num.value = setNum;
    return false;

    }
}
</script>

<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>PembayaranHutangPembelian/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
<hr />
</div>
<div class="col-md-4 text-left">
  <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button>
<hr />
</div>
<div class="col-md-4 text-right">
<button onclick="save()" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
<hr />
</div>

<!-- Modal Cari -->
      <div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="width:900px">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Cari Data Pelunasan Hutang</h4>
                          </div>
                          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Faktur</th>
                                          <th>Tgl</th>
      									                  <th>Faktur Beli</th>
                                          <th>Status</th>
                                          <th>Hutang</th>
                                          <th>Bayar</th>
      									                  <th>Sisa</th>
                                          <th>Supplier</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-hutang">
                                    <?php
                                      foreach ($dataPelunasanHutang as $pelunasanHutang) {
                                        ?>
                                        <tr>
                                          <td><?php echo $pelunasanHutang->Faktur; ?></td>
                                          <td><?php echo $pelunasanHutang->Tgl; ?></td>
                                          <td><?php echo $pelunasanHutang->Fkt; ?></td>
                                          <td><?php echo $pelunasanHutang->Status; ?></td>
                                          <td><?php echo $pelunasanHutang->Hutang; ?></td>
                                          <td><?php echo $pelunasanHutang->Bayar; ?></td>
                                          <td><?php echo $pelunasanHutang->Sisa; ?></td>
                                          <td><?php echo $pelunasanHutang->Supplier; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataHutang" data-id="<?php echo $pelunasanHutang->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                              <button class="btn btn-danger konfirmasiHapus-hutang" data-id="<?php echo $pelunasanHutang->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
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
  $("#table_content_cari").load( "<?php echo base_url('PembayaranHutangPembelian')?> #table_content_cari" );
}

var id_hutang;
$(document).on("click", ".konfirmasiHapus-hutang", function() {
  id_hutang = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataHutang", function() {
  var id = id_hutang;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PembayaranHutangPembelian/deleteTransaksi'); ?>",
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

$(document).on("click", ".update-dataHutang", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PembayaranHutangPembelian/updateTransaksi'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    //$('#modalCari').modal('hide');
    $('#update-hutang').modal('show');
  })
})

$(document).on('submit', '#form-update-hutang', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('PembayaranHutangPembelian/prosesUpdateTransaksi'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-hutang").reset();
      $('#update-hutang').modal('hide');
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
