<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-supplier"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Supplier/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-supplier"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
         <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Telepon</th>
          <th>Fax</th>
          
          <!--<th>Jenis Usaha</th> 
          <th>Email</th>-->
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-supplier">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_supplier; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSupplier', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'supplier';
  $data['url'] = 'Supplier/import';
  echo show_my_modal('modals/modal_import', 'import-supplier', $data);
?>
