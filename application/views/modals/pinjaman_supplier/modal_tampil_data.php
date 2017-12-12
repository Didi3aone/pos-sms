
      <div class="modal-content" style="width: 900px;">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cari Data Pinjaman Supplier</h4>
          </div>
          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Tanggal</th>
                                          <th>Supplier</th>
      									                  <th>Keterangan</th>
                                          <th>Penerima</th>
                                          <th>Jumlah</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-update">
                                    <?php
                                      foreach ($dataPinjamanSup as $pinjamanSup) {
                                        ?>
                                        <tr>
                                          <td><?php echo $pinjamanSup->tgl; ?></td>
                                          <td><?php echo $pinjamanSup->supplier; ?></td>
                                          <td><?php echo $pinjamanSup->keterangan; ?></td>
                                          <td><?php echo $pinjamanSup->penerima; ?></td>
                                          <td><?php echo $pinjamanSup->jumlah; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataPinSub" data-id="<?php echo $pinjamanSup->id; ?>"><i class="glyphicon glyphicon-edit"></i>Edit</button>
                                              <button class="btn btn-danger konfirmasiHapus-pinSup" data-id="<?php echo $pinjamanSup->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i>Delete</button>
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

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable({
          "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        });
    });
</script>

<script type="text/javascript">

var id_pinsup;
$(document).on("click", ".konfirmasiHapus-pinSup", function() {
  id_pinsup = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataPinSup", function() {
  var id = id_pinsup;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PinjamanSupplier/deletePinSup'); ?>",
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

$(document).on("click", ".update-dataPinSub", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PinjamanSupplier/updatePinjamanSup'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    $('#cari-pinsup').modal('hide');
    $('#update-pinsup').modal('show');
  })
})

$(document).on('submit', '#form-update-pinsup', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('PinjamanSupplier/prosesUpdatePinSup'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-pinsup").reset();
      $('#update-pinsup').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();

  })

  e.preventDefault();
});
</script>
