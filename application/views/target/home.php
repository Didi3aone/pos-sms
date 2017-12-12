<script type="text/javascript">
           
function terimainputCombox1(){
           var input=document.forms['frmTarget']['salesman'].value;
           var jenis=document.forms['frmTarget']['jenis'].value;
           var outputKode = document.getElementById("kd_sales");
           var outputAlamat = document.getElementById("alamat");
           var hasil = input.split(","); 
           outputAlamat.value = hasil[1];
           outputKode.value = hasil[0];  
            var gabung = hasil[0],jenis;
            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah_tempTarget');?>",
            type: 'POST',
            data: {
              "kd_sales": $("#kd_sales").val(), "jenis": $("#jenis").val()
            },
             success: function(data) {
             $("div#ack").html(data);
             }
            });
            

            return gabung;
}

//js target 1  
function comboTarget1(){
           var input=document.forms['inputTabel']['nama_kode_barang1'].value;
           var outputKode = document.getElementById("kode1");
           var outputBarang = document.getElementById("nama_barang1");
           
            var hasil = input.split(",");
           outputKode.value = hasil[0];
           outputBarang.value = hasil[1];
                     
}

function terimainput1(){
        var i, j;
        var loopingNo = document.getElementById("no1");

            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah_temp1');?>",
            type: 'POST',
            cache: false,
            data: {
              "kode1": $("#kode1").val(), "nama_barang1": $("#nama_barang1").val(), "no1": $("#no1").val(),
              "kd_sales":$("#kd_sales").val()
            },
             success: function(data) {
             $("div#ack").html(data);
             $("#responsecontainer1").load( "<?php echo base_url('Target')?> #responsecontainer1" );
          
             }
            });
             
            j=Number(document.forms['inputTabel']['no1'].value)+1;
           
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
            return false;
      }

      function hapusInput1(){

        var setNum, num = document.getElementById("no1");
        var r = confirm("Anda yakin menghapus data target terakhir?");
        if (r == true) {
          $.ajax({
          url: "<?php echo site_url('Target/delete_temp1');?>",
          type: 'POST',
          cache: false,
           success: function(html) {
           $("div#ackDel1").html(html);
           $("#responsecontainer1").load( "<?php echo base_url('Target')?> #responsecontainer1" );
           
           }
          });

          setNum = Number(document.forms['inputTabel']['no1'].value)-1;
          num.value = setNum;
          return false;

          }
      }

//js target2
function comboTarget2(){
           var input=document.forms['inputTabel2']['nama_kode_barang2'].value;
           var outputKode = document.getElementById("kode2");
           var outputBarang = document.getElementById("nama_barang2");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput2(){
        var i, j;
        var loopingNo = document.getElementById("no2");

            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah_temp2');?>",
            type: 'POST',
            data: {
              "kode2": $("#kode2").val(), "nama_barang2": $("#nama_barang2").val(), "no2": $("#no2").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack2").html(data);
             $("#responsecontainer2").load( "<?php echo base_url('Target')?> #responsecontainer2" );
             }
            });
             
            j=Number(document.forms['inputTabel2']['no2'].value)+1;
           
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
            
      }

      function hapusInput2(){

        var setNum, num = document.getElementById("no2");
        var r = confirm("Anda yakin menghapus data target terakhir?");
        if (r == true) {
          $.ajax({
          url: "<?php echo site_url('Target/delete_temp2');?>",
          type: 'POST',
          cache: false,
           success: function(html) {
           $("div#ackDel2").html(html);
           $("#responsecontainer2").load( "<?php echo base_url('Target')?> #responsecontainer2" );
           
           }
          });

          setNum = Number(document.forms['inputTabel2']['no2'].value)-1;
          num.value = setNum;
          return false;

          }
      }
      //js target3
