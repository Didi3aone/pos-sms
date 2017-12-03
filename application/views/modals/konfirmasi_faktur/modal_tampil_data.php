
      <div class="modal-content" style="width: 900px;">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cari Data Konfirmasi Faktur</h4>
          </div>
          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Faktur</th>
                                          <th>Tanggal</th>
                                          <th>Customer</th>
                                          <th>Draft</th>
                                          <th>Total</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-update">
                                    <?php
                                      foreach ($dataKonfirmasiFaktur as $konfirmasiFaktur) {
                                        ?>
                                        <tr>
                                          <td><?php echo $konfirmasiFaktur->Faktur; ?></td>
                                          <td><?php echo date("d-m-Y", strtotime($konfirmasiFaktur->Tanggal)); ?></td>
                                          <td><?php echo $konfirmasiFaktur->Nama; ?></td>
                                          <td><?php echo $konfirmasiFaktur->Draft; ?></td>
                                          <td><?php echo $konfirmasiFaktur->Total; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataKonFak" data-id="<?php echo $konfirmasiFaktur->Faktur; ?>"><i class="glyphicon glyphicon-edit"></i>Edit</button>
                                              <button class="btn btn-danger konfirmasiHapus-konFak" data-id="<?php echo $konfirmasiFaktur->Faktur; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i>Delete</button>
                                          </td>
                                        </tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                              <hr />
                                <div class="input-group form-group">
                                  <span class="input-group-addon">
                                  <label>Grand Total</label>
                                </span>
                                <input type="text" class="form-control" value=<?php if($dataTotal[0]->g_total != NULL) { echo $dataTotal[0]->g_total; } else echo "0"; ?> name="grand_total" id="grand_total" style="width:200px;" readonly>
                              </div>
                              <hr />
                          </div>
                        </div>
<!-- End Modal -->

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable({
          "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        });
    });
</script>

<script type="text/javascript">

var id_kFaktur;
$(document).on("click", ".konfirmasiHapus-konFak", function() {
  id_kFaktur = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataKonFak", function() {
  var id = id_kFaktur;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('KonfirmasiFakturKembali/deleteKonFak'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    window.alert("Data Berhasil Dihapus");
    location.reload();
    // refresh();
    // $('#modalCari').modal('show');
    //$('#lookupCari').dataTable().ajax.reload();

  })
})

$(document).on("click", ".update-dataKonFak", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('KonfirmasiFakturKembali/updateKonfirmasiFak'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    $('#cari-konf-faktur').modal('hide');
    $('#update-konfak').modal('show');
  })
})

$(document).on('submit', '#form-update-konfak', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('KonfirmasiFakturKembali/prosesUpdateKonFak'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-konfak").reset();
      $('#update-konfak').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();

  })

  e.preventDefault();
});
</script>
