<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-karyawan"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Karyawan/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-karyawan"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th> 
          <th>Alamat </th>
          <th>Jabatan </th>
          <th>Tanggal Lahir </th>
          <th>Tanggal Kerja </th>
          <th>Jenis Kelamin </th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-karyawan">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_karyawan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKaryawan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Karyawan';
  $data['url'] = 'Karyawan/import';
  echo show_my_modal('modals/modal_import', 'import-karyawan', $data);
?>
