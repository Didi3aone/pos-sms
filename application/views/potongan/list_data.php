<?php
  //$no = 1;
  foreach ($dataPotongan as $potongan) {
    ?>
    <tr>
      <td><?php echo $potongan->Kode; ?></td>
      <td><?php echo $potongan->Keterangan; ?></td>
	  <td><?php echo $potongan->Ket; ?></td>
	    <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPotongan" data-id="<?php echo $potongan->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-potongan" data-id="<?php echo $potongan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
