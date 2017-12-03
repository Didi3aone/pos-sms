<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pembelian</h3>

  <form id="form-tambah-pembelian" method="POST">
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_pembelian" placeholder="Tanggal" name=tgl_beli>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <script>
                  $(function() {
 	 $("#tgl_pembelian").datepicker({
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
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
    <input type="text" class="form-control" placeholder="Supplier" name="supplier" aria-describedby="sizing-addon2">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-th-list"></i>
    </span>
    <input type="text" class="form-control" placeholder="Kode" name="kode" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
    <input type="text" class="form-control" placeholder="Faktur Supplier" name="fak_supplier" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_jatuh_tempo" placeholder="Jatuh Tempo" name=jatuh_tempo>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <script>
                  $(function() {
   $("#tgl_jatuh_tempo").datepicker({
       autoclose: true,
         format: "yyyy-mm-dd",
         todayHighlight: true,
         orientation: "down auto",
         todayBtn: true,
         todayHighlight: true,
          });
  });
</script>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