function comboTarget3(){
           var input=document.forms['inputTabel3']['nama_kode_barang3'].value;
           var outputKode = document.getElementById("kode3");
           var outputBarang = document.getElementById("nama_barang3");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput3(){
        var i, j;
        var loopingNo = document.getElementById("no3");

            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah_temp3');?>",
            type: 'POST',
            data: {
              "kode3": $("#kode3").val(), "nama_barang3": $("#nama_barang3").val(), "no3": $("#no3").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack3").html(data);
             $("#responsecontainer3").load( "<?php echo base_url('Target')?> #responsecontainer3" );
             }
            });
             
            j=Number(document.forms['inputTabel3']['no3'].value)+1;
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
      }

function hapusInput3(){

        var setNum, num = document.getElementById("no3");
        var r = confirm("Anda yakin menghapus data target terakhir?");
        if (r == true) {
          $.ajax({
          url: "<?php echo site_url('Target/delete_temp3');?>",
          type: 'POST',
          cache: false,
           success: function(html) {
           $("div#ackDel3").html(html);
           $("#responsecontainer3").load( "<?php echo base_url('Target')?> #responsecontainer3" );
           
           }
          });

          setNum = Number(document.forms['inputTabel3']['no3'].value)-1;
          num.value = setNum;
          return false;

          }
      }
      //js target4
function comboTarget4(){
           var input=document.forms['inputTabel4']['nama_kode_barang4'].value;
           var outputKode = document.getElementById("kode4");
           var outputBarang = document.getElementById("nama_barang4");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput4(){
        var i, j;
        var loopingNo = document.getElementById("no4");

            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah_temp4');?>",
            type: 'POST',
            data: {
              "kode4": $("#kode4").val(), "nama_barang4": $("#nama_barang4").val(), "no4": $("#no4").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack4").html(data);
             $("#responsecontainer4").load( "<?php echo base_url('Target')?> #responsecontainer4" );
             }
            });
 
            j=Number(document.forms['inputTabel4']['no4'].value)+1;
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
      }

      function hapusInput4(){

        var setNum, num = document.getElementById("no4");
        var r = confirm("Anda yakin menghapus data target terakhir?");
        if (r == true) {
          $.ajax({
          url: "<?php echo site_url('Target/delete_temp4');?>",
          type: 'POST',
          cache: false,
           success: function(html) {
           $("div#ackDel4").html(html);
           $("#responsecontainer4").load( "<?php echo base_url('Target')?> #responsecontainer4" );
           
           }
          });

          setNum = Number(document.forms['inputTabel4']['no4'].value)-1;
          num.value = setNum;
          return false;

          }
      }

      function terimaPost(){

            $.ajax({
            url: "<?php echo site_url('Target/prosesTambah');?>",
            type: 'POST',
            cache: false,
            data: {
              "kd_sales": $("#kd_sales").val(),
               "jenis": $("#jenis").val(),
              "target": $("#target").val(),
               "bobot":$("#bobot").val(),
               "target1": $("#target1").val(),
               "satuan1": $("#satuan1").val(),
               "target2": $("#target2").val(),
               "satuan2":$("#satuan2").val(),
               "target3": $("#target3").val(),
               "satuan3": $("#satuan3").val(),
               "target4": $("#target4").val(),
               "satuan4":$("#satuan4").val(),
               "bobot4": $("#bobot4").val(),
               "targetEC": $("#targetEC").val(),
               "bobotEC": $("#bobotEC").val(),
               "targetOA":$("#targetOA").val(),
               "bobotOA": $("#bobotOA").val(),
               "targetAR": $("#targetAR").val(),
               "bobotAR": $("#bobotAR").val()
            },
             success: function(data) {
             $("div#ack").html(data);
             location.reload();
             }
            });
          }
   
