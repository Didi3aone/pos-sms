<?php
  //$no = 1;
  foreach ($dataSalesman as $salesman) {
    ?>
    <tr>
      <!-- <td><?php echo $salesman->Kode; ?></td> -->
      <td><?php echo $salesman->Nama; ?></td>
      <td><?php echo $salesman->Alamat; ?></td>
      <td><?php echo $salesman->Kota; ?></td>
      <td><?php echo $salesman->Telepon; ?></td>
      <td><?php echo $salesman->Fax; ?></td>
      <td><?php echo $salesman->HP; ?></td>
      <td><?php echo $salesman->Email; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataSalesman" data-id="<?php echo $salesman->Kode; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-salesman" data-id="<?php echo $salesman->Kode; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
