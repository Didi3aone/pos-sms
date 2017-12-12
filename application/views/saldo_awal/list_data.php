<?php
  //$no = 1;
  foreach ($dataSaldoAwal as $saldoAwal) {
    ?>
    <tr>
      <td><?php echo $saldoAwal->Kode; ?></td>
      <td><?php echo $saldoAwal->Nama; ?></td>
      <td><?php echo $saldoAwal->Small; ?></td>
      <td><?php echo $saldoAwal->Satuan1; ?></td>
      <td><?php echo $saldoAwal->Medium; ?></td>
      <td><?php echo $saldoAwal->Satuan2; ?></td>
      <td><?php echo $saldoAwal->Large; ?></td>
      <td><?php echo $saldoAwal->Satuan3; ?></td>
      
      
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataSaldoAwal" data-id="<?php echo $saldoAwal->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <!-- <button class="btn btn-danger konfirmasiHapus-saldoAwal" data-id="<?php echo $saldoAwal->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button> -->
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
