<?php
  //$no = 1;
  foreach ($dataPiutang as $piutang) {
    ?>
    <tr>
      <td><?php echo $piutang->Kode; ?></td>
      <td><?php echo date("d-m-Y", strtotime($piutang->Tanggal)); ?></td>
      <td><?php echo $piutang->Faktur; ?></td>
      <td><?php echo $piutang->Customer; ?></td>
      <td><?php echo $piutang->FakturAsli; ?></td>
      <td><?php echo $piutang->Piutang; ?></td>
      <td><?php echo $piutang->Status; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPiutang" data-id="<?php echo $piutang->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-piutang" data-id="<?php echo $piutang->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>

    <?php
    //$no++;
  }
?>
