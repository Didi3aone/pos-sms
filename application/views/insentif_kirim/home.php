<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-insentif-kirim"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('InsentifKirim/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-insentif-kirim"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Jenis insentif</th>
          <th>Supir</th>
		      <th>Helper</th>

          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-insentifKirim">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_insentif_kirim; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataInsentifKirim', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'insentif kirim';
  $data['url'] = 'InsentifKirim/import';
  echo show_my_modal('modals/modal_import', 'import-insentif-kirim', $data);
?>
