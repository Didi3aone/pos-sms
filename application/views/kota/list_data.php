<?php
  //$no = 1;
  foreach ($dataKota as $kota) {
    ?>
    <tr>
      <td><?php echo $kota->Kode; ?></td>
      <td><?php echo $kota->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKota" data-id="<?php echo $kota->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-kota" data-id="<?php echo $kota->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