</script>
<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
  <div class="box-header">
    <form id="frmTarget" action="" method="post" name='frmTarget'>   

    <div class="input-group form-group">
            <!-- <input id="id" type="type" class="form-control" value="<?php echo $id[0]->ID ?>" name="id" readonly> -->
            <!-- <input id="id" type="type" class="form-control" value="<?php echo $kode[0]->kode; ?>" name="id" readonly> -->


      <span class="input-group-addon">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </span>
      <select id="salesman" onchange="terimainputCombox1()" name="salesman" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
        <option value=",">- Pilih Salesman -</option>
          <?php
          foreach ($dataSalesman as $salesman) {
            ?>
            <option value="<?php echo $salesman->Kode; ?>,<?php echo $salesman->Alamat; ?>">
              <?php echo $salesman->Nama; ?>
            </option>
            <?php
          }
          ?>
        </select>
        <input id="kd_sales" type="text" class="form-control" placeholder="Kode" name="kd_sales" style="width:250px;" readonly>
        <input id="alamat" type="text" class="form-control" placeholder="Alamat" name="alamat" style="width:250px;" readonly>
        <select id="jenis" onchange="terimainputCombox1()" name="jenis" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
        <option value="">- Pilih Jenis -</option>
        <option value="1">By Cus</option>
        <option value="2">By Qty</option>
        </select>
    </div>

    <div >
      
    </div>

    
    <div class="input-group form-group">
    <div class="panel panel-default">
      
    </div>
  </div>
    </form>

    <script>
function simpan_temp() {
    document.getElementById("frmTarget").submit();
}
</script>
        

<!-- FORM TARGET 1 -->
    <form action="<?=base_url()?>Target1/prosesTambah_temp1" method="post" name="inputTabel">
      <label>target 1</label>


    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp1 as $temp1) {
        $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="no1" id="no1" style="width:50px;" readonly>

    <select id="nama_kode_barang1" onchange="comboTarget1()" name="nama_kode_barang1" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Barang -</option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>,<?php echo $stock->Nama; ?>"          >
           <?php echo $stock->Nama; ?>
         </option>
         <?php
         }
        ?>
      </select>
      <input id="nama_barang1" type="hidden" class="form-control" placeholder="nama_barang1" name="nama_barang1" readonly style="width: 80px">
      
      <input id="kode1" type="text" class="form-control" placeholder="Kode" name="kode1" readonly style="width: 210px">
<button class="btn btn btn-success btn-block" onClick="terimainput1()" type="button" style="width: 210px"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
        
    </div>

    <div class="table-responsive" style="height:100px; overflow:auto;" id="responsecontainer1">
    <table class="table table-bordered table-striped" id='tabelinput'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</td>
            
        </tr>
        <thead>
          <?php
            $no1 = 1;
            foreach ($dataTemp1 as $temp1) {
              ?>
              <tr>
                <td><?php echo $no1; ?></td>
                <td><?php echo $temp1->Kode; ?></td>
                <td><?php echo $temp1->Nama; ?></td>
                
              </tr>
              <?php
              $no1++;
              }
              ?>
        </table>
      </div>

      <hr>
      
      <button class="btn btn-danger btn-block" onClick="hapusInput1()" type="button" ><i class="glyphicon glyphicon-trash"></i>Hapus</button><a id="ackDel1"></a>
      </form>

<!-- END FORM TARGET 1 -->
<!-- FORM TARGET 2 -->
<form action="<?=base_url()?>Target1/prosesTambah_temp2" method="post" name="inputTabel2">
      <label>target 2</label>

    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp2 as $temp2) {
        $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="no2" id="no2" style="width:50px;" readonly>

    <select id="nama_kode_barang2" onchange="comboTarget2()" name="nama_kode_barang2" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Barang -</option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>,<?php echo $stock->Nama; ?>">
           <?php echo $stock->Nama; ?>
         </option>
         <?php
         }
        ?>
      </select>
      <input id="nama_barang2" type="hidden" class="form-control" placeholder="nama_barang2" name="nama_barang2" readonly style="width: 80px">
      <input id="kode2" type="text" class="form-control" placeholder="Kode" name="kode2" readonly style="width: 210px">
