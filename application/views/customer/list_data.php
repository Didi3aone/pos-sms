<?php
  //$no = 1;
  foreach ($dataCustomer as $customer) {
    ?>
    <tr>
      <td><?php echo $customer->Kode; ?></td>
      <td><?php echo $customer->Nama; ?></td>
	    <td><?php echo $customer->Alamat; ?></td>
      <td><?php echo $customer->Telepon; ?></td>
      <td><?php echo $customer->Fax; ?></td>
	    <td><?php echo $customer->Kota; ?></td>
      <td><?php echo $customer->JenisUsaha; ?></td>
	    <td><?php echo $customer->EmailCP1; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataCustomer" data-id="<?php echo $customer->Kode; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-customer" data-id="<?php echo $customer->Kode; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>               
    </tr>
    <?php
    //$no++;
  }
?>
