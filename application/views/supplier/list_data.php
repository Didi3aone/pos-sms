<?php
  //$no = 1;
  foreach ($dataSupplier as $supplier) {
    ?>
    <tr>
     <td><?php echo $supplier->Kode; ?></td>
      <td><?php echo $supplier->Nama; ?></td>
      <td><?php echo $supplier->Alamat; ?></td>
      <td><?php echo $supplier->Kota; ?></td>
      <td><?php echo $supplier->Telepon; ?></td>
      <td><?php echo $supplier->Fax; ?></td>
      
      <!-- <td><?php echo $supplier->JenisUsaha; ?></td>
      <td><?php echo $supplier->EmailCP1; ?></td> -->
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-info detail-dataSupplier" data-id="<?php echo $supplier->Kode; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
          <button class="btn btn-warning update-dataSupplier" data-id="<?php echo $supplier->Kode; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-supplier" data-id="<?php echo $supplier->Kode; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
          
      </td>               
    </tr>
    <?php
    //$no++;
  }
?>