<button class="btn btn btn-success btn-block" onClick="terimainput2()" type="button" style="width: 210px"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack2"></a>
        
    </div>

    <div class="table-responsive" style="height:100px; overflow:auto;" id="responsecontainer2">
    <table class="table table-bordered table-striped" id='tabelinput2'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
            
        </tr>
        <thead>
          <?php
            $no2 = 1;
            foreach ($dataTemp2 as $temp2) {
              ?>
              <tr>
                <td><?php echo $no2; ?></td>
                <td><?php echo $temp2->Kode; ?></td>
                <td><?php echo $temp2->Nama; ?></td>
                
              </tr>
              <?php
              $no2++;
              }
              ?>
        </table>
      </div>

      <hr>
      
      <button class="btn btn-danger btn-block" onClick="hapusInput2()" type="button"><i class="glyphicon glyphicon-trash"></i>Hapus</button><a id="ackDel2"></a>
      </form>
<!-- END FORM TARGET 2 -->
<!-- FORM TARGET 3 -->
<form action="<?=base_url()?>Target1/prosesTambah_temp3" method="post" name="inputTabel3">
      <label>target 3</label>

    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp3 as $temp3) {
        $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="no3" id="no3" style="width:50px;" readonly>

    <select id="nama_kode_barang3" onchange="comboTarget3()" name="nama_kode_barang3" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Barang -</option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>,<?php echo $stock->Nama; ?>">
           <?php echo $stock->Nama; ?>
         </option>
         <?php
         }
        ?>
      </select>
      <input id="nama_barang3" type="hidden" class="form-control" placeholder="nama_barang3" name="nama_barang3" readonly style="width: 80px">
      <input id="kode3" type="text" class="form-control" placeholder="Kode" name="kode3" readonly style="width: 210px">
<button class="btn btn btn-success btn-block" onClick="terimainput3()" type="button" style="width: 210px"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack3"></a>
        
    </div>

    <div class="table-responsive" style="height:100px; overflow:auto;" id="responsecontainer3">
    <table class="table table-bordered table-striped" id='tabelinput3'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
            
        </tr>
        <thead>
          <?php
            $no3 = 1;
            foreach ($dataTemp3 as $temp3) {
              ?>
              <tr>
                <td><?php echo $no3; ?></td>
                <td><?php echo $temp3->Kode; ?></td>
                <td><?php echo $temp3->Nama; ?></td>
                
              </tr>
              <?php
              $no3++;
              }
              ?>
        </table>
      </div>

      <hr>
      
      <button class="btn btn-danger btn-block" onClick="hapusInput3()" type="button" ><i class="glyphicon glyphicon-trash"></i>Hapus</button><a id="ackDel3"></a>
      </form>

<!-- END FORM TARGET 3 -->
<!-- FORM TARGET 4 -->

<form action="<?=base_url()?>Target1/prosesTambah_temp4" method="post" name="inputTabel4">
      <label>target 4</label>

    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp4 as $temp4) {
        $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="no4" id="no4" style="width:50px;" readonly>

    <select id="nama_kode_barang4" onchange="comboTarget4()" name="nama_kode_barang4" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
      <option value="">- Pilih Barang -</option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>,<?php echo $stock->Nama; ?>">
           <?php echo $stock->Nama; ?>
         </option>
         <?php
         }
        ?>
      </select>
      <input id="nama_barang4" type="hidden" class="form-control" placeholder="nama_barang4" name="nama_barang4" readonly style="width: 80px">
      <input id="kode4" type="text" class="form-control" placeholder="Kode" name="kode4" readonly style="width: 210px">
<button class="btn btn btn-success btn-block" onClick="terimainput4()" type="button" style="width: 210px"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack4"></a>
        
    </div>

    <div class="table-responsive" style="height:100px; overflow:auto;" id="responsecontainer4">
    <table class="table table-bordered table-striped" id='tabelinput4'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
            
        </tr>
        <thead>
          <?php
            $no4 = 1;
            foreach ($dataTemp4 as $temp4) {
              ?>
              <tr>
                <td><?php echo $no4; ?></td>
                <td><?php echo $temp4->Kode; ?></td>
                <td><?php echo $temp4->Nama; ?></td>
                
              </tr>
              <?php
              $no4++;
              }
              ?>
        </table>
      </div>

      <hr>
      
      <button class="btn btn-danger btn-block" onClick="hapusInput4()" type="button"><i class="glyphicon glyphicon-trash"></i>Hapus</button><a id="ackDel4"></a>
      </form>
