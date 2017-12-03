<?php
  //$no = 1;
  foreach ($dataGudang as $gudang) {
    ?>
    <tr>
      <td><?php echo $gudang->Kode; ?></td>
      <td><?php echo $gudang->Keterangan; ?></td>
      <td><?php echo $gudang->Jenis; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataGudang" data-id="<?php echo $gudang->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-gudang" data-id="<?php echo $gudang->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
