
<div class="modal-content" style="width:950px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Data Retur Penjualan</h4>
    </div>
    <div class="modal-body" id="table_content_load">
                        <table id="lookupLoad" class="table table-bordered table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Disc1</th>
                                    <th>Disc2</th>
                                    <th>Disc3</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                    <?php
                                      // $no = 1;
                                      foreach ($dataReturCari as $returCari) {
                                        ?>
                                        <tr>
                                          <td><?php echo $returCari->Kode; ?></td>
                                          <td><?php echo $returCari->Nama; ?></td>
                                          <td><?php echo $returCari->Qty; ?></td>
                                          <td><?php echo $returCari->Satuan; ?></td>
                                          <td><?php echo $returCari->Harga; ?></td>
                                          <td><?php echo $returCari->Discount; ?></td>
                                          <td><?php echo $returCari->Discount2; ?></td>
                                          <td><?php echo $returCari->DiscRp; ?></td>
                                          <td><?php echo $returCari->Jumlah; ?></td>
                                          <input type="hidden" name="faktur_retur" id="faktur_retur" value="<?php echo $returCari->Faktur; ?>">
                                          <td align="center"><input type="checkbox" name="cekList[]" id="cekList[]" value="<?php echo $returCari->Kode; ?>" class="custom-control-input">
                                            <button class="btn btn-warning update-dataReturPjl" data-id="<?php echo $returCari->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                          </td>
                                        </tr>
                                         <?php
                                        // $no++;
                                        }
                                        ?>
                              </table>
                              <hr />
                              <div class="col-md-4">
                                <button type="button" id="btnRetur" onclick="retur()" class="btn btn-primary btn-block"><i class="fa fa-circle-o-notch"></i> Retur</button><a id="ack"></a>
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

function retur(){
  var checked = $('input:checkbox:checked').map(function() {
  return this.value;
  }).get();

      $.ajax({
      url: "<?php echo site_url('ReturPenjualan/insert');?>",
      type: 'POST',
      cache: false,
      data: {
      "cekList": checked, "faktur_retur": $("#faktur_retur").val()},
      success: function(data) {
      $('#cari-retur-beli').modal('hide');
      location.reload();
      }
      });

}

</script>

<script type="text/javascript">

$(document).on("click", ".update-dataReturPjl", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('ReturPenjualan/updateReturPjl'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    $('#cari-retur-beli').modal('hide');
    $('#update-returpjl').modal('show');
  })
})

$(document).on('submit', '#form-update-returpjl', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('ReturPenjualan/prosesUpdateReturPjl'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-returpjl").reset();
      $('#update-returpjl').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();

  })

  e.preventDefault();
});

</script>
