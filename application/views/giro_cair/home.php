<script>
function nextfield(event){
    if(event.keyCode == 13 || event.which == 13){
  document.getElementById('no_bukti').focus();
    }
}
function nextfield2(event){
    if(event.keyCode == 13 || event.which == 13){
  document.getElementById('jatuh_tempo').focus();
    }
}
function nextfield3(event){
    if(event.keyCode == 13 || event.which == 13){
  document.getElementById('jumlah').focus();
    }
}
function nextfield4(event){
    if(event.keyCode == 13 || event.which == 13){
  document.getElementById('bank').focus();
    }
}

function nextfield5(event){
$(document).on('keypress', 'select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        document.getElementById('tambahBtn').focus();
    }
});
}

</script>

<div class="box">
  <div class="box-header">
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="formGiro" action="<?=base_url()?>GiroCair/simpan" method="post">
      <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <input type="hidden" name="user" value="<?php echo $getUser[0]->name; ?>">
      <input type="hidden" class="form-control" value=<?php if(count($looping) == '0') { echo "1"; } else echo $looping[0]->id; ?> name="idLooping" id="idLooping" style="width:150px;">
      <?php
      foreach ($this->M_totalGiroCair->last_record() as $row) {
        $faktur = $row->Faktur;
        $cutCharFaktur = substr($faktur, 2);
        $cutCharFaktur2 = substr($faktur,0,2);
        $convFaktur = (int)$cutCharFaktur+1;
       ?>
    <input type="hidden" class="form-control" value="<?php echo $cutCharFaktur2.$convFaktur; ?>" name="faktur" style="width:200px;" readonly>
    <?php
  }
  ?>
  <?php
  foreach ($this->M_giro->last_record() as $row) {
    $faktur2 = $row->Faktur;
    $cutCharFaktur2 = substr($faktur2, 2);
    $cutCharFaktur3 = substr($faktur2,0,2);
    $convFaktur2 = (int)$cutCharFaktur2+1;
   ?>
<input type="hidden" class="form-control" value="<?php echo $cutCharFaktur3.$convFaktur2; ?>" name="faktur2" style="width:200px;" readonly>
<?php
}
?>
      <label>Tanggal</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tanggal" placeholder="Tanggal" value=<?php echo date("Y-m-d"); ?> name="tanggal" style="width:150px;">
                    </div>
                    <!-- /.input group -->
                  </div>
      <label>Keterangan</label>
      <div class="input-group form-group">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
      <textarea name="keterangan" id="keterangan" onkeypress="nextfield(event)" cols="50" rows="5" class="form-control" style="width:300px;"></textarea>
      </div>

  <script>
        $(function() {
   $("#tanggal").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
  </script>

  </form>

  <script>
  function simpanTransaksi() {
      document.getElementById("formGiro").submit();
  }
  </script>


<form id="formTambah" action="" method="post" name="tabelInput">
<div class="input-group form-group">
  <?php
    $i = 1; ?>
    <?php foreach ($dataTempGiro as $tempGiro) {
    $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="nomor" id="nomor" style="width:50px;">

    <input type="text" onkeypress="nextfield2(event)" class="form-control" placeholder="Nomor Bukti" name="no_bukti" id="no_bukti" style="width:203px;">
    <input type="text" onkeypress="nextfield3(event)" class="form-control" id="jatuh_tempo" name="jatuh_tempo" placeholder="Jatuh Tempo" style="width:203px;">
    <input type="text" onkeypress="nextfield4(event)" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" style="width:203px;">
    <select id="bank" onkeypress="nextfield5(event)" name="bank" class="form-control select2" aria-describedby="sizing-addon2" style="width:350px;">
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
    </div>

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nomor Bukti</th>
      <th>Jatuh Tempo</th>
      <th>Jumlah</th>
      <th>Bank</th>
    </tr>
    <thead>
    <?php
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
        ?>
</table>
</div>
<hr>
<button class="btn btn btn-success btn-block" onClick="inputTambah()" id="tambahBtn" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
<button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
</form>
<hr />

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

<script>
function inputTambah(){

  var i, j;
  var loopingNo = document.getElementById("nomor");

      $.ajax({
      url: "<?php echo site_url('GiroCair/prosesTambah');?>",
      type: 'POST',
      cache: false,
      data: {
      "no_bukti": $("#no_bukti").val(), "jatuh_tempo": $("#jatuh_tempo").val(), "jumlah": $("#jumlah").val(),
      "bank": $("#bank").val()},
       success: function(data) {
       $("div#ack").html(data);
       $("#table_content").load( "<?php echo base_url('GiroCair')?> #table_content" );
       $("#total").load( "<?php echo base_url('GiroCair')?> #total" );
       $("#idLooping").load( "<?php echo base_url('GiroCair')?> #idLooping" );
       }
      });

      j=Number(document.forms['tabelInput']['nomor'].value)+1;

      for(i=1; i<=j; i++) {
        loopingNo.value = i;
      }

      return false;
}
</script>

<label> Total</label>
<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<div id="total">
<input type="text" class="form-control" value=<?php if($dataTotal[0]->g_total != NULL) { echo $dataTotal[0]->g_total; } else echo "0"; ?> name="grand_total" id="grand_total" style="width:200px;" readonly>
</div>
</div>
<hr />
<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>GiroCair/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
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
                        <h3 style="display:block; text-align:center;">Cari Giro Cair</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="fa fa-gears"></i>
                            </span>
                            <select id="faktur" name="faktur" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Faktur -</option>
                                <?php
                                foreach ($dataTotalGiroCair as $totalGiroCair) {
                                  ?>
                                  <option value="<?php echo $totalGiroCair->Faktur; ?>">
                                    <?php echo $totalGiroCair->Faktur; ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnCari" onclick="cariGiro()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Cari</button><a id="ackCariGiro"></a>
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

<script>
function cariGiro(){

      $.ajax({
      url: "<?php echo site_url('GiroCair/pencarianGiro');?>",
      type: 'POST',
      cache: false,
      data: {
      "faktur": $("#faktur").val()},
      success: function(data) {
      $('#tempat-modalTampil').html(data);
      $('#modalCari').modal('hide');
      $('#cari-giro').modal('show');
      }
      });

}
</script>


  </div>
  <!-- /.box-header -->

</div>
