<?php
  //$no = 1;
  foreach ($dataJabatan as $jabatan) {
    ?>
    <tr>
      <td><?php echo $jabatan->Kode; ?></td>
      <td><?php echo $jabatan->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataJabatan" data-id="<?php echo $jabatan->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-jabatan" data-id="<?php echo $jabatan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
