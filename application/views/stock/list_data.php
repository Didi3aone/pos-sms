<?php
  //$no = 1;
  foreach ($dataStock as $stock) {
    ?>
    <tr>
      <td><?php echo $stock->Kode; ?></td>
      <td><?php echo $stock->Nama; ?></td>
      <td><?php echo $stock->Merk ; ?></td>
      <td><?php echo $stock->Golongan; ?></td>
      <td><?php echo $stock->Satuan1; ?></td>
      <td>1 <?php echo $stock->Satuan2; ?> = <?php echo $stock->JmlSat1; ?> <?php echo $stock->Satuan1; ?></td>
      <td>1 <?php echo $stock->Satuan3; ?> = <?php echo $stock->JmlSat2; ?> <?php echo $stock->Satuan2; ?></td>
      <td><?php $total1=$stock->JmlSat2*$stock->JmlSat1*$stock->Satuan1;
                $total2=$stock->JmlSat1*$stock->Satuan2;
                $total=$stock->Satuan1+$total1+$total2;
           echo $stock->JmlSat2*$stock->JmlSat1;?> <?php echo $stock->Satuan1;?></td>
      <td class="text-center" style="min-width:230px;">
                <!-- <input type="hidden" name="kode" data-kode="<?php echo $stock->Kode; ?>"> -->
          <button class="btn btn-warning update-dataStock" data-id="<?php echo $stock->ID; ?>"><i class="glyphicon glyphicon-edit"></i> </button>
          <button class="btn btn-danger konfirmasiHapus-stock" data-id="<?php echo $stock->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> </button>
          <button class="btn btn-info detail-dataStock" data-id="<?php echo $stock->ID; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
