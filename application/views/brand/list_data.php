<?php
  //$no = 1;
  foreach ($dataBrand as $brand) {
    ?>
    <tr>
     <td><?php echo $brand->Kode; ?></td>
      <td><?php echo $brand->Keterangan; ?></td>
	  <td><?php echo $brand->Supplier; ?></td>
	    <td class="text-center" style="min-width:200px;">
          <button class="btn btn-warning update-dataBrand" data-id="<?php echo $brand->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
          <button class="btn btn-danger konfirmasiHapus-brand" data-id="<?php echo $brand->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> </button>
         <!--  <button class="btn btn-info detail-dataBrand" data-id="<?php echo $brand->ID; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button> -->
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
