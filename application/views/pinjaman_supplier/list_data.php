<?php
  $no = 1;
  foreach ($dataPiutangSupplier as $piutangSup) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo date("d-m-Y", strtotime($piutangSup->tgl)) ?></td>
      <td><?php echo $piutangSup->nama_supplier; ?></td>
      <td><?php echo $piutangSup->ket; ?></td>
      <td><?php echo $piutangSup->penerima; ?></td>
      <td><?php echo $piutangSup->jml; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPiutangSupplier" data-id="<?php echo $piutangSup->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-piutang-supplier" data-id="<?php echo $piutangSup->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
