<?php
  //$no = 1;
  foreach ($dataKendaraan as $kendaraan) {
    ?>
    <tr>
      <td><?php echo $kendaraan->Kode; ?></td>
      <td><?php echo $kendaraan->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKendaraan" data-id="<?php echo $kendaraan->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-kendaraan" data-id="<?php echo $kendaraan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
