<?php
  //$no = 1;
  foreach ($dataInsentifKirim as $insentifKirim) {
    ?>
    <tr>
      <td><?php echo $insentifKirim->jenis; ?></td>
      <td><?php echo $insentifKirim->supir; ?></td>
	  <td><?php echo $insentifKirim->helper; ?></td>


	    <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataInsentifKirim" data-id="<?php echo $insentifKirim->id; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-insentifKirim" data-id="<?php echo $insentifKirim->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
