
      <div class="modal-content" style="width: 900px;">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cari Data Giro Cair</h4>
          </div>
          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>No Bukti</th>
                                          <th>Jatuh Tempo</th>
      									                  <th>Jumlah</th>
                                          <th>Bank</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-update">
                                    <?php
                                      foreach ($dataGabungan as $gabungan) {
                                        ?>
                                        <tr>
                                          <td><?php echo $gabungan->Kode; ?></td>
                                          <td><?php echo $gabungan->JthTmp; ?></td>
                                          <td><?php echo $gabungan->Jumlah; ?></td>
                                          <td><?php echo $gabungan->bank; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataGiro" data-id="<?php echo $gabungan->ID; ?>"><i class="glyphicon glyphicon-edit"></i>Edit</button>
                                              <button class="btn btn-danger konfirmasiHapus-giro" data-id="<?php echo $gabungan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i>Delete</button>
                                          </td>
                                        </tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
<!-- End Modal -->

<script>
    $(function () {
        $("#lookupCari").dataTable({
          "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        });
    });
</script>

<script type="text/javascript">
$(document).on("click", ".update-dataGiro", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('GiroCair/updateGiro'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    $('#cari-giro').modal('hide');
    $('#update-giro').modal('show');
  })
})

$(document).on('submit', '#form-update-giro', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('GiroCair/prosesUpdateGiro'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-giro").reset();
      $('#update-giro').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();

  })

  e.preventDefault();
});
</script>