<!-- END FORM TARGET 4 -->
<br />
<form action="" method="post" name="frmTambahTarget" id="frmTambahTarget">
  <div class="input-group form-group">

      <span class="input-group-addon" id="sizing-addon2">
        <label>target value</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target" name="target" id="target" aria-describedby="sizing-addon2" style="width: 380px">
      </span>
      <span class="input-group-addon" id="sizing-addon2">
        <label>bobot</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Bobot Target" name="bobot" id="bobot" aria-describedby="sizing-addon2" style="width: 200px"></span>
      <span><input type="text" class="form-control" aria-describedby="sizing-addon2" style="width: 100px" readonly value="%"></span>
  </div>
  <div>
    <label>product focus</label>
  </div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target 1</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target 1" name="target1" id="target1" aria-describedby="sizing-addon2" style="width: 200px">
      </span>
      <span><select id="satuan1" name="satuan1" class="form-control select2" aria-describedby="sizing-addon2" style="width:200px;">
      <option value="">- Pilih Satuan -</option>
       <?php
       foreach ($dataSatuan as $satuan) {
         ?>
         <option value="<?php echo $satuan->Kode; ?>">
           <?php echo $satuan->Kode; ?> - <?php echo $satuan->Keterangan; ?>
         </option>
         <?php
         }
        ?>
      </select>
      </span>
      
  </div>
  <div class="input-group form-group">

      <span class="input-group-addon" id="sizing-addon2">
        <label>target 2</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target 2" name="target2" 
        id="target2" aria-describedby="sizing-addon2" style="width: 200px">
      </span>
      <span><select id="satuan2" name="satuan2" class="form-control select2" aria-describedby="sizing-addon2" style="width:200px;">
      <option value="">- Pilih Satuan -</option>
       <?php
       foreach ($dataSatuan as $satuan) {
         ?>
         <option value="<?php echo $satuan->Kode; ?>">
           <?php echo $satuan->Kode; ?> - <?php echo $satuan->Keterangan; ?>
         </option>
         <?php
         }
        ?>
      </select>
      </span>
      
  </div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target 3</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target 3" name="target3" id="target3" aria-describedby="sizing-addon2" style="width: 200px">
      </span>
      <span><select id="satuan3" name="satuan3" class="form-control select2" aria-describedby="sizing-addon2" style="width:200px;">
      <option value="">- Pilih Satuan -</option>
       <?php
       foreach ($dataSatuan as $satuan) {
         ?>
         <option value="<?php echo $satuan->Kode; ?>">
           <?php echo $satuan->Kode; ?> - <?php echo $satuan->Keterangan; ?>
         </option>
         <?php
         }
        ?>
      </select>
      </span>
      
  </div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target 4</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target 4" name="target4" id="target4" aria-describedby="sizing-addon2" style="width: 200px">
      </span>
      <span><select id="satuan4" name="satuan4" class="form-control select2" aria-describedby="sizing-addon2" style="width:200px;">
      <option value="">- Pilih Satuan -</option>
       <?php
       foreach ($dataSatuan as $satuan) {
         ?>
         <option value="<?php echo $satuan->Kode; ?>">
           <?php echo $satuan->Kode; ?> - <?php echo $satuan->Keterangan; ?>
         </option>
         <?php
         }
        ?>
      </select>
      </span>
      <span class="input-group-addon" id="sizing-addon2">
        <label>bobot</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Bobot Target 4" name="bobot4" id="bobot4" aria-describedby="sizing-addon2" style="width: 200px"></span>
      <span><input type="text" class="form-control" readonly value="%" aria-describedby="sizing-addon2" style="width: 100px"></span>
  </div>
  <div><label></label></div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target EC</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target EC" name="targetEC" id="targetEC" aria-describedby="sizing-addon2" style="width: 400px">
      </span>
      <span class="input-group-addon" id="sizing-addon2">
        <label>bobot</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Bobot EC" name="bobotEC" id="bobotEC" aria-describedby="sizing-addon2" style="width: 300px"></span>
  </div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target OA</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target OA" name="targetOA" id="targetOA" aria-describedby="sizing-addon2" style="width: 400px">
      </span>
      <span class="input-group-addon" id="sizing-addon2">
        <label>bobot</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Bobot OA" name="bobotOA" id="bobotOA" aria-describedby="sizing-addon2" style="width: 300px"></span>
  </div>
  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <label>target AR</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Target AR" name="targetAR" id="targetAR" aria-describedby="sizing-addon2" style="width: 400px">
      </span>
      <span class="input-group-addon" id="sizing-addon2">
        <label>bobot</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Bobot AR" name="bobotAR" id="bobotAR" aria-describedby="sizing-addon2" style="width: 300px"></span>
  </div>
  <div class="input-group form-group">
      
      <span class="input-group-addon" id="sizing-addon2">
        <label>Total</label>
      </span>
      <span><input type="text" class="form-control" placeholder="Total" name="total" id="total" aria-describedby="sizing-addon2" style="width: 400px"></span>
  </div>
