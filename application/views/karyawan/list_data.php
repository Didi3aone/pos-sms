<?php
  //$no = 1;
  foreach ($dataKaryawan as $karyawan) {
    ?>
    <tr>
      <td><?php echo $karyawan->Kode; ?></td>
      <td><?php echo $karyawan->Nama; ?></td> 
      <td><?php echo $karyawan->Alamat; ?></td> 
      <td><?php echo $karyawan->Jabatan; ?></td> 
      <td><?php echo date("d-m-Y", strtotime($karyawan->Lahir)); ?></td> 
      <td><?php echo date("d-m-Y", strtotime($karyawan->Kerja)); ?></td>
      <td><?php echo $karyawan->JK; ?></td>
      
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKaryawan" data-id="<?php echo $karyawan->ID; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-karyawan" data-id="<?php echo $karyawan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i> Delete</button>
      </td>
    </tr>
    <?php
    //$no++;
  }
?>
