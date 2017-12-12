<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-potongan"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Potongan/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-potongan"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Kode Angka</th>
          <th>Keterangan</th>
		  <th>Kode Huruf</th>
   
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-potongan">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_potongan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPotongan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Potongan';
  $data['url'] = 'Potongan/import';
  echo show_my_modal('modals/modal_import', 'import-potongan', $data);
?>
