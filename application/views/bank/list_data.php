<?php
  //$no = 1;
  foreach ($dataBank as $bank) {
    ?>
    <tr>
      <td><?php echo $bank->Kode; ?></td>
      <td><?php echo $bank->Nama; ?></td>
	  <td><?php echo $bank->AN; ?></td>
	  <td><?php echo $bank->Rek; ?></td>
	  <td><?php echo $bank->Akun; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataBank" data-id="<?php echo $bank->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-bank" data-id="<?php echo $bank->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
