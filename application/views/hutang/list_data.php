<?php
  //$no = 1;
  foreach ($dataHutang as $hutang) {
    ?>
    <tr>
      <td><?php echo $hutang->Kode; ?></td>
      <td><?php echo date("d-m-Y", strtotime($hutang->Tanggal)); ?></td>
      <td><?php echo $hutang->Faktur; ?></td>
      <td><?php echo $hutang->Supplier; ?></td>
      <td><?php echo $hutang->FakturAsli; ?></td>
      <td><?php echo $hutang->Hutang; ?></td>
      <td><?php echo $hutang->Status; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataHutang" data-id="<?php echo $hutang->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-hutang" data-id="<?php echo $hutang->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>

    <?php
    //$no++;
  }
?>
