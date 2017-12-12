<?php
  //$no = 1;
  foreach ($dataHargaBeli as $hargaBeli) {
    ?>
    <tr>
      <td><?php echo $hargaBeli->Supplier; ?></td>
      <td><?php echo $hargaBeli->Barang; ?></td>
	  <td><?php echo $hargaBeli->HJS; ?></td>
    <td><?php echo $hargaBeli->HJM; ?></td>
    <td><?php echo $hargaBeli->HJL; ?></td>
	    <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataHargaBeli" data-id="<?php echo $hargaBeli->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-hargaBeli" data-id="<?php echo $hargaBeli->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
