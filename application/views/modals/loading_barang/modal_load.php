
<div class="modal-content" style="width:800px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Faktur Penjualan</h4>
    </div>
    <div class="modal-body" id="table_content_load">
                        <table id="lookupLoad" class="table table-bordered table-hover table-striped">

                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                    <?php
                                      $no = 1;
                                      foreach ($dataLoad as $load) {
                                        ?>
                                        <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $load->FakJual; ?></td>
                                          <td><?php echo $load->Tgl; ?></td>
                                          <td><?php echo $load->Keterangan; ?></td>
                                          <input type="hidden" name="faktur_load" id="faktur_load" value="<?php echo $load->Faktur; ?>">
                                          <td align="center"><input type="checkbox" name="cekList[]" id="cekList[]" value="<?php echo $load->FakJual; ?>" class="custom-control-input"></td>
                                        </tr>
                                         <?php
                                        $no++;
                                        }
                                        ?>
                              </table>
                              <hr />
                              <div class="col-md-4">
                                <button type="button" id="btnLoad" onclick="load()" class="btn btn-primary btn-block"><i class="fa fa-circle-o-notch"></i> Load</button><a id="ack"></a>
                              </div>
                              <div class="col-md-4">
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary btn-block"><i class="fa fa-share-square-o"></i> Cancel</button><a id="ack"></a>
                              </div>
                              <br /> <br />
                          </div>

                      </div>
<!-- End Modal -->

<script type="text/javascript">
    $(function () {
        $("#lookupLoad").dataTable({
          "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        });
    });
</script>

<script>

function load(){
  var checked = $('input:checkbox:checked').map(function() {
  return this.value;
  }).get();

      $.ajax({
      url: "<?php echo site_url('LoadingBarang/insert');?>",
      type: 'POST',
      cache: false,
      data: {
      "cekList": checked, "faktur_load": $("#faktur_load").val()},
      success: function(data) {
      $('#load-barang').modal('hide');
      location.reload();
      }
      });

}
</script>
