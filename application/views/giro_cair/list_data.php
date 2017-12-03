<?php
  $no = 1;
  foreach ($dataGiro as $giro) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $giro->kode; ?></td>
      <td><?php echo date("d-m-Y", strtotime($giro->jatuhTempo)) ?></td>
      <td><?php echo $giro->jumlah; ?></td>
      <td><?php echo $giro->bank; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataGiro" data-id="<?php echo $giro->kode; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-giro" data-id="<?php echo $giro->kode; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
