<div class="msg" style="display:none;">
  <?php //echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
  <div class="box-header">
    <form id="myForm" action="" method="post">
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl_beli" placeholder="Tanggal" name="tgl_pembelian" style="width:150px;">
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
    <select id="kendaraan" name="kendaraan" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
      <option value="">- Pilih kendaraan -</option>
        <?php
        foreach ($dataKendaraan as $kendaraan) {
          ?>
          <option value="<?php echo $kendaraan->Keterangan; ?>">
            <?php echo $kendaraan->Keterangan; ?>
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
    <select id="supir" name="supir" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
      <option value="">- Supir -</option>
        <?php
        foreach ($dataSupir as $supir) {
          ?>
          <option value="<?php echo $supir->nama; ?>">
            <?php echo $supir->nama; ?>
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
    <select id="helper1" name="helper1" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
      <option value="">- Helper 1 -</option>
        <?php
        foreach ($dataHelper as $helper) {
          ?>
          <option value="<?php echo $helper->nama; ?>">
            <?php echo $helper->nama; ?>
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
    <select id="helper1" name="helper1" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
      <option value="">- Helper 2 -</option>
        <?php
        foreach ($dataHelper as $helper) {
          ?>
          <option value="<?php echo $helper->nama; ?>">
            <?php echo $helper->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
  </div>
</form>

<form action="" method="post" id="selectDraft">
<div class="input-group form-group">
  <!-- <?php
    $i = 1; ?>
    <?php foreach ($dataTemp as $temp) {
    $i++; } ?>-->

<input type="text" class="form-control"  id="tgl_draft" name="tgl_draft" style="width:110px;">
<script>
$(function() {
$("#tgl_draft").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>

<!-- <script>
function pilihTanggal(){
var tgl=document.forms['selectDraft']['tgl_draft'].value;
var jenisDraft=document.forms['selectDraft']['jenisFaktur'].value;
var outputDraft=document.getElementById("draft");

}
</script> -->

<select id="jenisFaktur" name="jenisFaktur" class="form-control select2" aria-describedby="sizing-addon2" style="width:80px;">
  <option value=""></option>
  <?php
  foreach ($dataJenis as $jenisDraft) {
    ?>
    <option value="<?php echo $jenisDraft->jenis; ?>">
      <?php echo $jenisDraft->jenis; ?>
    </option>
    <?php
  }
  ?>

    </select>

  <select id="draft" name="draft" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
    <option value=""></option>
      <?php
      foreach ($dataPembelian as $pembelian) {
        ?>
        <option value="<?php echo $pembelian->satuan; ?>">
          <?php echo $pembelian->satuan; ?>
        </option>
        <?php
      }
      ?>
    </select>
    <hr/>

<button class="btn btn btn-success btn-block" onClick="terimaInputTambah()" type="button"><i class="glyphicon glyphicon-search"></i> Tampil</button><a id="ack"></a>
</div>

</div>

<div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Draft</th>
      <th>Jenis</th>
      <th>Pilih</th>
    </tr>
    <thead>
    <?php
      $no = 1;
      foreach ($dataDraft as $draft) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $draft->tgl; ?></td>
          <td><?php echo $draft->draft; ?></td>
          <td><?php echo $draft->jenis; ?></td>
          <td align="left"><input type="checkbox" name="cekList[]" id="cekList[]" value="" class="custom-control-input"></td>
        </tr>
        <?php
      $no++;
        }
        ?>
</table>
</div>
<hr>
<a href="javascript:if(confirm('Anda yakin menghapus data pembelian terakhir?')){document.location='<?php echo base_url();?>Pembelian/delete';}" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
</form>
<br />
<div class="col-md-4 text-left">
<a href="<?php echo base_url();?>Loading/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
<hr />
</div>
<script>
function terimaInputTambah(){

  // var i, j;
  // var loopingNo = document.getElementById("noUrut");

      $.ajax({
      url: "<?php echo site_url('Loading/prosesTambah');?>",
      type: 'POST',
      cache: false,
      data: {
      "tgl_draft": $("#tgl_draft").val(), "jenisFaktur": $("#jenisFaktur").val()},
       success: function(data) {
       $("div#ack").html(data);
       $("#table_content").load( "<?php echo base_url('Loading')?> #table_content" );
       // $("#idLooping").load( "<?php echo base_url('Loading')?> #idLooping" );
       }
      });

      // j=Number(document.forms['inputTabel']['noUrut'].value)+1;
      // //window.alert(j);
      // for(i=1; i<=j; i++) {
      //   loopingNo.value = i;
      // }

      return false;
      //setInterval(function(){realoadTabel()},1000);

}
</script>



<hr />

<hr />

  </div>
  <!-- /.box-header -->

</div>
