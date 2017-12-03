<?php
  $no = 1;
  foreach ($dataJurnalHarian as $jurnalHarian) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $jurnalHarian->kode; ?></td>
      <td><?php echo $jurnalHarian->perkiraan; ?></td>
      <td><?php echo $jurnalHarian->debet; ?></td>
      <td><?php echo $jurnalHarian->kredit; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataJurnalHarian" data-id="<?php echo $jurnalHarian->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-jurnalHarian" data-id="<?php echo $jurnalHarian->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
