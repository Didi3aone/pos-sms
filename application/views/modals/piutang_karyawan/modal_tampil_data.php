
      <div class="modal-content" style="width: 900px;">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cari Data Piutang Karyawan</h4>
          </div>
          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Tanggal</th>
                                          <th>Nama</th>
      									                  <th>Jabatan</th>
                                          <th>Jumlah</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-update">
                                    <?php
                                      foreach ($dataPiutangKar as $piutangKar) {
                                        ?>
                                        <tr>
                                          <td><?php echo $piutangKar->tgl; ?></td>
                                          <td><?php echo $piutangKar->nama; ?></td>
                                          <td><?php echo $piutangKar->jabatan; ?></td>
                                          <td><?php echo $piutangKar->jumlah; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataPiuKar" data-id="<?php echo $piutangKar->id; ?>"><i class="glyphicon glyphicon-edit"></i>Edit</button>
                                              <button class="btn btn-danger konfirmasiHapus-piuKar" data-id="<?php echo $piutangKar->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i>Delete</button>
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

var id_piukar;
$(document).on("click", ".konfirmasiHapus-piuKar", function() {
  id_piukar = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataPiuKar", function() {
  var id = id_piukar;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PiutangKaryawan/deletePiuKar'); ?>",
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

$(document).on("click", ".update-dataPiuKar", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('PiutangKaryawan/updatePiutangKar'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    $('#cari-piukar').modal('hide');
    $('#update-piukar').modal('show');
  })
})

$(document).on('submit', '#form-update-piukar', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('PiutangKaryawan/prosesUpdatePiuKar'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-piukar").reset();
      $('#update-piukar').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();

  })

  e.preventDefault();
});
</script>
