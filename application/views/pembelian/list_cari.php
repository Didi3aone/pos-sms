<?php
  foreach ($dataPembelian as $pembelian) {
    ?>
    <tr>
      <td><?php echo $pembelian->Faktur; ?></td>
      <td><?php echo $pembelian->Tgl; ?></td>
      <td><?php echo $pembelian->Kode; ?></td>
      <td><?php echo $pembelian->Harga; ?></td>
      <td><?php echo $pembelian->Qty; ?></td>
      <td><?php echo $pembelian->Satuan; ?></td>
      <td><?php echo $pembelian->Jumlah; ?></td>
      <td><?php echo $pembelian->gudang; ?></td>
      <td class="text-center" style="min-width:50px;">
          <button class="btn btn-warning update-dataGudang" data-id="<?php echo $pembelian->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-gudang" data-id="<?php echo $pembelian->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
      </td>
    </tr>
      <?php
  }
  ?>