</form>
<div class="col-md-4 text-left">
  <a href="<?php echo base_url();?>Target/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
  <hr />
</div>
<div class="col-md-4 text-left">
<!-- <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button> -->
</div>
<div class="col-md-4 text-right">
<button onclick="terimaPost()" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button><a id="coba"></a>
<hr />


<!-- FORM SECOND END -->
<!-- Modal Cari -->
      <div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="width:1500px">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Cari Data Target</h4>
                          </div>
                          <div class="modal-body">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Salesman</th>
                                          <th>Jenis</th>
                                          <th>Target</th>
                                          <th>Bobot</th>
                                          <th>Target Fokus 1</th>
                                          <th>Bobot Fokus 1</th>
                                          <th>Target Fokus 2</th>
                                          <th>Bobot Fokus 2</th>
                                          <th>Target Fokus 3</th>
                                          <th>Bobot Fokus 3</th>
                                          <th>Target Fokus 4</th>
                                          <th>Bobot Fokus 4</th>
                                          <th>Bobot Fokus</th>
                                          <th>Target EC</th>
                                          <th>Bobot EC</th>
                                          <th>Target OA</th>
                                          <th>Bobot OA</th>
                                          <th>Target AR</th>
                                          <th>Bobot AR</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      foreach ($dataTarget as $target) {
                                        ?>
                                        <tr>
                                          <td><?php echo $target->salesman; ?></td>
                                          <td><?php echo $target->jenis; ?></td>
                                          <td><?php echo $target->target; ?></td>
                                          <td><?php echo $target->bobot; ?></td>
                                          <td><?php echo $target->targetpf1; ?></td>
                                          <td><?php echo $target->satpf1; ?></td>
                                          <td><?php echo $target->targetpf2; ?></td>
                                          <td><?php echo $target->satpf2; ?></td>
                                          <td><?php echo $target->targetpf3; ?></td>
                                          <td><?php echo $target->satpf3; ?></td>
                                          <td><?php echo $target->targetpf4; ?></td>
                                          <td><?php echo $target->satpf4; ?></td>
                                          <td><?php echo $target->bobotpf; ?></td>
                                          <td><?php echo $target->targetec; ?></td>
                                          <td><?php echo $target->bobotec; ?></td>
                                          <td><?php echo $target->targetoa; ?></td>
                                          <td><?php echo $target->bobotoa; ?></td>
                                          <td><?php echo $target->targetar; ?></td>
                                          <td><?php echo $target->bobotar; ?></td>
                                          <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

    $(function () {
        $("#lookupCari").dataTable();
    });

</script>
<!-- End Modal -->
