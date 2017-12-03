<?php
  //$no = 1;
  foreach ($dataJenisUsaha as $jenisUsaha) {
    ?>
    <tr>
      <td><?php echo $jenisUsaha->Kode; ?></td>
      <td><?php echo $jenisUsaha->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataJenisUsaha" data-id="<?php echo $jenisUsaha->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-jenisUsaha" data-id="<?php echo $jenisUsaha->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
