  
<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-hutang"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Hutang/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-hutang"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Tanggal</th>
          <th>Faktur</th>
          <th>Supplier</th>
          <th>Faktur Asli</th>
          <th>Hutang</th>
          <th>Status</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-hutang">

      </tbody>
    </table>
<table id="list-total" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>TOTAL</th>
          
        </tr>
      </thead>
      <tbody id="data-total-hutang">

      </tbody>
    </table>

</div>

<!--<div>
    <table id="list-total" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>TOTAL</th>
          
        </tr>
      </thead>
      <tbody id="data-total-hutang">

      </tbody>
    </table>
</div>-->

    <!--<div class="input-group form-group">
<span class="input-group-addon">
  <i class="glyphicon glyphicon-th-list"></i>
</span>
<input type="text" class="form-control" id="data-total-hutang" value=<?php if($dataTotal->Total != NULL) { echo $dataTotal ->Total; } else {echo "0";} ?> name="total" style="width:200px;" readonly>
</div> -->
  


<?php echo $modal_tambah_hutang; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataHutang', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Hutang';
  $data['url'] = 'Hutang/import';
  echo show_my_modal('modals/modal_import', 'import-hutang', $data);
?>
