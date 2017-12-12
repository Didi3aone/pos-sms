<?php
  //$no = 1;
  foreach ($dataHargaJual as $hargaJual) {
    ?>
    <tr>
      <td><?php echo $hargaJual->JenisUsaha; ?></td>
      <td><?php echo $hargaJual->Barang; ?></td>
	  <td><?php echo $hargaJual->HJS; ?></td>
    <td><?php echo $hargaJual->HJM; ?></td>
    <td><?php echo $hargaJual->HJL; ?></td>
	    <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataHargaJual" data-id="<?php echo $hargaJual->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-hargaJual" data-id="<?php echo $hargaJual->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
