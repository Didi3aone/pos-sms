
<!-- Modal Cari -->
      <div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="width:900px">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Cari Data Pembelian</h4>
                          </div>
                          <div class="modal-body">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Faktur</th>
                                          <th>Tgl</th>
      									                  <th>Kode</th>
                                          <th>Harga</th>
                                          <th>Qty</th>
                                          <th>Satuan</th>
      									                  <th>Total</th>
                                          <th>Gudang</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody id="data-pembelian">
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
<!-- End Modal -->
<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable();
    });
</script>
