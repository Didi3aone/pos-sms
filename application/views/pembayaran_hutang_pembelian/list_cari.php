<?php
  foreach ($dataPelunasanHutang as $pelunasanHutang) {
    ?>
    <tr>
      <td><?php echo $pelunasanHutang->Faktur; ?></td>
      <td><?php echo $pelunasanHutang->Tgl; ?></td>
      <td><?php echo $pelunasanHutang->Fkt; ?></td>
      <td><?php echo $pelunasanHutang->Status; ?></td>
      <td><?php echo $pelunasanHutang->Hutang; ?></td>
      <td><?php echo $pelunasanHutang->Bayar; ?></td>
      <td><?php echo $pelunasanHutang->Sisa; ?></td>
      <td><?php echo $pelunasanHutang->Supplier; ?></td>
      <td class="text-center" style="min-width:50px;">
          <button class="btn btn-warning update-dataHutang" data-id="<?php echo $pelunasanHutang->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-hutang" data-id="<?php echo $pelunasanHutang->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
      </td>
      </tr>
      <?php
  }
  ?>
