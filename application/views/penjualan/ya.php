<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
  <div class="box-header">
    <script>
    function terimainputCombox(){
           var input=document.forms['frmPenjualan']['supplier'].value;
           var outputKode = document.getElementById("kd_supplier");
           outputKode.value = input;

           var input2=document.forms['frmPenjualan']['salesman'].value;
           var outputKode2 = document.getElementById("kd_salesman");
           outputKode2.value = input2;

           var input3=document.forms['frmPenjualan']['customer'].value;
           var outputKode3 = document.getElementById("kd_customer");
           outputKode3.value = input3;
}
    </script>
    <form id="myForm" action="" method="post" name='frmPenjualan'>
      <button class="btn btn btn-default pull-right" type="button" ><i class="glyphicon glyphicon-info-sign"></i> Posisi Piutang</button>
    <div class="input-group form-group">
      <label class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Harga Include PPn</span>
</label>
      </div>

      <div class="input-group form-group">
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control" id="tgl_jual" placeholder="Tanggal" value=<?php echo date("Y-m-d"); ?> name="tgl_penjualan" style="width:150px;">
        <span class="input-group-addon">
        <i class="glyphicon glyphicon-random"></i>
        </span>
        <select id="customer" name="customer" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
          <option value="">- Pilih Customer -</option>
            <?php
            foreach ($dataCustomer as $customer) {
              ?>
              <option value="<?php echo $customer->Kode; ?>">
                <?php echo $customer->Nama; ?>
              </option>
              <?php
            }
            ?>
          </select>
    <input type="text" class="form-control" placeholder="Kode" value="" name="kd_customer" id="kd_customer" style="width:60px;" readonly>
    </div>
    <script>
    $(function() {
$("#tgl_jual").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>

    <label>Pembayaran</label>
    <div class="input-group form-group">
    <div class="panel panel-default">
      <input id="radio1" name="radio" type="radio" class="custom-control-input">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Kredit</span>
      <input id="radio2" name="radio" type="radio" class="custom-control-input">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Cash</span>
    </div>
  </div>

    <div class="input-group form-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </span>
      <select id="supplier" onchange="terimainputCombox()" name="supplier" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
        <option value="">- Pilih Supplier -</option>
          <?php
          foreach ($dataSupplier as $supplier) {
            ?>
            <option value="<?php echo $supplier->Kode; ?>">
              <?php echo $supplier->Nama; ?>
            </option>
            <?php
          }
          ?>
        </select>
        <input id="kd_supplier" type="text" class="form-control" placeholder="Kode" name="kd_supplier" style="width:60px;" readonly>
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <select id="salesman" onchange="terimainputCombox()" name="salesman" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
          <option value="">- Pilih Salesman -</option>
            <?php
            foreach ($dataSalesman as $salesman) {
              ?>
              <option value="<?php echo $salesman->Kode; ?>">
                <?php echo $salesman->Nama; ?>
              </option>
              <?php
            }
            ?>
          </select>
          <input id="kd_salesman" type="text" class="form-control" placeholder="Kode" name="kd_salesman" style="width:60px;" readonly>
          <span class="input-group-addon">
            <label>T.O.P</label>
          </span>
          <select id="top" name="top" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
            <option value=""></option>
            <?php for($i=1; $i<=150; $i++) { ?>
            <option value=<?= $i ?>><?= $i ?></option>
            <?php
          }
          ?>
            </select>
            <input type="text" class="form-control" id="tgl_top" placeholder="Tanggal" name="tgl_top" style="width:150px;">

      </div>
<script>
$(function() {
$("#tgl_top").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>
    </form>

    <form action="<?=base_url()?>Penjualan/prosesTambah" method="post" name="inputTabel">
    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp as $temp) {
        $i++; } ?>
    <input type="text" class="form-control" value=<?= $i ?> name="no" id="no" style="width:50px;">

    <select id="kode_jual" name="kode_jual" class="form-control select2" aria-describedby="sizing-addon2" style="width:80px;">
      <option value=""></option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>">
           <?php echo $stock->Kode; ?>
         </option>
         <?php
         }
        ?>
      </select>

      <select id="nama_barang" name="nama_barang" class="form-control select2" aria-describedby="sizing-addon2" style="width:175px;">
        <option value=""></option>
          <?php
          foreach ($dataStock as $stock) {
            ?>
            <option value="<?php echo $stock->Nama; ?>">
              <?php echo $stock->Nama; ?>
            </option>
            <?php
          }
          ?>
        </select>

        <input type="text" class="form-control" value="1" name="qty" id="qty" style="width:50px;">

        <select id="satuan" name="satuan" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
          <option value=""></option>
          <option>CRT</option>
          <option>PAC</option>
          <option>PCS</option>
          </select>

          <input type="text" class="form-control" value="0" name="harga" id="harga" style="width:90px;">
          <input type="text" class="form-control" value="0.00" name="disc_1" id="disc_1" style="width:85px;">
          <input type="text" class="form-control" value="0.00" name="disc_2" id="disc_2" style="width:85px;">
          <input type="text" class="form-control" value="0.00" name="disc_3" id="disc_3" style="width:85px;">
          <input type="text" class="form-control" value="0" name="jumlah" id="jumlah" style="width:100px;">
          <input type="text" class="form-control" value="Bns" name="bns" id="bns" style="width:100px;">
            <select id="gudang" name="gudang" class="form-control select2" aria-describedby="sizing-addon2" style="width:100px;">
              <option value=""></option>
                <?php
                foreach ($dataGudang as $gudang) {
                  ?>
                  <option value="<?php echo $gudang->Kode; ?>">
                    <?php echo $gudang->Kode; ?>
                  </option>
                  <?php
                }
                ?>
              </select>
    </div>

    <div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
    <table class="table table-bordered table-striped" id='tabelinput'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Qty</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Disc 1</th>
          <th>Disc 2</th>
          <th>Disc 3</th>
          <th>Jumlah</th>
          <th>Bns</th>
          <th>Gdg</th>
        </tr>
        <thead>
          <?php
            $no = 1;
            foreach ($dataTemp as $temp) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $temp->Kode; ?></td>
                <td><?php echo $temp->Nama; ?></td>
                <td><?php echo $temp->Qty; ?></td>
                <td><?php echo $temp->Sat; ?></td>
                <td><?php echo $temp->Harga; ?></td>
                <td><?php echo $temp->Disc1; ?></td>
                <td><?php echo $temp->Disc2; ?></td>
                <td><?php echo $temp->Disc3; ?></td>
                <td><?php echo $temp->Jumlah; ?></td>
                <td><?php echo $temp->Bns; ?></td>
                <td><?php echo $temp->Gdg; ?></td>
              </tr>
              <?php
              $no++;
              }
              ?>
        </table>
      </div>

      <hr>
      <button class="btn btn btn-success btn-block" onClick="terimainput()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
      <a href="javascript:if(confirm('Anda yakin menghapus data pembelian terakhir?')){document.location='<?php echo base_url();?>Pembelian/delete';}" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
      </form>

      <script>
      function terimainput(){

        var i, j;
        var loopingNo = document.getElementById("no");

            $.ajax({
            url: "<?php echo site_url('Penjualan/prosesTambah');?>",
            type: 'POST',
            cache: false,
            data: {
            "kode_jual": $("#kode_jual").val(), "nama_barang": $("#nama_barang").val(), "qty": $("#qty").val(),
            "satuan": $("#satuan").val(), "harga": $("#harga").val(), "disc_1": $("#disc_1").val(),
            "disc_2": $("#disc_2").val(), "disc_3": $("#disc_3").val(), "jumlah": $("#jumlah").val(), "bns": $("#bns").val(),
            "gudang": $("#gudang").val()},
             success: function(data) {
             $("div#ack").html(data);
             document.getElementById("table_content").innerHTML=data;
             }
            });

            <?php
              $no = 1;
              foreach ($dataTemp as $temp) {
                ?>

                var nO='<?php echo $no; ?>'
                var kodeJual='<?php echo $temp->Kode; ?>'
                var namaBarang='<?php echo $temp->Nama; ?>'
                var qTy='<?php echo $temp->Qty; ?>'
                var sAtuan='<?php echo $temp->Sat; ?>'
                var hArga='<?php echo $temp->Harga; ?>'
                var dIsc1='<?php echo $temp->Disc1; ?>'
                var dIsc2='<?php echo $temp->Disc2; ?>'
                var dIsc3='<?php echo $temp->Disc3; ?>'
                var jUmlah='<?php echo $temp->Jumlah; ?>'
                var bNs='<?php echo $temp->Bns; ?>'
                var gUdang='<?php echo $temp->Gdg; ?>'

                <?php
                $no++;
                }
                ?>

             var tabel = document.getElementById("tabelinput");
             var row = tabel.insertRow(1);
             var cell0 = row.insertCell(0);
             var cell1 = row.insertCell(1);
             var cell2 = row.insertCell(2);
             var cell3 = row.insertCell(3);
             var cell4 = row.insertCell(4);
             var cell5 = row.insertCell(5);
             var cell6 = row.insertCell(6);
             var cell7 = row.insertCell(7);
             var cell8 = row.insertCell(8);
             var cell9 = row.insertCell(9);
             var cell10 = row.insertCell(10);
             var cell11 = row.insertCell(11);

             cell0.innerHTML = nO;
             cell1.innerHTML = kodeJual;
             cell2.innerHTML = namaBarang;
             cell3.innerHTML = qTy;
             cell4.innerHTML = sAtuan;
             cell5.innerHTML = hArga;
             cell6.innerHTML = dIsc1;
             cell7.innerHTML = dIsc2;
             cell8.innerHTML = dIsc3;
             cell9.innerHTML = jUmlah;
             cell10.innerHTML = bNs;
             cell11.innerHTML = gUdang;

            j=Number(document.forms['inputTabel']['no'].value)+1;
            //window.alert(j);
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }

            return false;
            //setInterval(function(){realoadTabel()},1000);

      }
      </script>
      <hr />
      <form action="" method="post">
      <div class="input-group form-group">
        <span class="input-group-addon">
          <label>Sub Total</label>
        </span>
        <input type="text" class="form-control" value="0" name="sub_total" style="width:200px;" readonly>
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
        <input type="text" class="form-control" placeholder="Keterangan" name="ket" style="width:300px;">
      </div>
      <div class="input-group form-group">
        <span class="input-group-addon">
          <label>Disc %</label>
        </span>
        <input type="text" class="form-control" value="0.00" name="disc" style="width:50px;">
        <span class="input-group-addon">
          <label>Rp</label>
        </span>
        <input type="text" class="form-control" value="0" name="disc_rp" style="width:150px;" readonly>
      </div>
        <button class="btn btn" type="submit"><i class="glyphicon glyphicon-cog"></i> Hitung</button>
      </form>

      <hr />
      <label>Total</label>
      <div class="input-group form-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <input type="text" class="form-control" value="" name="total" style="width:200px;" readonly>
      <button class="btn btn btn-info pull-right" type="button" ><i class="glyphicon glyphicon-text-height"></i> Input by Text</button>
      </div>

      <hr />
      <div class="col-md-4 text-left">
      <a href="" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
      </div>
      <div class="col-md-4 text-left">
      <a href="" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-search"></i> Cari</a>
      </div>
      <div class="col-md-4 text-right">
      <button onclick="" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      </div>




  </div>
  <!-- /.box-header -->
</div>
