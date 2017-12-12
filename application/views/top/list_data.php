<?php
  //$no = 1;
  foreach ($dataTop as $top) {
    ?>
    <tr>
      <td><?php echo $top->Tempo; ?></td>
      <td><?php echo $top->Keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataTop" data-id="<?php echo $top->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-top" data-id="<?php echo $top->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
