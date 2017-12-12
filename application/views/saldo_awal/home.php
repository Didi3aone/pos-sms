<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-saldo-awal"><i class="glyphicon glyphicon-pencil"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('SaldoAwal/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-saldo-awal"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped" style="vertical-align: middle;">
      <thead>
    <tr>
        <td rowspan="2" style="text-align: center; vertical-align: middle;" >Kode</td>
        <td rowspan="2" style="text-align: center; vertical-align: middle;">Nama Barang</td>
        <td colspan="6" style="text-align: center;">Konversi Antar Satuan</td>
        
        <td rowspan="2" style="text-align: center; vertical-align: middle;">Aksi</td>
    </tr>
    <tr>
        
       
        <td style="text-align: center;">Qty</td>
        <td style="text-align: center;">S</td>
        <td style="text-align: center;">Qty</td>
        <td style="text-align: center;">M</td>
        <td style="text-align: center;">Qty</td>
        <td style="text-align: center;">L</td>
        
    </tr>
   
   
              </thead>
      <tbody id="data-saldoAwal">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_saldo_awal; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSaldoAwal', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Saldo Awal';
  $data['url'] = 'SaldoAwal/import';
  echo show_my_modal('modals/modal_import', 'import-saldo-awal', $data);
?>
