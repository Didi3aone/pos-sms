<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan').click(function() {
       toastr.success('Data pinjaman supplier berhasil disimpan.');
    });
});
</script>

<div class="box">
  <div class="box-header">
    <form id="formPembelian" action="" method="post">
      <?php
      foreach ($this->M_piutangSupplier->last_record() as $row) {
        $faktur = $row->faktur;
        $cutCharFaktur = substr($faktur, 2);
        $cutCharFaktur2 = substr($faktur,0,2);
        $convFaktur = (int)$cutCharFaktur+1;
       ?>
       <input type="hidden" class="form-control" value="<?php echo $cutCharFaktur2.$convFaktur; ?>" name="faktur" id="faktur" style="width:200px;" readonly>
       <?php
     }
     ?>

      <input type="hidden" name="today" id="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <input type="hidden" name="user" id="user" value="<?php echo $getUser[0]->name; ?>">
      <label>Tanggal</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgl" value=<?php echo date("Y-m-d"); ?> name="tgl" style="width:150px;">
                    </div>
                    <!-- /.input group -->
                  </div>
    <label>Supplier</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </span>
                    <select id="supplier" name="supplier" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:240px;">
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
      <label>Keterangan</label>
      <div class="input-group form-group">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
      <textarea name="keterangan" id="keterangan" cols="50" rows="5" class="form-control" style="width:300px;"></textarea>
      </div>
      <label>Penerima</label>
    <div class="input-group form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" name="penerima" id="penerima" style="width:250px;">
                    </div>
                    <!-- /.input group -->
                  </div>
      <label>Jumlah</label>
                  <div class="input-group form-group">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calculator"></i>
                                  </div>
                                  <input type="text" class="form-control" name="jumlah" id="jumlah" style="width:250px;">
                                </div>
                                <!-- /.input group -->
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

<hr />

<div class="col-md-4 text-left">
  <a href="<?php echo base_url();?>PinjamanSupplier/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Tambah Baru</a>
<hr />
</div>
<div class="col-md-4 text-right">
  <button type="button" id="simpan" onClick="save()" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Simpan</button><a id="ack"></a>
<hr />
</div>
</form>
<div class="col-md-4 text-left">
  <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button>
<hr />
</div>

<script>
function save(){

    $.ajax({
    url: "<?php echo site_url('PinjamanSupplier/prosesSimpan');?>",
    type: 'POST',
    cache: false,
    data: {
    "faktur": $("#faktur").val(), "today": $("#today").val(), "user": $("#user").val(),
    "tgl": $("#tgl").val(), "kd_supplier": $("#kd_supplier").val(), "keterangan": $("#keterangan").val(),
    "penerima": $("#penerima").val(), "jumlah": $("#jumlah").val()},
     success: function(data) {
     $("div#ack").html(data);
     }
    });

}
</script>

<!-- Modal Pencarian -->
<div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:485px">
                    <div class="modal-body">
                      <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="display:block; text-align:center;">Cari Pinjaman Supplier</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="fa fa-gears"></i>
                            </span>
                            <select id="fakturCari" name="fakturCari" class="form-control select2" aria-describedby="sizing-addon2" style="width:300px;">
                              <option value="">- Pilih Faktur -</option>
                                <?php
                                foreach ($dataPiutangSupplier as $piutangSupplier) {
                                  ?>
                                  <option value="<?php echo $piutangSupplier->faktur; ?>">
                                    <?php echo $piutangSupplier->faktur; ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnCari" onclick="cariPinSup()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Cari</button><a id="ackCariPinSup"></a>
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

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPinSup', 'Anda yakin menghapus data ini?', 'Ya'); ?>

<script>
function cariPinSup(){

      $.ajax({
      url: "<?php echo site_url('PinjamanSupplier/pencarianPinjamanSup');?>",
      type: 'POST',
      cache: false,
      data: {
      "fakturCari": $("#fakturCari").val()},
      success: function(data) {
      $('#tempat-modalTampil').html(data);
      $('#modalCari').modal('hide');
      $('#cari-pinsup').modal('show');
      }
      });

}
</script>


  </div>
  <!-- /.box-header -->

</div>
