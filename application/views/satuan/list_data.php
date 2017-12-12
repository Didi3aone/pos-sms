<?php
  //$no = 1;
  foreach ($dataSatuan as $satuan) {
    ?>
    <tr>
      <td><?php echo $satuan->Kode; ?></td>
      <td><?php echo $satuan->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataSatuan" data-id="<?php echo $satuan->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-satuan" data-id="<?php echo $satuan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
