<?php
  $no = 1;
  foreach ($dataPenjualan as $penjualan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $penjualan->kode; ?></td>
      <td><?php echo $penjualan->qty; ?></td>
      <td><?php echo $penjualan->satuan; ?></td>
      <td><?php echo $penjualan->harga; ?></td>
      <td><?php echo $penjualan->disc1; ?></td>
      <td><?php echo $penjualan->disc2; ?></td>
      <td><?php echo $penjualan->disc3; ?></td>
      <td><?php echo $penjualan->jml; ?></td>
      <td><?php echo $penjualan->bonus; ?></td>
      <td><?php echo $penjualan->gudang; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKota" data-id="<?php echo $penjualan->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-kota" data-id="<?php echo $penjualan->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
